<?php

namespace Lostinyou\Module\Commands;


use Illuminate\Console\GeneratorCommand;


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

        $rootNamespace = config('module.controller_root_namespace')
            . "\\" . trim($this->argument('name')) . "\\" . 'Controllers';

        return str_replace([
            "\\",
            '/'
        ], '\\', $rootNamespace);
    }

    protected function getNameInput()
    {
        return trim($this->argument('name')) . 'Controller';
    }

}

