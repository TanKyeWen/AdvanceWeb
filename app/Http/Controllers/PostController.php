<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //View all tasks
    public function viewAll()
    {
        if (Gate::allows('isAdmin')) 
        {
            dd('Admin allowed');
        } else {
            dd('You are not an Admin');
        }
    }

    //View own tasks
    public function view()
    {
        if (Gate::allows('isUser')) 
        {
            dd('User allowed');
        } else if (Gate::allows('isAdmin'))
        {
            dd('Admin allowed');
        } else {
            dd('You are not an authorized User');
        }
    }

    //Create tasks
    public function create()
    {
        if (Gate::allows('isUser')) 
        {
            dd('User allowed');
        } else if (Gate::allows('isAdmin'))
        {
            dd('Admin allowed');
        } else {
            dd('You are not an authorized User');
        }
    }

    //Edit all tasks
    public function editAll()
    {
        if (Gate::allows('isAdmin')) 
        {
            dd('Admin allowed');
        } else {
            dd('You are not an admin');
        }
    }

    //Edit tasks
    public function edit()
    {
        if (Gate::allows('isUser')) 
        {
            dd('User allowed');
        } else if (Gate::allows('isAdmin'))
        {
            dd('Admin allowed');
        } else {
            dd('You are not an authorized User');
        }
    }

    //Delete tasks
    public function delete()
    {
        if (Gate::allows('isAdmin')) 
        {
            dd('Admin allowed');
        } else {
            dd('You are not Admin');
        }
    }

    //Update tasks
    public function update()
    {
        if (Gate::allows('isUser')) 
        {
            dd('User allowed');
        } else if (Gate::allows('isAdmin'))
        {
            dd('Admin allowed');
        } else {
            dd('You are not an authorized User');
        }
    }

    //Assign tasks to others
    public function assign()
    {
        if (Gate::allows('isAdmin')) 
        {
            dd('Admin allowed');
        } else {
            dd('You are not Admin');
        }
    }

    //Mark tasks as complete
    public function markAsComplete()
    {
        if (Gate::allows('isUser')) 
        {
            dd('User allowed');
        } else if (Gate::allows('isAdmin'))
        {
            dd('Admin allowed');
        } else {
            dd('You are not an authorized User');
        }
    }
}
