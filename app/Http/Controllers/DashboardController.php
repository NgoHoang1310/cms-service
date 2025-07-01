<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\User;
use App\Models\Watch_History;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $statistic = $this->getStatistic();
        $movies = $this->getTopContent();
        return view('dashboard.dash-board', compact('statistic', 'movies'));
    }

    public function getCustomerChart()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'labels' => ['Khách hàng mới', 'Khách hàng đã đăng kí', 'Khách hàng đã gia hạn'],
                'values' => [
                    User::getNews(),
                    User::getHasSubscription(),
                    User::getRenewing()
                ]
            ]
        ]);
    }

    public function getStatistic()
    {
        $totalRevenue = $this->getTotalRevenue();
        $totalFilm = $this->getTotalFilm();
        $totalView = $this->getTotalView();
        $totalPlanSold = $this->getTotalPlanSold();

        return [
            'total_revenue' => $totalRevenue,
            'total_film' => $totalFilm,
            'total_view' => $totalView,
            'total_plan_sold' => $totalPlanSold,
        ];
    }

    private function getTotalRevenue($filter = [])
    {
        return Payment::query()
            ->where('status', Payment::STATUS_SUCCESS)
            ->when(isset($filter['start_time']), function ($query) use ($filter) {
                $query->where('payment_date', '>=', $filter['start_time']);
            })
            ->sum('amount') ?? 0;
    }

    private function getTotalFilm()
    {
        $movieCount = Movie::query()->count();
        $seriesCount = Series::query()->count();

        return $movieCount + $seriesCount;
    }

    private function getTotalView()
    {
        return Watch_History::query()->count();
    }

    private function getTotalPlanSold()
    {
        return Payment::query()->where('status', Payment::STATUS_SUCCESS)->count();
    }

    private function getTopContent()
    {
        $subQuery = DB::table('watch_history')
            ->select('target_id', 'target_type', DB::raw('COUNT(id) as total_view'))
            ->groupBy('target_id', 'target_type');

        $movies = Movie::query()
            ->select('movie.*', 'content_watch_history.total_view')
            ->joinSub($subQuery, 'content_watch_history', function ($join) {
                $join->on('movie.id', '=', 'content_watch_history.target_id')
                    ->where('content_watch_history.target_type', '=', Movie::CONTENT_TARGET_TYPE_MOVIE);
            })
            ->orderByDesc('content_watch_history.total_view')
            ->get();

        $series = Series::query()
            ->select('series.*', 'content_watch_history.total_view')
            ->joinSub($subQuery, 'content_watch_history', function ($join) {
                $join->on('series.id', '=', 'content_watch_history.target_id')
                    ->where('content_watch_history.target_type', '=', Series::CONTENT_TARGET_TYPE_SERIES);
            })
            ->orderByDesc('content_watch_history.total_view')
            ->get();

        return $movies->merge($series)->sortByDesc('total_view')->take(10);
    }

    public function getRevenueStats(Request $request)
    {
        $type = $request->get('type', 'week');
        $start = $request->get('start_date');
        $end = $request->get('end_date');

        $query = DB::table('payment')
            ->where('status', 1);

        if ($start) {
            $query->whereDate('payment_date', '>=', $start);
        }
        if ($end) {
            $query->whereDate('payment_date', '<=', $end);
        }

        if ($type === 'week') {
            $query->selectRaw("DATE(payment_date) as label, SUM(amount) as total")
                ->groupBy(DB::raw("DATE(payment_date)"))
                ->orderBy('label');
        } else {
            $query->selectRaw("DATE_FORMAT(payment_date, '%Y-%m') as label, SUM(amount) as total")
                ->groupBy(DB::raw("DATE_FORMAT(payment_date, '%Y-%m')"))
                ->orderBy('label');
        }

        return response()->json($query->get());
    }


}
