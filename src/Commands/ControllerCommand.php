<?php

namespace  Lostinyou\Module\Commands;

use Illuminate\Console\Command;

class ControllerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:cccc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '111111111111111';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
