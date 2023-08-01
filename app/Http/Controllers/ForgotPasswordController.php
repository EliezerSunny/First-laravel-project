<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ForgotPassword;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    public function forgot_password(Request $request) {
        $request->validate([
            'email' => 'requred|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'User not found!');
        } else {
            $reset_code=Str::random(200);
            forgotpassword::create([
                'user_id'=>$user->id,
                'token'=>$reset_code
            ]);


        }
        

        // if ($error->any('email')) {
        //     return back()->with('error', 'Email is required!');
        // }
    }
}
