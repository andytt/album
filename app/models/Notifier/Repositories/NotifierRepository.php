<?php namespace Notifier\Repositories;

use Album\Album;
use Photo\Photo;
use User;
use URL;

class NotifierRepository implements NotifierRepositoryInterface
{
    protected $notifier;

    public function __construct()
    {
        $this->notifier = new \Pusher(
            $_ENV['PUSHER_APP_KEY'],
            $_ENV['PUSHER_APP_SECRET'],
            $_ENV['PUSHER_APP_ID']
        );
    }

    public function newPhotoAdded(User $user, Album $album, Photo $photo)
    {
        $this->trigger('photos', 'create', [
            'user' => $user->getAttribute('email'),
            'album' => $album->toArray(),
            'url' => URL::route('albums.photos.show', [$album->getKey(), $photo->getKey()])
        ]);
    }

    public function trigger($channel, $event, array $data)
    {
        $this->notifier->trigger($channel, $event, $data);
    }
}
