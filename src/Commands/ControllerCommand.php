<?php

namespace Lostinyou\Module\Commands;


use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;


class ControllerCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'module:controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建一个控制器';


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/controller.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {

        $rootNamespace = config('module.root_namespace')
            . "\\" . trim($this->argument('name')) . "\\" . 'Controllers';

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

        $name .= 'Controller';

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
            ['DummyNamespace', 'DummyRootNamespace', 'DummyClassName', 'DummyCamelModelName', 'DummyModelName'],
            [$this->getNamespace($name), $this->rootNamespace(), $this->getClassName(), $this->getCamelModelName(), $this->getNameInput()],
            $stub
        );

        return $this;
    }

    /**隐式绑定模型模型，小驼峰写法
     *
     * @return string
     */
    protected function getCamelModelName()
    {
        return Str::camel($this->getNameInput());
    }

    /**
     * 返回类名
     *
     * @return string
     */
    protected function getClassName()
    {
        return $this->getNameInput() . 'Controller';
    }

}

