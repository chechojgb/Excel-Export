<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index(){
        return view('auth.login');
    }
    public function store(){
        $credentials = request()->only('email', 'password');

        if (auth()->attempt($credentials)) {
            request()->session()->regenerate();

            // return redirect()->intended('');
            if(auth()->user()->role == 'admin'){
                return redirect()->route('customer.view-import');
            }else{
                return redirect()->route('welcome');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function destroy(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
