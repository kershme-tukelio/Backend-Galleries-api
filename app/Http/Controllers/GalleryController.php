<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = $request->query('title', '');
        $galleries = Gallery::search($title)
            ->with('user', 'images', 'comments')
            // ->paginate(10)
            ->get();

        return response()->json($galleries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->validated();
        $gallery = auth()->user()->galleries()->create($data);

        return response()->json($gallery);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::with('images', 'comments')
            ->findOrFail($id);

        return response()->json($gallery);
    }

    /**
     * Display the specified listing of the resource.
     */
    public function getMyGalleries() {
        $galleries = auth()->user()->galleries()
            ->with('images', 'comments')
            // ->paginate(10)
            ->get();

        return response()->json($galleries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $gallery = Gallery::findOrFail($id);
        $gallery->update($data);

        return response()->json($gallery);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return response()->json($gallery);
    }
}
