<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{   
    public function login() {
        return view('index');
    }

    public function forgot_password() {
        return view('forgot-password');
    }

    public function register() {
        $id = 1;
        $messages = Message::all();
        if (Auth::user()->id === $id) {
            return view('register', ['messages' => $messages])->with('success', 'Welcome!!!');
        }
        return back()->with('error', 'You don:t have access to register page!');
    }

    public function dashboard() {
        $messages = Message::all();
        $posts = Post::all();
        $postss = Post::all();
    if (auth()->check()) {
    $posts = auth()->user()->usersCoolPosts()->latest()->paginate(10);

    $postss = auth()->user()->usersCoolPosts()->latest()->get();

    return view('dashboard', ['posts' => $posts, 'postss' => $postss, 'messages' => $messages]);
    }
    return back()->with('error', 'Something went wrong!');

    }

    public function upload_file() {
        $messages = Message::all();
        return view('upload_file', ['messages' => $messages]);
    }

    public function manageFile() {
        $messages = Message::all();
        $posts = Post::all();
    if (auth()->check()) {
    $posts = auth()->user()->usersCoolPosts()->latest()->paginate(10);

    return view('manage_file', ['posts' => $posts, 'messages' => $messages]);
    }
    return back()->with('error', 'Something went wrong!');
    }

    public function edit_profile() {
        $user = [];
        $messages = Message::paginate();
        if (auth()->check()) {
            $user = auth()->user();
        }
        return view('edit_profile', ['users' => $user, 'messages' => $messages]);
    }

    public function messageAdmin() {
    return view('message_admin');
    }

    // public function bss_home_image() {
    //     return view('bss_home_image');
    // }

    // public function bss_logo() {
    //     return view('bss_logo');
    // }

    public function all_members() {
        $messages = Message::all();
        $users = User::all();
    $users = auth()->user()->oldest()->paginate(10);

    return view('all_members', ['users' => $users, 'messages' => $messages]);
    }

    public function manage_all_members() {
        $id = 1;
        $messages = Message::all();
        $users = User::all();
        if (Auth::user()->id === $id) {
            $users = auth()->user()->latest()->paginate(10);

    return view('manage_members', ['users' => $users, 'messages' => $messages])->with('success', 'Welcome!!!');
        }
        return back()->with('error', 'You don:t have access to manage_page page!');
    
    }

    public function logout() {
        return view('index');
    }

}
