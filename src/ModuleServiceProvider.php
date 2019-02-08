<?php
/**
 * Created by PhpStorm.
 * User: sunlong
 * Date: 2019-02-08
 * Time: 19:14
 */

namespace Lostinyou\Module;


use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{

    protected function configPath()
    {
        return __DIR__ . '/../config/module.php';
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/module.php' => config_path('module.php')
        ], 'config');
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('module', function () {
            return new Module();
        });
    }
}
