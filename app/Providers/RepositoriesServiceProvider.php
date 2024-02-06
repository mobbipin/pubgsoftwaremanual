<?php

namespace App\Providers;

use App\Contracts\Categories\CategoryContract;
use App\Contracts\Users\UserContract;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Users\UserRepository;
use App\Contracts\Settings\SettingContract;
use App\Contracts\Profiles\AdminProfileContract;
use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Settings\SettingRepository;
use App\Repositories\Profiles\AdminProfileRepository;

class RepositoriesServiceProvider extends ServiceProvider
{
    protected $repositories = [
           
             AdminProfileContract::class=>AdminProfileRepository::class,
             UserContract::class=>UserRepository::class,
             SettingContract::class=>SettingRepository::class,
             CategoryContract::class=>CategoryRepository::class,
         

        ];
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
