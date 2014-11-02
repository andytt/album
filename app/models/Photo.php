<?php

class Photo extends Eloquent
{
    protected $table = 'photos';

    protected $fillable = ['album_id', 'file_id', 'name', 'description'];
}
