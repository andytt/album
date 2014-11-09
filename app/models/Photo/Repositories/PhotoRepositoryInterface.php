<?php namespace Photo\Repositories;

use Photo\Photo;
use Album\Album;
use User;
use Intervention\Image\Image;

interface PhotoRepositoryInterface
{
    public function findOrNew($photoId);

    public function create(Album $album, $photoName, $photoDescription, $fileId);

    public function update(Photo $photo, $photoName, $photoDescription);

    public function rotateImage(Image $image, $angle, $bgcolor = '#ffffff');

    public function imageWatermark(Image $image, Image $watermark, $position);
}
