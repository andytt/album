<?php

class Album extends Eloquent
{
    protected $table = 'albums';

    protected $fillable = ['user_id', 'name', 'description', 'public'];

    public function photos()
    {
        return $this->hasMany('Photo');
    }
}
