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

        $rootNamespace = config('module.root_namespace');

        return str_replace([
            "\\",
            '/'
        ], '\\', $rootNamespace);
    }

    /**
     * Get the destination class path.
     *
     * @param  string $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $name = $name . "\\" . 'Routes';

        return $this->laravel['path'] . '/' . str_replace('\\', '/', $name) . '.php';
    }

    /**
     * Replace the namespace for the given stub.
     *
     * @param  string $stub
     * @param  string $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $stub = str_replace(
            ['DummyRouteUrl', 'DummyRouteModelName', 'DummyRouteName'],
            [$this->getRouteUrl(), $this->getRouteModelName(), $this->getRouteName()],
            $stub
        );

        return $this;
    }

    /**路由 url，单词先处理复数形式，驼峰名称转下划线
     *
     * @return string
     */
    protected function getRouteUrl()
    {
        $name = Str::plural($this->getNameInput());

        return Str::snake($name);
    }

    /**隐式绑定模型模型，小驼峰写法
     *
     * @return string
     */
    protected function getRouteModelName()
    {
        return Str::camel($this->getNameInput());
    }

    /**单词转换中横线写法
     *
     * @return string
     */
    public function getRouteName()
    {
        $name = Str::camel($this->getNameInput());

        return Str::snake($name, '-');
    }
}
