<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Http\Resources\TrackResource;
use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Album::query();
        if($request->has('name')){
            $name = $request->input('name');
            $query->where('name', 'ilike',"%$name%");
        }
        $albums = AlbumResource::collection($query->orderBy('id')->paginate(10));

        return response()->json([
            'data' => $albums->items(),
            'current_page' => $albums->currentPage(),
            'last_page' => $albums->lastPage(),
            'per_page' => $albums->perPage(),
            'total' => $albums->total(),
        ]);
    }

    public function getAllAlbums()
    {
        return Album::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $album = Album::create([
            'name' => $request->input('name'),
            'release_year' => $request->input('release_year'),
        ]);
        return $album;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $album = Album::find($id);
        $album->load('tracks');
        return response()->json($album,201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $album = Album::find($id);
        $album->update([
            'name' => $request->input('name'),
            'release_year' => $request->input('release_year'),
        ]);
        return response()->json($album,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\Response
    {
        $album = Album::find($id);
        $album->delete();

        return response()->noContent();
    }
}
