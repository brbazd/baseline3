<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CompletedTasksCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count the amount of tasks users have completed.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
