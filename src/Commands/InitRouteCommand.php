<?php
/**
 * Created by PhpStorm.
 * User: sunlong
 * Date: 2019-02-10
 * Time: 16:40
 */

namespace Lostinyou\Module\Commands;


use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
class InitRouteCommand extends GeneratorCommand
{
    protected $name = 'module:init-route';

    protected $description = '初始化模块路由';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/init-route.stub';
    }


    protected function qualifyClass($name)
    {

        $name = config('module.init_route_root_namespace') . "\\" . $name;

        return str_replace([
            "\\",
            '/'
        ], '\\', $name);
    }

    /**更改文件目录
     * @param string $name
     * @return string
     */
    protected function getPath($name)
    {
        return base_path().'/'.str_replace('\\', '/', $name).'.php';
    }

    /**
     * The array of command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return [
            [
                'force',
                'f',
                InputOption::VALUE_NONE,
                'Force the creation if file already exists.',
                null
            ],
        ];
    }
}
