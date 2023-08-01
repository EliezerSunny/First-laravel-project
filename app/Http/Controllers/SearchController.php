<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function searchFile(Post $post, Request $request) {
        $query = $request->input('q');
        $messages = Message::all();
        $results = Post::all();
    
    if (!auth()->check()) {

        $results = Auth::user()->usersCoolPosts()->where('title', 'LIKE', '%' . $query . '%')->orWhere('body', 'LIKE', '%' . $query . '%')->paginate(10);

        return view('search', ['results' => $results, 'messages' => $messages]);
        }

        return back()->with('error', 'Opps, Something went wrong!');
    }
}

// $2y$10$R6r935bbpZAGGd4o9QffCes7/RXJ3jFJOK1XcctndD2N9XAR.C7o2
