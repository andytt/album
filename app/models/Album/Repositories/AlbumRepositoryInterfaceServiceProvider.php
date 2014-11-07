<?php namespace Album\Repositories;

use Illuminate\Support\ServiceProvider;

class AlbumRepositoryInterfaceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('\Album\Repositories\AlbumRepositoryInterface', function () {
            return new AlbumRepository;
        });
    }
}
