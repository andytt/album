<?php

class AlbumController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $query = Album::query();
        $query->where('user_id', Auth::user()->getKey());
        $albums = $query->paginate();

        return View::make('layouts.index')->with(compact('albums'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Request::ajax()) {
            return View::make('components.albumCreate');
        }

        return View::make('layouts.albumCreate');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validation = Validator::make(Input::all(), [
            'albumName' => 'required',
            'albumDescription' => 'required'
        ]);

        if ($validation->fails()) {
            return Redirect::route('albums.create')->withInput(Input::all())->withErrors($validation);
        }

        $album = Album::create([
            'user_id' => Auth::user()->getKey(),
            'name' => Input::get('albumName', null),
            'description' => Input::get('albumDescription', null)
        ]);

        $id = $album->getKey();

        return Redirect::route('albums.show', compact('id'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $album = Album::find($id);

        if (
            empty($album)
            || $album->getAttribute('user_id') !== Auth::user()->getKey()
        ) {
            return Redirect::route('albums.create');
        }

        $photos = $album->photos()->paginate();

        return View::make('layouts.albumShow')->with(compact('album', 'photos'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
