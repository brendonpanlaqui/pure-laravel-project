<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Job;


class MessageController extends Controller {
    public function index()
    {
        // Retrieve the list of conversations for the logged-in user
        $conversations = Message::where('sender_id', auth()->id())
            ->orWhere('recipient_id', auth()->id())
            ->with(['sender', 'recipient']) // Eager load the sender and recipient relationships
            ->get()
            ->groupBy(function ($message) {
                return $message->sender_id === auth()->id() ? $message->recipient_id : $message->sender_id;
            });

        return view('messages.index', compact('conversations'));
    }
    
    // Fetch conversation history between logged-in user and the recipient
    public function show($userId)
    {
        $recipient = User::findOrFail($userId);

        // Fetch messages exchanged between the logged-in user and the recipient
        $messages = Message::where(function ($query) use ($recipient) {
            $query->where('sender_id', auth()->id())
                  ->where('recipient_id', $recipient->id);
        })
        ->orWhere(function ($query) use ($recipient) {
            $query->where('sender_id', $recipient->id)
                  ->where('recipient_id', auth()->id());
        })
        ->orderBy('created_at', 'asc')
        ->get();

        // Mark all unread messages as read for the logged-in user
        foreach ($messages as $message) {
            if ($message->recipient_id == auth()->id() && !$message->is_read) {
                $message->is_read = true;
                $message->save();
            }
        }

        // Pass data to the view
        return view('messages.show', [
            'messages' => $messages,
            'recipient' => $recipient
        ]);
    }

    // Send a new message
    public function send(Request $request, $userId)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $recipient = User::findOrFail($userId);

        // Save the new message
        $message = new Message();
        $message->sender_id = auth()->id();
        $message->recipient_id = $recipient->id;
        $message->body = $request->body;
        $message->save();

        return redirect()->route('messages.show', ['userId' => $recipient->id])
         ->with('message', 'Your message has been sent!');
    }
}