<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')
            ->select('id', 'user_id', 'subject', 'body', 'created_at')
            ->latest()->get();

        return view('admin.messages.index', compact('messages'));
    }
}
