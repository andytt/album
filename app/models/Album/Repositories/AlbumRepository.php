<?php namespace Album\Repositories;

use Album\Album;
use User;

class AlbumRepository implements AlbumRepositoryInterface
{
    protected $createValidators = [
        '\Album\Validators\IsCreatorValidator'
    ];

    protected $readValidators = [
        '\Album\Validators\IsReadableValidator'
    ];

    protected $updateValidators = [
        '\Album\Validators\IsCreatorValidator'
    ];

    protected $destroyValidators = [
        '\Album\Validators\IsCreatorValidator'
    ];

    public function findOrNew($albumId)
    {
        return Album::find($albumId) ?: new Album;
    }

    public function getAlbumsByUser(User $user)
    {
        $query = Album::query();

        $query->where(Album::USER_ID_COL, $user->getKey());

        return $query;
    }

    public function create(User $user, $albumName, $albumDescription, $public = false)
    {
        return Album::create([
            Album::USER_ID_COL     => $user->getKey(),
            Album::NAME_COL        => $albumName,
            Album::DESCRIPTION_COL => $albumDescription,
            Album::PRIVACY_COL     => $public
        ]);
    }

    public function update(Album $album, $albumName = null, $albumDescription = null, $public = false)
    {
        if (!empty($albumName)) {
            $album->setAttribute(Album::NAME_COL, $albumName);
        }

        if (!empty($albumDescription)) {
            $album->setAttribute(Album::DESCRIPTION_COL, $albumDescription);
        }

        $album->setAttribute(Album::PRIVACY_COL, (boolean) $public);

        return $album->save();
    }

    public function canUserCreate(User $user, Album $album)
    {
        foreach ($this->createValidators as $validator) {
            if (!(new $validator)->validate($album, $user)) return false;
        }

        return true;
    }

    public function canUserRead(User $user, Album $album)
    {
        foreach ($this->readValidators as $validator) {
            if (!(new $validator)->validate($album, $user)) return false;
        }

        return true;
    }

    public function canUserUpdate(User $user, Album $album)
    {
        foreach ($this->updateValidators as $validator) {
            if (!(new $validator)->validate($album, $user)) return false;
        }

        return true;
    }

    public function canUserDestroy(User $user, Album $album)
    {
        foreach ($this->destroyValidators as $validator) {
            if (!(new $validator)->validate($album, $user)) return false;
        }

        return true;
    }
}
