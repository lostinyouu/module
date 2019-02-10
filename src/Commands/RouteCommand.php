<?php

namespace Lostinyou\Module\Commands;


use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class RouteCommand extends GeneratorCommand
{

    protected $name = 'module:route';

    protected $description = '创建模块路由';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/route.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {

        $rootNamespace = config('module.route_root_namespace');

        return str_replace([
            "\\",
            '/'
        ], '\\', $rootNamespace);
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $name = $name . "\\" . 'Route';

        return $this->laravel['path'] . '/' . str_replace('\\', '/', $name) . '.php';
    }

}
