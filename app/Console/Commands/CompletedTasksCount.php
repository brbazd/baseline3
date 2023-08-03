<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Models\User;
use Illuminate\Console\Command;
use App\Notifications\UserCountNotified;

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
        $users = User::all();

        foreach($users as $user)
        {
            $count = count(Task::where('completed',true)->where('user_id',$user->id)->get());

            if($count > 0)
            {
                $user->notify(new UserCountNotified($user,$count));
            }

        }
    }
}
