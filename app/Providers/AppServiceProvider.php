<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\ValidatorExtended;

use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::resolver(function($translator, $data, $rules, $messages = array(), $customAttributes = array())
        {
            return new ValidatorExtended($translator, $data, $rules, $messages, $customAttributes);
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
