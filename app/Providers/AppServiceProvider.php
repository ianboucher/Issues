<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $issueables = Relation::morphMap([
            'bugs' => 'App\Bug',
            'features' => 'App\Feature',
            'tests' => 'App\Test',
        ]);

        view()->composer('*', function ($view) use ($issueables) {
            $view->with('issueables', array_keys($issueables));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
