<?php

class PhotoController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($albumId)
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($albumId)
    {
        $album = Album::find($albumId);

        if (empty($album)) {
            return Redirect::route('albums.create');
        }

        if (Request::ajax()) {
            return View::make('components.photoCreate')->with(compact('album'));
        }

        return View::make('layouts.photoCreate')->with(compact('album'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($albumId)
    {
        if (!Input::hasFile('files')) {
            return Response::json(null, 400);
        }

        $album = Album::find($albumId);
        $userId = Auth::user()->getKey();

        if (
            empty($album)
            || $album->getAttribute('user_id') !== $userId
        ) {
            return Response::json(null, 403);
        }

        foreach (Input::file('files') as $file) {
            $newFilename = mt_rand();

            if (Image::make($file->getRealPath())->save(storage_path('images') . '/' . $newFilename, 100)) {
                Photo::create([
                    'album_id' => $album->getKey(),
                    'file_id' => $newFilename
                ]);
            }
        }

        return Response::json(null);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($albumId, $id)
    {
        $album = Album::find($albumId);
        $userId = Auth::user()->getKey();

        if (
            empty($album)
            || $album->getAttribute('user_id') !== $userId
        ) {
            return Response::json(null, 403);
        }

        $query = Photo::query();
        $query->where('id', $id);
        $query->where('album_id', $albumId);
        $photo = $query->first();

        if (empty($photo)) {
            return Response::json(null, 404);
        }

        $image = Image::make(storage_path('images') . '/' . $photo->getAttribute('file_id'));

        return $image->response();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($albumId, $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($albumId, $photoId)
    {
        $album = Album::find($albumId);
        $photo = Photo::find($photoId);
        $user  = Auth::user();

        if (
            empty($album)
            || empty($photo)
            || $album->getAttribute('user_id') !== $user->getKey()
        ) {
            return Redirect::route('albums.show', [$album->getKey()]);
        }

        $name = Input::get('photoName', null);
        $description = Input::get('photoDescription', null);

        if (empty($name) && empty($description)) {
            return Redirect::route('albums.show', [$album->getKey()]);
        }

        $photo->update(compact('name', 'description'));

        return Redirect::route('albums.show', [$album->getKey()]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($albumId, $photoId)
    {
        $album = Album::find($albumId);
        $user = Auth::user();

        if (
            empty($album)
            || $album->getAttribute('user_id') !== $user->getKey()
        ) {
            return Response::json(null, 403);
        }

        $photo = Photo::find($photoId);

        if (empty($photo) || $photo->delete()) {
            return Response::json(null, 200);
        }

        return Response::json(null, 500);
    }

    public function photoSettings($albumId, $photoId)
    {
        if (!Request::ajax()) return View::make('layouts.exception');

        $album = Album::find($albumId);
        $photo = Photo::find($photoId);
        $user = Auth::user();

        if (
            empty($album)
            || empty($photo)
            || $album->getAttribute('user_id') !== $user->getKey()
        ) {
            return Response::json(null, 403);
        }

        return View::make('components.photoSettings')->with(compact('album', 'photo'));
    }
}
