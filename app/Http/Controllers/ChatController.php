<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChatController extends Controller
{
    public function chat() {
        $chats = Chat::get();
        $users = User::all();
        $chatss = Chat::all();
    if (auth()->check()) {
    // $chats = auth()->user()->latest()->get();

    $chatss = auth()->user()->usersCoolChats()->get();

    return view('conversation.chat', ['chats' => $chats, 'chatss' => $chatss, 'users' => $users]);
        }
        return back()->with('error', 'Something went wrong!');
    }

    public function startChat(Request $request) {
        $chat = $request->validate([
            'chat_input' => ['required','min:1'],
        ]);

        $chat['chat_input'] = strip_tags($chat['chat_input']);
        $chat['name'] = auth()->user()->name;
        $chat['picture'] = auth()->user()->picture;
        $chat['outgoing_msg_id'] = auth()->user()->unique_id;
        $chat['user_id'] = auth()->id();
        Chat::create($chat);

        return back()->with('success', 'Message Successfully Sent!');
    }
}
