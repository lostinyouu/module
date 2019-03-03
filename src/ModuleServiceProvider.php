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
use Lostinyou\Module\Commands\InitModuleCommand;
use Lostinyou\Module\Commands\InitRouteCommand;
use Lostinyou\Module\Commands\InitRouteServiceProviderCommand;
use Lostinyou\Module\Commands\ModelCommand;
use Lostinyou\Module\Commands\ModuleCommand;
use Lostinyou\Module\Commands\RouteCommand;
use Lostinyou\Module\Commands\TransformerCommand;

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
            $this->configPath() => config_path('module.php')
        ], 'config');

        $this->commands(InitModuleCommand::class);
        $this->commands(InitRouteCommand::class);
        $this->commands(InitRouteServiceProviderCommand::class);
        $this->commands(ModuleCommand::class);
        $this->commands(ControllerCommand::class);
        $this->commands(ModelCommand::class);
        $this->commands(RouteCommand::class);
        $this->commands(TransformerCommand::class);
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
