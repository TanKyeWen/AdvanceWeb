<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    //add task
    public function addNewTaskRedirect()
    {
        $tags = Tag::all();
        return view('addTask', compact('tags'));
    }
    public function addTask(Request $request)
    {
        $request->validate([
            'task-title-field' => 'required|string|max:255',
            'task-date-field' => 'required|date',
            'task-time-field' => 'required',
            'task-location-field' => 'required|string|max:255',
            'task-tag-field' => 'required|exists:tags,id',
        ]);

        // dd($request->all());
        $user = Auth::user(); // Get the authenticated user

        Task::create([
            'title' => $request->input('task-title-field'),
            'task_date' => $request->input('task-date-field'),
            'task_time' => $request->input('task-time-field'),
            'task_location' => $request->input('task-location-field'),
            'tag_id' => $request->input('task-tag-field'),
            'username' => Auth::user()->username, // foreign key reference
        ]);
        return redirect()->route('index', ['username' => Auth::user()->username])
                            ->with('success', 'Task added successfully!');
    }

    //edit task
    public function showEditForm($id)
    {
        $task = Task::findOrFail($id); // Fetch the task
        $tags = Tag::all();

        // Only let Authorised person to edit
        $this->authorize('update', $task);
        return view('editTask', compact('task', 'tags')); // Send it to the view
    }

    public function editTask(Request $request)
    {
        $request->validate([
            'task-id' => 'required',
            'task-title-field' => 'required',
            'task-date-field' => 'required',
            'task-time-field' => 'required',
            'task-location-field' => 'required',
            'task-tag-field' => 'required|exists:tags,id',
        ]);

        $task = Task::findOrFail($request->input('task-id'));

        // Only Let Authorised person to update
        $this->authorize('update', $task);

        $task->title = $request->input('task-title-field');
        $task->task_date = $request->input('task-date-field');
        $task->task_time = $request->input('task-time-field');
        $task->task_location = $request->input('task-location-field');
        $task->tag_id = $request->input('task-tag-field');
        $task->save();

        return redirect()->route('index', ['username' => $task->username])
                        ->with('success', 'Task updated successfully!');
    }

    //delete task
    public function deleteTask($id){
        $task = Task::findOrFail($id); // Find the task by ID or throw 404 if not found

        // Only Let Authorised person to delete
        $this->authorize('delete', $task);
        $task->delete(); // Delete the task

        return redirect()->route('index', ['username' => Auth::user()->username])
                        ->with('success', 'Task deleted successfully!');
    }
}
