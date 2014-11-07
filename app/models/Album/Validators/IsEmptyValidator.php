<?php namespace Album\Validators;

use Album\Album;

class IsEmptyValidator implements ValidatorInterface
{
    public function validate(Album $album)
    {
        return $album->exists;
    }
}
