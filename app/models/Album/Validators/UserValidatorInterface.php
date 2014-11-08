<?php namespace Album\Validators;

use Album\Album;
use User;

interface UserValidatorInterface
{
    public function validate(Album $album, User $user);
}
