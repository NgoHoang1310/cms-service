<?php

namespace App\Http\Controllers;

use App\Exports\RevenueExport;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all()->sortByDesc('id');
        return view('payments.index', compact('payments'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function exportRevenueExcel(Request $request)
    {
        $start = $request->get('start_date') ?? Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $end = $request->get('end_date') ?? Carbon::now()->toDateString();

        $payments = Payment::with(['user', 'subscription']) // 👈 load quan hệ nếu cần
            ->where('status', 1)
            ->whereDate('payment_date', '>=', $start)
            ->whereDate('payment_date', '<=', $end)
            ->orderBy('payment_date', 'desc')
            ->get();

        return Excel::download(new RevenueExport($payments), 'doanh-thu.xlsx');
    }
}
