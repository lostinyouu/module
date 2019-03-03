<?php
/**
 * Created by PhpStorm.
 * User: sunlong
 * Date: 2019-02-10
 * Time: 15:08
 */

namespace Lostinyou\Module\Commands;


use Illuminate\Console\GeneratorCommand;

class ModelCommand extends GeneratorCommand
{
    protected $name = 'module:model';


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/model.stub';
    }
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建一个模型';
    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {

        $rootNamespace = config('module.root_namespace')
            . "\\" . trim($this->argument('name'));

        return str_replace([
            "\\",
            '/'
        ], '\\', $rootNamespace);
    }
}
