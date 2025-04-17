<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    //add task
    public function addNewTaskRedirect()
    {
        return view('addTask');
    }

    public function addTask(Request $request)
    {
        $request->validate([
            'task-title-field' => 'required|string|max:255',
            'task-date-field' => 'required|date',
            'task-time-field' => 'required',
            'task-location-field' => 'required|string|max:255',
        ]);

        $user = Auth::user(); // Get the authenticated user

        Task::create([
            'title' => $request->input('task-title-field'),
            'task_date' => $request->input('task-date-field'),
            'task_time' => $request->input('task-time-field'),
            'task_location' => $request->input('task-location-field'),
            'task_tag' => $request->input('task-tag-field'),
            'username' => $user->username, // foreign key reference
        ]);

        return redirect()->route('index', ['username' => $user->username])
                         ->with('success', 'Task added successfully!');
    }

    //edit task
    public function showEditForm($id)
    {
        $task = Task::findOrFail($id); // Fetch the task
        return view('editTask', compact('task')); // Send it to the view
    }

    public function editTask(Request $request)
    {
        $request->validate([
            'task-id' => 'required',
            'task-title-field' => 'required',
            'task-date-field' => 'required',
            'task-time-field' => 'required',
            'task-location-field' => 'required',
            'task-tag-field' => 'required',
        ]);

        $task = Task::findOrFail($request->input('task-id'));

        $task->title = $request->input('task-title-field');
        $task->task_date = $request->input('task-date-field');
        $task->task_time = $request->input('task-time-field');
        $task->task_location = $request->input('task-location-field');
        $task->task_tag = $request->input('task-tag-field');
        $task->save();

        return redirect()->route('index', ['username' => $task->username])
                        ->with('success', 'Task updated successfully!');
    }

    //delete task
    public function deleteTask($id){
        $task = Task::findOrFail($id); // Find the task by ID or throw 404 if not found
        $task->delete(); // Delete the task

        return redirect()->route('index', ['username' => Auth::user()->username])
                        ->with('success', 'Task deleted successfully!');
    }
}
