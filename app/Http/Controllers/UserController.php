<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class UserController extends Controller
{
    public function login(Request $request)
    {
            $request->validate([
            'loginemail' => 'required|email',
            'loginpassword' => 'required'
        ]);

        $credentials = [
            'email' => $request->loginemail,
            'password' => $request->loginpassword
        ];

        // $empty = [
        //     'email' => $request->loginemail,
        //     'password' => $request->loginpassword
        // ];

        // if (empty($request->input($credentials))) {
        //     return redirect('/')->with('error', 'Credentials require!');
        // }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
                return redirect('/dashboard')->with('success', 'Successfully logged in!');
            
        }else{

        return redirect('/')->with('error', 'Incorrect credentials!');
        }
            
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Successfully logged out!');
    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:200'],
            'picture' => ['required', 'mimes:jpg,png,jpeg,webp', 'max:1000000']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $newImageName = time() . '-' . $request->name . '.' . $request->picture->extension();
        $request->picture->move(public_path('assets/picture'), $newImageName);
        $incomingFields['picture'] = $newImageName;
        $incomingFields['unique_id'] = rand(time(), 100000000);
        $incomingFields['status'] = 'Active Now';
        $user = User::create($incomingFields);
        // auth()->login($user);

        return redirect('/register')->with('success', 'Member Successfully Added!');
    }

    public function editProfile(Request $request) {
        $user = Auth::user();
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5', 'max:20'],
            'picture' => ['required', 'mimes:jpg,png,jpeg,webp', 'max:1000000']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $newImageName = time() . '-' . $request->name . '.' . $request->picture->extension();
        $request->picture->move(public_path('assets/picture'), $newImageName);
        $incomingFields['picture'] = $newImageName;
        $user->update($incomingFields);

        return back()->with('success', 'Profile successfully updated!');
    }


    public function deleteMember(User $user, Post $post)
    {
        $id = 1;
        if (auth()->user()->id === $id) {

            $user->delete();
            return back()->with('success', 'Member successfully deleted!');
        }

        return back()->with('error', 'Something went wrong. Try again!');
    }
}
