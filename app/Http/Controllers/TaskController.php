<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Events\TaskCompleted;

class TaskController extends Controller
{
    public function update(Task $task)
    {
        $task->completed = true;
        $task->completed_at = date('Y-m-d H:i:s');
        $task->save();

        TaskCompleted::dispatch($task);

        return redirect()->back();
    }
}
