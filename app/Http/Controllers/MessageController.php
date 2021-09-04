<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    
    public function index()
    {
        $messages = Message::orderBy('created_at','DESC')->get();
        return view('backend.emails.list',compact('messages'));
    }

    public function create()
    {
        return view('backend.emails.create');
    }

    public function store(Request $request)
    {
        $message = new Message;
        $message->user_id = Auth::id();
        $message->subject = $request->subject;
        $message->body = $request->body;
        $message->status = $request->status;
        $message->save();
        return redirect()->route('admin.messages');
    }

    public function show($id)
    {
        //
    }

    public function edit(Message $message)
    {
        return view('backend.emails.edit',compact('message'));
    }

    
    public function update(Request $request, Message $message)
    {
        $message->subject = $request->subject;
        $message->body = $request->body;
        $message->status = $request->status;
        $message->save();
        return redirect()->route('admin.messages');
    }

    
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages');
    }
}
