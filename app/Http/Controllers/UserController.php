<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
  public function signUp(Request $request){
    $request->validate([
      'username' => 'required|unique:users,username',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:6',
      're-password' => 'required|same:password',
    ]);

    // Save to database
    $user = new User();
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));
    $user->save();

    // Automatically log in the user after sign up
    Auth::login($user);

    // Redirect to index with username in URL
    return redirect()->route('index', ['username' => $user->username]);

  }

  public function updateUsername(Request $request)
  {
      $request->validate([
          'username' => 'required|unique:users,username',
          'password' => 'required',
      ]);

      $user = Auth::user();

      if (!Hash::check($request->password, $user->password)) {
          return back()->withErrors(['password' => 'Incorrect password.']);
      }

      $user->username = $request->username;
      $user->save();

      // Redirect to index with updated username
      return redirect()->route('index', ['username' => $user->username])
                      ->with('success', 'Username updated successfully!');
  }

  public function updateEmail(Request $request)
  {
      $request->validate([
          'email' => 'required|email|unique:users,email',
          'password' => 'required',
      ]);

      $user = Auth::user();

      if (!Hash::check($request->password, $user->password)) {
          return back()->withErrors(['password' => 'Incorrect password.']);
      }

      $user->email = $request->email;
      $user->save();

      // Redirect to index with updated email
      return redirect()->route('index', ['username' => $user->username])
                      ->with('success', 'email updated successfully!');
  }

  public function updatePassword(Request $request)
  {
      $request->validate([
          'password' => 'required',
          'password_new' => 'required|min:6',
          're-password_new' => 'required|same:password_new',
      ]);

      $user = Auth::user();

      if (!Hash::check($request->password, $user->password)) {
          return back()->withErrors(['password' => 'Incorrect password.']);
      }

      $user->password = $request->password_new;
      $user->save();

      // Redirect to index with updated password
      return redirect()->route('index', ['username' => $user->username])
                      ->with('success', 'email updated successfully!');
  }

  public function showIndex($username)
    {
        // Fetch all tasks for the user
        $tasks = Task::where('username', $username)->get();

        return view('index', [
            'username' => $username,
            'tasks' => $tasks
        ]);
    }

}
