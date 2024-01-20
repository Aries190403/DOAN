<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\admin\TextSystemConst;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function create()
    {
        return view('admin.auth.register', [
            'title' => 'Add User',
        ]);
    }

    public function store(UserRegisterRequest $request)
    {
        // dd($request);

        try {
            DB::beginTransaction();

            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email_verified_at' => Carbon::now(),
                'email' => $request->email,
                'isAdmin' => $request->isAdmin,
                'fullName' => $request->fullName,
                'phoneNumber' => $request->phoneNumber,
                'address' => $request->address,
                'status' => 1,
            ]);


            DB::commit();
            Session::flash('success', 'User added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            Session::flash('error', 'Failed to add user. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->back();
    }

    public function list()
    {
        try {
            $allAccount = User::all();

            return view('admin.auth.list', [
                'title' => 'List Account',
                'allAccount' => $allAccount,
                'selectedFilter' => 'all'
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            Session::flash('error', 'Failed to fetch user list. ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        // dd(User::find($id));
        return view('admin.auth.edit', [
            'title' => 'Edit Account: ' . User::find($id)->fullName,
            'user' => User::find($id),
        ]);
    }

    public function update(User $user, Request $request)
    {
        try {
            $request->except('_tokent');

            $user->username = (string)$request->input('username');
            $user->email = (string)$request->input('email');
            $user->fullName = (string)$request->input('fullName');
            $user->phoneNumber = (string)$request->input('phoneNumber');
            $user->address = (string)$request->input('address');
            $user->isAdmin = (string)$request->input('isAdmin');
            $user->status = (string)$request->input('status');

            $user->save();

            Session::flash('success', 'Complete Update');
        } catch (\Exception $err) {
            Session::flash('error', 'Error Update');
            return redirect()->back()->withInput();
        }

        return redirect('/admin/users/list');
    }
}
