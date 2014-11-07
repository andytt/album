<?php namespace Album;

class Album extends \Eloquent
{
    protected $table = 'albums';

    protected $fillable = ['user_id', 'name', 'description', 'public'];

    const USER_ID_COL = 'user_id';

    const NAME_COL = 'name';

    const DESCRIPTION_COL = 'description';

    const PRIVACY_COL = 'public';

    public function photos()
    {
        return $this->hasMany('\Photo\Photo');
    }

    public function getPrivacy()
    {
        return (boolean) $this->getAttribute(static::PRIVACY_COL);
    }
}
