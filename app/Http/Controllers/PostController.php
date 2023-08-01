<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    public function deleteFile(Post $post)
    {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
            return back()->with('success', 'File successfully deleted!');
        }

        return back()->with('error', 'Something went wrong. Try again!');
    }

    public function updateFile(Post $post, Request $request)
    {
        if (auth()->user()->id != $post['user_id']) {
            return back()->with('error', 'Something went wrong. Try again!');
        }
        $incomingFields = $request->validate([
            'title' => ['required', 'min:5', 'max:25'],
            'category' => ['required', 'min:5', 'max:25'],
            'description' => ['required', 'min:5', 'max:30'],
            'file_name' => ['required', 'mimes:jpg,png,jpeg,pptx,docx,pdf', 'max:5000000']
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['category'] = strip_tags($incomingFields['category']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $newImageName = time() . '-' . $request->title . '.' . $request->file_name->extension();
        $request->file_name->move(public_path('assets/documentation'), $newImageName);
        $incomingFields['file_name'] = $newImageName;

        $post->update($incomingFields);
        return back()->with('success', 'File successfully updated!');
    }

    public function editFile(Post $post, Request $request)
    {
        if (auth()->user()->id != $post['user_id']) {
            return back()->with('error', 'Something went wrong. Try again!');
        }
        return view('edit_file',  ['post' => $post]);
    }

    public function edit_file(Post $post)
    {
        $messages = Message::all();
        if (auth()->user()->id != $post['user_id']) {
            return back()->with('error', 'Something went wrong. Try again!');
        }
        return view('edit_file',  ['post' => $post, 'messages' => $messages]);
    }


    public function uploadFile(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => ['required', 'min:5', 'max:25'],
            'categery' => ['required', 'min:5', 'max:25'],
            'body' => ['required', 'min:5', 'max:30'],
            'file_name' => ['required', 'mimes:jpg,png,jpeg,pdf,docx,pptx', 'max:5000000']
        ]);

        // if (count($request->title) > 0) {
        //     return back()->with('error', 'Title already exist!');
        // }

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['categery'] = strip_tags($incomingFields['categery']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $newImageName = time() . '-' . $request->title . '.' . $request->file_name->extension();
        $request->file_name->move(public_path('assets/documentation'), $newImageName);
        $incomingFields['file_name'] = $newImageName;
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return back()->with('success', 'File successfully uploaded!');

        
    }
}
