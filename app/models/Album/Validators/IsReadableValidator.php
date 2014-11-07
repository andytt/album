<?php namespace Album\Validators;

use Album\Album;
use User;

class IsReadableValidator implements UserValidatorInterface
{
    public function validate(Album $album, User $user)
    {
        $isCreator = $album->getAttribute('user_id') === $user->getKey();
        $isPublic  = (boolean) $album->getAttribute('public');

        return $isCreator || (!$isCreator && $isPublic);
    }
}
