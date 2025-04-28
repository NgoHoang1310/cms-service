<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genres::all();
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = new Genres();
        return view('genres.create', compact('genre'));
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
                    'name.required' => 'Tên thể loại không được để trống',
                    'name.max' => 'Tên thể loại không được quá 255 ký tự',
                    'description.max' => 'Mô tả không được quá 255 ký tự',
                ]);

            Genres::query()->insert($request->except('_token'));
            return redirect()->route('genres.index')->with('success', 'Tạo thể loại thành công');

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Tạo thể loại thất bại.' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Genres $genres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genres $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genres $genre)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',
            ],
                [
                    'name.required' => 'Tên thể loại không được để trống',
                    'name.max' => 'Tên thể loại không được quá 255 ký tự',
                    'description.max' => 'Mô tả không được quá 255 ký tự',
                ]);

            $genre->update($request->except('_token'));
            return redirect()->route('genres.index')->with('success', 'Sửa thể loại thành công');

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Sửa thể loại thất bại.' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genres $genre)
    {
        DB::beginTransaction();
        try {
            $genre->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Xóa thể loại thành công !'
            ]);

        } catch (\Exception $exception) {
            // Handle exception
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Xóa thể loại thất bại: ' . $exception->getMessage()
            ]);
        }
    }
}
