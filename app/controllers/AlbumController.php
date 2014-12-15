<?php

use Album\Repositories\AlbumRepositoryInterface;

class AlbumController extends \BaseController
{
    protected $albumRepository;

    public function __construct(AlbumRepositoryInterface $albumRepository)
    {
        $this->albumRepository = $albumRepository;

        $this->beforeFilter('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $albums = $this->albumRepository->getAlbumsByUser(Auth::user())->paginate();

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

        $album = $this->albumRepository->create(
            Auth::user(),
            Input::get('albumName'),
            Input::get('albumDescription'),
            (boolean) Input::get('albumPublic', false)
        );

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
        $album = $this->albumRepository->findOrNew($id);

        if (!$this->albumRepository->canUserRead(Auth::user(), $album)) {
            return Redirect::route('albums.create');
        }

        $photos = $album->photos()->paginate();
        $isAlbumCreator = $this->albumRepository->canUserUpdate(Auth::user(), $album);

        return View::make('layouts.albumShow')->with(compact('album', 'photos', 'isAlbumCreator'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($albumId)
    {
        $album = $this->albumRepository->findOrNew($albumId);

        if (!$this->albumRepository->canUserDestroy(Auth::user(), $album)) {
            return Redirect::route('albums.index');
        }

        $album->delete();

        return Redirect::route('albums.index');
    }

    public function togglePublic($albumId)
    {
        $album = $this->albumRepository->findOrNew($albumId);

        if (!$this->albumRepository->canUserUpdate(Auth::user(), $album)) {
            return Response::json(null, 403);
        }

        if ($this->albumRepository->update($album, null, null, !$album->getPrivacy())) {
            return Response::json(null);
        }

        return Response::json(null, 500);
    }

    public function albumSettings($albumId)
    {
        if (!Request::ajax()) return View::make('layouts.exception');

        $album = $this->albumRepository->findOrNew($albumId);

        if (!$this->albumRepository->canUserUpdate(Auth::user(), $album)) {
            return Response::json(null, 403);
        }

        return View::make('components.albumSettings')->with(compact('album'));
    }
}
