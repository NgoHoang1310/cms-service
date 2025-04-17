<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movie = new Movie();
        return view('movies.create', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        DB::beginTransaction();
        try {
            $movie->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Xóa phim thành công !'
            ]);

        } catch (\Exception $exception) {
            // Handle exception
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Xóa phim thất bại: ' . $exception->getMessage()
            ]);
        }
    }
}
