<?php
/**
 * Created by PhpStorm.
 * User: sunlong
 * Date: 2019-02-21
 * Time: 17:31
 */

namespace Lostinyou\Module\Commands;


use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class TransformerCommand extends GeneratorCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'module:transformer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建一个资源转换器';

    /**文件夹
     * @var string
     */
    protected $folderName = 'Transformer';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/transformer.stub';
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
            . "\\" . trim($this->argument('name')) . "\\" . $this->folderName;

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

        $name .= 'Transformer';

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
            ['DummyNamespace', 'DummyRootNamespace','DummyModelCamelName'],
            [$this->getNamespace($name), $this->rootNamespace(),$this->getCamelModelName()],
            $stub
        );

        return $this;
    }

    /**模型小驼峰变量
     *
     * @return string
     */
    protected function getCamelModelName()
    {
        return Str::camel($this->getNameInput());
    }
}
