<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        return view('login.index');
        
    }

    public function actionlogin(Request $request)
    {
        // dd($request->all());

        $credentials = $request->validate([
            'username'=>'required|string',
            'password'=>'required|string'
        ]);
     
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
     
        return back()->with('loginError', 'Login Failed!');

        // if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        //     # code...
        //     return redirect()->route('dashboard-index');
        // }
        // return redirect()->route('login-index');

        // $data = [
        //     'username' => $request->input('username'),
        //     'password' => $request->input('password'),
        // ];
        // if (Auth::attempt($data)) {
        //     # code...
        //     return redirect()->route('dashboard-index');
        // } else {
        //     Session::flash('error', 'Username or Password is incorrect');
        //     return redirect()->route('login-index');
        // }
    }

    public function actionlogout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login-index');
    }
}
