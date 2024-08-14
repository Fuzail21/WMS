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
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // if ($user && Hash::check($password, $user->password)) {
            // Authentication passed
            return redirect()->intended('dashboard'); // Redirect to dashboard upon successful login
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invali..d credentials'])->withInput($request->only('email'));
    }

}
