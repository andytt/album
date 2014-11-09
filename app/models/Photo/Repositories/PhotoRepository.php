<?php namespace Photo\Repositories;

use Album\Album;
use Photo\Photo;
use User;
use Intervention\Image\Image;

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

    public function rotateImage(Image $image, $angle, $bgcolor = '#ffffff')
    {
        return $image->rotate($angle, $bgcolor);
    }

    public function imageWatermark(Image $image, Image $watermark, $position)
    {
        $width = intval(ceil($image->width() * 0.3), 10);
        $watermark = $watermark->widen($width);
        return $image->insert($watermark, $position);
    }
}
