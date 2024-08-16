<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function createUser(Request $request)
    {

        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|max:6',
            'designation' => 'required|string',
            'department' => 'required|string'
        ]);

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'designation' => $request->designation,
            'department' => $request->department,

        ]);

        // Optionally, you can log in the newly created user
        // auth()->login($user);

        // Redirect or return a response
        return redirect()->route('home')->with('success', 'User created successfully.');
    }


    public function login(Request $request)
    {
        // Retrieve email and password from the request
        $email = $request->input('email');
        $password = $request->input('password');

        // Validate the login request
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $email)->first();

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $email, 'password' => $password, 'is_deleted' => '0'])) {
            // if ($user && Hash::check($password, $user->password)) {
            // Authentication passed
            return redirect()->intended('dashboard'); // Redirect to dashboard upon successful login
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invali..d credentials'])->withInput($request->only('email'));
    }


    public function list(){
        $users = User::all();
        $data = compact('users');
        return view('users.list')->with($data);
    }

    public function edit($id){
        $user = User::find($id);
        $data = compact('user');
        return view('users.edit')->with($data);
    }

    public function update(Request $request, $id){

        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->is_deleted = $request->account_status;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();


        return redirect('user/list')->with('success', 'User successfully updated');

    }

    public function delete(Request $request, $id){

        $user = User::find($id);
        $user->is_deleted = '1';
        $user->save();

        return redirect('user/list')->with('success', 'User successfully deleted');
    }

}
