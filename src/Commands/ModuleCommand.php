<?php

namespace Lostinyou\Module\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class ModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'module:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建一个模块';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Would you like to create a Controller? [y|N]')) {
            $this->call('module:controller', [
                'name'    => $this->argument('name')
            ]);
        }
        if ($this->confirm('Would you like to create a Model? [y|N]')) {
            $this->call('module:model', [
                'name'    => $this->argument('name')
            ]);
        }
        if ($this->confirm('Would you like to create a Transformer? [y|N]')) {
            $this->call('module:transformer', [
                'name'    => $this->argument('name')
            ]);
        }
        if ($this->confirm('Would you like to create a Route? [y|N]')) {
            $this->call('module:route', [
                'name'    => $this->argument('name')
            ]);
        }
    }
    /**
     * The array of command arguments.
     *
     * @return array
     */
    public function getArguments()
    {
        return [
            [
                'name',
                InputArgument::REQUIRED,
                'The name of class being generated.',
                null
            ],
        ];
    }
}
