<?php namespace Notifier\Repositories;

use Illuminate\Support\ServiceProvider;

class NotifierRepositoryInterfaceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('\Notifier\Repositories\NotifierRepositoryInterface', function () {
            return new NotifierRepository;
        });
    }
}
