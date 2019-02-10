<?php
/**
 * Created by PhpStorm.
 * User: sunlong
 * Date: 2019-02-10
 * Time: 17:39
 */

namespace Lostinyou\Module\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class InitModuleCommand extends Command
{

    protected $name = 'module:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '初始化模块路由文件';


    /**
     * Execute the console command.
     *
     */
    public function handle()
    {

        if ($this->confirm('Would you like to create a modules-route? [y|N]')) {
            $this->call('module:init-route', [
                'name' => 'modules'
            ]);
        }
        if ($this->confirm('Would you like to update a RouteServiceProvider ? [y|N]')) {
            $this->call('module:init-route-provider', [
                'name'    => 'RouteServiceProvider',
                '--force' => $this->option('force'),
            ]);
        }

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
            ]
        ];
    }

}
