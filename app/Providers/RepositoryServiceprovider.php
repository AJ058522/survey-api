<?php

namespace App\Providers;

use App\Interfaces\SurveyRepositoryInterface;
use App\Repositories\SurveyRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceprovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SurveyRepositoryInterface::class, SurveyRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
