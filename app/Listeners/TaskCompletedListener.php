<?php

namespace App\Listeners;

use App\Events\TaskCompleted;
use App\Notifications\UserTaskNotified;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskCompletedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskCompleted $event): void
    {
        $event->task->user->notify(new UserTaskNotified($event));
    }
}
