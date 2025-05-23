<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function registertationPage()
    {
        return view('auth.register');
    }

    public function register(Request $request){

        // dd($request->all());
        $request->validate( [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => null 
        ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
    }


    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate( [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::attempt($request->only('email', 'password'))){
            return back()->with('status', 'Invalid login details');
        }
        
        return redirect()->route('dashboard');
    }


     public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function dashboard()
{
    return view('dashboard', [
        'userCount' => \App\Models\User::count(),
        'roleCount' => \App\Models\Role::count(),
        'permissionCount' => \App\Models\Permission::count(),
        'postCount' => \App\Models\Post::count(),
    ]);
}

}
