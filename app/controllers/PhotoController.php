<?php

use Album\Repositories\AlbumRepositoryInterface;
use Photo\Repositories\PhotoRepositoryInterface;
use Notifier\Repositories\NotifierRepositoryInterface;
use Photo\Photo;

class PhotoController extends \BaseController
{
    protected $albumRepository;
    protected $photoRepository;
    protected $notifierRepository;

    public function __construct(
        AlbumRepositoryInterface $albumRepository,
        PhotoRepositoryInterface $photoRepository,
        NotifierRepositoryInterface $notifierRepository
    ) {
        $this->albumRepository = $albumRepository;
        $this->photoRepository = $photoRepository;
        $this->notifierRepository = $notifierRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($albumId)
    {
        $album = $this->albumRepository->findOrNew($albumId);

        if (!$this->albumRepository->canUserCreate(Auth::user(), $album)) {
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

        $album = $this->albumRepository->findOrNew($albumId);

        if (!$this->albumRepository->canUserCreate(Auth::user(), $album)) {
            return Response::json(null, 403);
        }

        foreach (Input::file('files') as $file) {
            $newFilename = mt_rand();

            if (Image::make($file->getRealPath())->save(storage_path('images') . '/' . $newFilename, 100)) {
                $photo = $this->photoRepository->create($album, null, null, $newFilename);

                if ($album->getPrivacy()) {
                    $this->notifierRepository->newPhotoAdded(Auth::user(), $album, $photo);
                }
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
    public function show($albumId, $photoId)
    {
        list($photoId, $imageType) = array_pad(
            preg_split('/\.(jpg|jpeg|png)$/i', $photoId, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE),
            2,
            null
        );

        $album = $this->albumRepository->findOrNew($albumId);

        if (!$this->albumRepository->canUserRead(Auth::user(), $album)) {
            if (Request::ajax()) return Response::json(null, 403);
            else return Redirect::route('albums.index');
        }

        $photo = $this->photoRepository->findOrNew($photoId);

        if (!empty($imageType)) {
            return Image::make(storage_path('images') . '/' . $photo->getAttribute('file_id'))->response();
        }

        $isAlbumCreator = $this->albumRepository->canUserUpdate(Auth::user(), $album);

        return View::make('layouts.photoShow')->with(compact('album', 'photo', 'isAlbumCreator'));
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
        $album = $this->albumRepository->findOrNew($albumId);

        if (!$this->albumRepository->canUserUpdate(Auth::user(), $album)) {
            return Redirect::route('albums.show', [$album->getKey()]);
        }

        $name = Input::get('photoName', null);
        $description = Input::get('photoDescription', null);

        if (empty($name) && empty($description)) {
            return Redirect::route('albums.show', [$album->getKey()]);
        }

        $photo = $this->photoRepository->findOrNew($photoId);
        $this->photoRepository->update($photo, $name, $description);

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
        $album = $this->albumRepository->findOrNew($albumId);

        if (!$this->albumRepository->canUserDestroy(Auth::user(), $album)) {
            return Response::json(null, 403);
        }

        $photo = $this->photoRepository->findOrNew($photoId);

        if (empty($photo) || $photo->delete()) {
            return Response::json(null, 200);
        }

        return Response::json(null, 500);
    }

    public function photoSettings($albumId, $photoId)
    {
        if (!Request::ajax()) return View::make('layouts.exception');

        $album = $this->albumRepository->findOrNew($albumId);

        if (!$this->albumRepository->canUserUpdate(Auth::user(), $album)) {
            return Response::json(null, 403);
        }

        $photo = $this->photoRepository->findOrNew($photoId);

        return View::make('components.photoSettings')->with(compact('album', 'photo'));
    }

    public function photoRotate($albumId, $photoId, $dir)
    {
        if (!Request::ajax()) return View::make('layouts.exception');

        $album = $this->albumRepository->findOrNew($albumId);

        if (!$this->albumRepository->canUserUpdate(Auth::user(), $album)) {
            return Response::json(null, 403);
        }

        $photo = $this->photoRepository->findOrNew($photoId);
        $imagePath = storage_path('images') . '/' . $photo->getAttribute('file_id');
        $image = Image::make($imagePath);
        $angle = ('right' === $dir) ? -90 : 90;

        if ($this->photoRepository->rotateImage($image, $angle)->save($imagePath)) {
            return Response::json(null, 200);
        }

        return Response::json(null, 500);
    }
}
