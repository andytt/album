<?php namespace Notifier\Repositories;

use Album\Album;
use Photo\Photo;
use User;

interface NotifierRepositoryInterface
{
    public function newPhotoAdded(User $user, Album $album, Photo $photo);

    public function trigger($channel, $event, array $data);
}
