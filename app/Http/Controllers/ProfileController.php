<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function profile($employeenumber) {
        $user = User::whereEmployeenumber($employeenumber)->first();

        return view('user.profile', compact('user'));
    }
}
