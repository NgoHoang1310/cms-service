<?php

namespace App\Http\Controllers;

use App\Helpers\CUtils;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = Voucher::all()->sortByDesc('id');
        return view('vouchers.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $voucher = new Voucher();
        $voucher->code = CUtils::generateCouponCode('CINE');
        $voucher->only_for_new_users = 1;
        $voucher->only_once_per_user = 1;
        return view('vouchers.create', compact('voucher'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'code' => 'required|string|max:255|unique:voucher,code',
                'description' => 'nullable|string|max:255',
                'value' => 'required|numeric|min:1',
                'max_uses' => 'required|integer|min:1',
                'start_at' => 'required|date',
                'end_at' => 'required|date|after_or_equal:start_at',
            ],
                [
                    'code.required' => 'Mã giảm giá không được để trống',
                    'code.max' => 'Mã giảm giá không được quá 255 ký tự',
                    'code.unique' => 'Mã giảm giá đã tồn tại',
                    'description.max' => 'Mô tả không được quá 255 ký tự',
                    'value.required' => 'Giá trị không được để trống',
                    'value.numeric' => 'Giá trị phải là một số',
                    'value.min' => 'Giá trị phải lớn hơn hoặc bằng 1',
                    'max_uses.required' => 'Số lần sử dụng tối đa không được để trống',
                    'max_uses.integer' => 'Số lần sử dụng tối đa phải là một số nguyên',
                    'max_uses.min' => 'Số lần sử dụng tối đa phải lớn hơn hoặc bằng 1',
                    'start_at.required' => 'Ngày bắt đầu không được để trống',
                    'start_at.date' => 'Ngày bắt đầu phải là một ngày hợp lệ',
                    'end_at.required' => 'Ngày kết thúc không được để trống',
                    'end_at.date' => 'Ngày kết thúc phải là một ngày hợp lệ',
                    'end_at.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu',
                ]);

            Voucher::query()->insert($request->except('_token'));
            return redirect()->route('vouchers.index')->with('success', 'Sửa mã giảm giá thành công');

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Sửa mã giảm giá thất bại.' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Voucher $voucher)
    {
        return view('vouchers.show', compact('voucher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voucher $voucher)
    {
        return view('vouchers.edit', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voucher $voucher)
    {
        try {
            $request->validate([
                'description' => 'nullable|string|max:255',
                'value' => 'required|numeric|min:1',
                'max_uses' => 'required|integer|min:1',
                'start_at' => 'required|date',
                'end_at' => 'required|date|after_or_equal:start_at',
            ],
                [
                    'description.max' => 'Mô tả không được quá 255 ký tự',
                    'value.required' => 'Giá trị không được để trống',
                    'value.numeric' => 'Giá trị phải là một số',
                    'value.min' => 'Giá trị phải lớn hơn hoặc bằng 1',
                    'max_uses.required' => 'Số lần sử dụng tối đa không được để trống',
                    'max_uses.integer' => 'Số lần sử dụng tối đa phải là một số nguyên',
                    'max_uses.min' => 'Số lần sử dụng tối đa phải lớn hơn hoặc bằng 1',
                    'start_at.required' => 'Ngày bắt đầu không được để trống',
                    'start_at.date' => 'Ngày bắt đầu phải là một ngày hợp lệ',
                    'end_at.required' => 'Ngày kết thúc không được để trống',
                    'end_at.date' => 'Ngày kết thúc phải là một ngày hợp lệ',
                    'end_at.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu',
                ]);

            $voucher->update($request->except('_token'));
            return redirect()->route('vouchers.index')->with('success', 'Tạo mã giảm giá thành công');

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Tạo mã giảm giá thất bại.' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        DB::beginTransaction();
        try {
            $voucher->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Xóa mã giảm giá thành công !'
            ]);

        } catch (\Exception $exception) {
            // Handle exception
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Xóa mã giảm giá thất bại: ' . $exception->getMessage()
            ]);
        }
    }

    public function updateStatus($id, Request $request)
    {
        $voucher = Voucher::find($id);
        $status = $request->get('status');
        return $this->changeStatus($voucher, $status);
    }
}
