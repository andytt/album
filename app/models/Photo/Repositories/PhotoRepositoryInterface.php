<?php namespace Photo\Repositories;

use Photo\Photo;
use Album\Album;
use User;

interface PhotoRepositoryInterface
{
    public function findOrNew($photoId);

    public function create(Album $album, $photoName, $photoDescription, $fileId);

    public function update(Photo $photo, $photoName, $photoDescription);
}
