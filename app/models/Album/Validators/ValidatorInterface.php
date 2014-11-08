<?php namespace Album\Validators;

use Album\Album;

interface ValidatorInterface
{
    public function validate(Album $album);
}
