<?php namespace Photo\Repositories;

use Album\Album;
use Photo\Photo;
use User;

class PhotoRepository implements PhotoRepositoryInterface
{
    public function findOrNew($photoId)
    {
        return Photo::find($photoId) ?: new Photo;
    }

    public function create(Album $album, $photoName, $photoDescription, $fileId)
    {
        return Photo::create([
            Photo::ALBUM_ID_COL    => $album->getKey(),
            Photo::NAME_COL        => $photoName,
            Photo::DESCRIPTION_COL => $photoDescription,
            Photo::FILE_ID_COL     => $fileId
        ]);
    }

    public function update(Photo $photo, $photoName, $photoDescription)
    {
        if (!empty($photoName)) {
            $photo->setAttribute(Photo::NAME_COL, $photoName);
        }

        if (!empty($photoDescription)) {
            $photo->setAttribute(Photo::DESCRIPTION_COL, $photoDescription);
        }

        return $photo->save();
    }
}
