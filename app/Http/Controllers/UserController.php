<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function profile()
    {
        $id = Auth::user()->id;
        return view('auth.profile', [
            'title' => 'Coza Profile',
            'account' => User::where('id', $id)->get(),
        ]);
    }

    public function editprofile()
    {
        $id = Auth::user()->id;
        return view('auth.edit', [
            'title' => 'Edit Profile',
            'account' => User::where('id', $id)->get(),
        ]);
    }

    public function editpassword()
    {
        $id = Auth::user()->id;
        return view('auth.pass', [
            'title' => 'Change Pasword',
            'account' => User::where('id', $id)->get(),
        ]);
    }
    public function update(Request $request)
    {
        try {
            $newData = [
                'username' => $request->input('username'),
                'fullName' => $request->input('fullName'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'phoneNumber' => $request->input('phoneNumber'),
                'status' => 1,
            ];
            DB::table('users')
                ->where('id', Auth()->id())->update($newData);

            Session::flash('success', 'Complete Update');
        } catch (\Exception $err) {
            Session::flash('error', 'Error Update');
            Log::info($err->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An unexpected error occurred.']);
        }

        return redirect('/profile');
    }

    public function updatepassword(User $user, Request $request)
    {
        if (!Hash::check($request->old_password, Auth()->user()->password)) {
            return redirect()->back()->withInput()->withErrors(['old_password' => 'Incorrect old password.']);
        }
        try {
            $newData = [
                'password' => Hash::make(
                    $request->input('password')
                ),
            ];
            DB::table('users')
                ->where('id', Auth()->id())->update($newData);

            Session::flash('success', 'Complete Update');
        } catch (\Exception $err) {
            Session::flash('error', 'Error Update');
            Log::info($err->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An unexpected error occurred.']);
        }

        return redirect('/profile');
    }

    public function forgotpassword(Request $request)
    {
        //mai tui co làm cho,h  đi ngủ
    }

    public function orderlist()
    {
        $id = Auth::user()->id;
        return view('auth.order', [
            'title' => 'Change Pasword',
            'invoices' => Invoice::where('id', $id)->get(),
        ]);
    }
}
