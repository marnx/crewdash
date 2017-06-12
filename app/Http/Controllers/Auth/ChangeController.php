<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;

class ChangeController extends Controller
{
    public function index()
    {
        return view('auth.passwords.change');
    }

    public function change(Request $request, $employeenumber)
    {
        $user = User::whereEmployeenumber($employeenumber)->first();

        $oldPassword = $request->oldpassword;
        $currentPassword = $user->password;

        $newPassword = $request->newpassword;
        $confirmPassword = $request->confirmpassword;


        /*if ($oldPassword == $currentPassword) {

            if ($newPassword == $confirmPassword) {
            }
        }*/
        if (Hash::check($oldPassword, $currentPassword && $newPassword == $confirmPassword)) {
            $user->password = bcrypt($newPassword);
            $user->save();
            return view('user.profile', compact('user'));
        }
    }
}