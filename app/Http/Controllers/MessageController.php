<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MessageController extends Controller
{
    public function message(Message $message) {
        $messages = Message::paginate(10);
    return view('message', ['messages' => $messages]);
        
    }

    public function deleteMessages(Message $message)
    {
            $message->delete();
            return back()->with('success', 'Message successfully deleted!');
    }

    public function messages(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email'],
            'picture' => ['required', 'mimes:jpg,png,jpeg', 'max:1000000']
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->picture->extension();
        $request->picture->move(public_path('assets/message'), $newImageName);
        $incomingFields['picture'] = $newImageName;
        Message::create($incomingFields);

        return back()->with('success', 'Message Successfully Sent!');
    }
}
