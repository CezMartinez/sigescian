<?php

namespace App\Providers;

use App\Http\Validators\HashValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            [   'global.header',
                'global.nav',
                'procedures.administrative.administrative_show',
                'procedures.technician_show'],
            function($view){
            $view->with('user', Auth::user());
            $view->with('signedIn',Auth::check());
        });


        Validator::resolver(function($translator, $data, $rules, $messages) {
            return new HashValidator($translator, $data, $rules, $messages);
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
