<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',
            ],
            [
                'name.required' => 'Tên danh mục không được để trống',
                'name.max' => 'Tên danh mục không được quá 255 ký tự',
                'description.max' => 'Mô tả không được quá 255 ký tự',
            ]);

            Category::query()->insert($request->except('_token'));
            return redirect()->route('categories.index')->with('success', 'Tạo danh mục thành công');

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Tạo danh mục thất bại.' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',
            ],
                [
                    'name.required' => 'Tên danh mục không được để trống',
                    'name.max' => 'Tên danh mục không được quá 255 ký tự',
                    'description.max' => 'Mô tả không được quá 255 ký tự',
                ]);

            $category->update($request->except('_token'));
            return redirect()->route('categories.index')->with('success', 'Sửa danh mục thành công');

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Sửa danh mục thất bại.' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try {
            $category->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Xóa danh mục thành công !'
            ]);

        } catch (\Exception $exception) {
            // Handle exception
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Xóa danh mục thất bại: ' . $exception->getMessage()
            ]);
        }
    }
}
