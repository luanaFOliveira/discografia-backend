<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrackResource;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $query = Track::query();
        if($request->has('name')){
            $name = $request->input('name');
            $query->where('name', 'ilike',"%$name%");
        }

        $tracks = TrackResource::collection($query->orderBy('id')->paginate(10));

        return response()->json([
            'data' => $tracks->items(),
            'current_page' => $tracks->currentPage(),
            'last_page' => $tracks->lastPage(),
            'per_page' => $tracks->perPage(),
            'total' => $tracks->total(),
        ]);
    }

    public function trackByAlbumId(int $album_id): \Illuminate\Http\JsonResponse
    {
        $tracks = Track::query()->where('album_id',$album_id)->get();
        return response()->json($tracks);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $track = Track::create([
            'name' => $request->input('name'),
            'duration' => $request->input('duration'),
            'album_id' => $request->input('album_id'),
        ]);
        return $track;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $track = Track::find($id);
        return response()->json($track,201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $track = Track::find($id);
        $track->update([
            'name' => $request->input('name'),
            'duration' => $request->input('duration'),
            'album_id' => $request->input('album_id'),
        ]);
        return response()->json($track);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\Response
    {
        $track = Track::find($id);
        $track->delete();

        return response()->noContent();
    }
}
