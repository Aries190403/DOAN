<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login System'
        ]);
    }

    public function store(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))){
            $user = Auth::user();
            if ($user->isAdmin == 1) {
                return redirect()->route('admin');
            }
            return redirect()->route('home');
            }
            Session()->flash('error', 'Email or Password dont correct');
            return redirect()->back();
    }

    /**
     * Log the user out of the application.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
