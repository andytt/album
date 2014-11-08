<?php namespace Album\Validators;

use Album\Album;
use User;

class IsCreatorValidator implements UserValidatorInterface
{
    public function validate(Album $album, User $user)
    {
        return $album->getAttribute('user_id') === $user->getKey();
    }
}
