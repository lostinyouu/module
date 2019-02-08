<?php
/**
 * Created by PhpStorm.
 * User: sunlong
 * Date: 2019-02-08
 * Time: 19:14
 */

namespace Lostinyou\Module;


use Illuminate\Support\ServiceProvider;
use Lostinyou\Module\Commands\ControllerCommand;

class ModuleServiceProvider extends ServiceProvider
{
    protected $defer = true;

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
            $this->configPath() => config_path('module.php')
        ], 'config');
        $this->commands('Lostinyou\Module\Commands\ControllerCommand');
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
