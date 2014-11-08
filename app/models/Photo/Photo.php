<?php namespace Photo;

class Photo extends \Eloquent
{
    protected $table = 'photos';

    protected $fillable = ['album_id', 'file_id', 'name', 'description'];

    const ALBUM_ID_COL = 'album_id';

    const NAME_COL = 'name';

    const DESCRIPTION_COL = 'description';

    const FILE_ID_COL = 'file_id';
}
