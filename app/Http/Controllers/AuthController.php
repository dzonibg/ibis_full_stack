<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller //TODO
{

    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('register');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return Redirect::to("login");
    }

    public function postRegistration(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        $check = $this->create($data);

        return redirect("dashboard");
    }

    public function dashboard()
    {

        if(Auth::check()){
            return view('dashboard');
        }
        return redirect("login");
    }

    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
