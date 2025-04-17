<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user can view any tasks.
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine if the user can view the task.
     */
    public function view(User $user, Task $task)
    {
        return $user->username === $task->username;
    }

    /**
     * Determine if the user can create tasks.
     */
    public function create(User $user)
    {
        return true; // Any authenticated user can create tasks
    }

    /**
     * Determine if the user can update the task.
     */
    public function update(User $user, Task $task)
    {
        return $user->username === $task->username;
    }

    /**
     * Determine if the user can delete the task.
     */
    public function delete(User $user, Task $task)
    {
        return $user->username === $task->username;
    }
}