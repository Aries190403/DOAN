<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Helpers\admin\TextSystemConst;
use Carbon\Carbon;
use Hash;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showregister()
    {
        return view('auth.register');
    }

    public function postregister(UserRegisterRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = new User();
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->email_verified_at = Carbon::now();
            $user->email = $request->email;
            $user->fullName = $request->fullName;
            $user->phoneNumber = $request->phoneNumber;
            $user->address = $request->address;
            $user->status = 1;
            $user->save();

            DB::commit();
            return redirect()->route('login');
        } catch (\Exception $e) {
            // Khi có lỗi xảy ra thì rollback giao dịch và hiển thị thông báo lỗi
            Log::error($e);
            DB::rollBack();
            return back()->with('error', TextSystemConst::CREATE_FAILED);
        }
    }
}
