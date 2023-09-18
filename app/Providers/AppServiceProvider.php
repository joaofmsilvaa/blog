<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function (User $user){
            return $user->username == 'joao';
        });

        Gate::define('editProfile', function (){
            return request()->route('user')->id == auth()->user()->id;
        });

        Gate::define('posted', function (){
            return request()->route('post')->status == 0 && auth()->user()->username == 'joao';
        });

    }
}
