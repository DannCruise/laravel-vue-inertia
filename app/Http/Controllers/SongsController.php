<?php

namespace App\Http\Controllers;

use App\Models\Songs;
use App\Http\Requests\StoreSongsRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Songs::all();
        return Inertia::render('Songs/Index',['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSongsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'title' => 'required',
            'autor' => 'required',
            'album' => 'required',
        ]);
        $song = new Songs($request->input());
        $song->save();
        return redirect('song');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function show(Songs $songs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function edit(Songs $songs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSongsRequest  $request
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $song = Songs::find($id);
        $song->fill($request->input())->saveOrFail();
        return redirect('song');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Songs::find($id);
        $song->delete();
        return redirect()->route('song.index');
    }
}
