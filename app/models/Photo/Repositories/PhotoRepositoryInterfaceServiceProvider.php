<?php namespace Photo\Repositories;

use Illuminate\Support\ServiceProvider;

class PhotoRepositoryInterfaceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('\Photo\Repositories\PhotoRepositoryInterface', function () {
            return new PhotoRepository;
        });
    }
}
