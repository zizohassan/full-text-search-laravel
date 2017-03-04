<?php

namespace AdvanceSearch\AdvanceSearchProvider;


use Illuminate\Support\ServiceProvider;

class AdvanceSearchProvider extends ServiceProvider
{
    /****
     * register command
     */
    public function boot(){
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeIndexCommand::class
            ]);
        }
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Search' , function(){
            return new Search();
        });
    }
}
