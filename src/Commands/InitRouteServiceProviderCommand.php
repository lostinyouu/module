<?php
/**
 * Created by PhpStorm.
 * User: sunlong
 * Date: 2019-02-10
 * Time: 17:25
 */

namespace Lostinyou\Module\Commands;


use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
class InitRouteServiceProviderCommand extends GeneratorCommand
{
    protected $name = 'module:init-route-provider';

    protected $description = '重写 RouteServiceProvider';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/InitRouteServiceProvider.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {

        $rootNamespace = $rootNamespace . "\\" . 'Providers';

        return str_replace([
            "\\",
            '/'
        ], '\\', $rootNamespace);
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
