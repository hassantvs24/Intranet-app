<?php

namespace App\Providers;

use App\Board;
use App\Group;
use App\GroupAdmin;
use App\GroupUser;
use App\Observers\AdminObserver;
use App\Observers\BoardObserver;
use App\Observers\GroupObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Group::observe(GroupObserver::class);
        Board::observe(BoardObserver::class);
        GroupAdmin::observe(AdminObserver::class);
        User::observe(UserObserver::class);
    }
}
