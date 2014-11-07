<?php namespace Album\Validators;

use Album\Album;

class IsPublicValidator implements ValidatorInterface
{
    public function validate(Album $album)
    {
        return (boolean) $album->getAttribute('public');
    }
}
