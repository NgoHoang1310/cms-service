<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::all()->sortBy('id');
        return view('plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plan = new Plan();
        return view('plans.create', compact('plan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|integer',
                'duration_days' => 'required|integer',
            ],
                [
                    'name.required' => 'Tên gói cước không được để trống',
                    'name.max' => 'Tên gói cước không được quá 255 ký tự',
                    'price.required' => 'Giá gói cước không được để trống',
                    'price.integer' => 'Giá gói cước phải là số nguyên',
                    'duration_days.required' => 'Số ngày sử dụng không được để trống',
                    'duration_days.integer' => 'Số ngày sử dụng phải là số nguyên',
                ]);

            Plan::query()->insert($request->except('_token'));
            return redirect()->route('plans.index')->with('success', 'Tạo gói cước thành công');

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Tạo gói cước thất bại.' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        return view('plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|integer',
                'duration_days' => 'required|integer',
            ],
                [
                    'name.required' => 'Tên gói cước không được để trống',
                    'name.max' => 'Tên gói cước không được quá 255 ký tự',
                    'price.required' => 'Giá gói cước không được để trống',
                    'price.integer' => 'Giá gói cước phải là số nguyên',
                    'duration_days.required' => 'Số ngày sử dụng không được để trống',
                    'duration_days.integer' => 'Số ngày sử dụng phải là số nguyên',
                ]);

            $plan->update($request->except('_token'));
            return redirect()->route('plans.index')->with('success', 'Sửa gói cước thành công');

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Sửa gói cước thất bại. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        DB::beginTransaction();
        try {
            $plan->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Xóa gói cước thành công !'
            ]);

        } catch (\Exception $exception) {
            // Handle exception
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Xóa gói cước thất bại: ' . $exception->getMessage()
            ]);
        }
    }

    public function updateStatus($id, Request $request)
    {
        $plan = Plan::find($id);
        $status = $request->get('status');
        return $this->changeStatus($plan, $status);
    }
}
