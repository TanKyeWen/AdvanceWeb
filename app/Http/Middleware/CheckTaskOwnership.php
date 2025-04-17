<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class CheckTaskOwnership
{
    public function handle($request, Closure $next)
    {
        $taskId = $request->route('id');
        
        // Auth check for Adding Task
        if ($request->has('username') && $request->username !== Auth::user()->username) {
            return redirect()->route('index', ['username' => Auth::user()->username])
                ->with('error', 'You can only create tasks for your own account.');
        }

        // Auth check for Edit and Delete Task
        if ($taskId) {
            $task = Task::findOrFail($taskId);
            
            if (Auth::user()->username !== $task->username) {
                return redirect()->route('index', ['username' => Auth::user()->username])
                    ->with('error', 'You are not authorized to access this task.');
            }
        }
        
        return $next($request);
    }
}