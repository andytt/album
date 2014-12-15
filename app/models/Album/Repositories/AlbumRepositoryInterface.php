<?php namespace Album\Repositories;

use Album\Album;
use User;

interface AlbumRepositoryInterface
{
    public function findOrNew($albumId);

    public function getAlbumsByUser(User $user);

    public function create(User $user, $albumName, $albumDescription, $public = false);

    public function update(Album $album, $albumName = null, $albumDescription = null, $public = false);

    public function canUserCreate(User $user, Album $album);

    public function canUserRead(User $user, Album $album);

    public function canUserUpdate(User $user, Album $album);

    public function canUserDestroy(User $user, Album $album);

    public function isPublic(Album $album);
}
