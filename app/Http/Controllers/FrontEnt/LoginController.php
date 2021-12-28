<?php

namespace App\Http\Controllers\FrontEnt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // dd($request->email);
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->hasAnyRole('imam')) {
                return redirect('/imam');
            }else if (Auth::user()->hasAnyRole('user')) {
                return redirect('/user1');
            } else {
                return redirect(route('home'));
            }
        }

        return back()->withErrors([
            'mobile' => 'The provided credentials do not match our records.',
        ]);
    }
}
