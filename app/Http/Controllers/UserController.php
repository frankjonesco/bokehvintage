<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show login form
    public function login(){
        $site = Site::where('id', 1)->first();
        $site->views = $site->views() + 1;
        $site->save();
        return view('users.login', [
            'views' => $site->views,
            'active_nav' => 'login'
        ]);
    }

    // Show sign up form
    public function signup(){
        $site = Site::where('id', 1)->first();
        $site->views = $site->views() + 1;
        $site->save();
        return view('users.signup', [
            'views' => $site->views,
            'active_nav' => 'signup'
        ]);
    }

    // Create a new user from the sign up form
    public function create(Request $request){

        // Validate form data
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'username' => ['required', 'min:4', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8',
            'terms_agreed' => 'required'
        ]);

        // Create user
        $user = User::create([
            'hex' => Str::random(11),
            'username' => trim($request->username),
            'email' => trim($request->email),
            'password' => bcrypt($request->password),
            'first_name' => trim($request->first_name),
            'last_name' => trim($request->last_name),
            'active' => 1 
        ]);

        // Log user in
        auth()->login($user);

        return redirect('/')->with('message', 'Account created.')->with('message_part_two', 'Welcome to Bokeh Vintage.');

    }

    // Authenticate for login
    public function authenticate(Request $request){

        // Validate form data
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Attempt login with username
        if(auth()->attempt([
            'username' => $request->username,
            'password' => $request->password
        ])){
            $request->session()->regenerate();
            return redirect('/profile')->with('message', 'Welcome back.');
        }
        
        // Or email
        elseif(auth()->attempt([
            'email' => $request->username,
            'password' => $request->password
        ])){
            $request->session()->regenerate();
            return redirect('/profile')->with('message', 'Welcome back.');
        }
        
        // Or regect login attempt
        else{
            return back()->withErrors(['username' => 'Invalid credentials.'])->onlyInput('username');
        }
    } 

    // Log user out of the site
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out.');

    }


}
