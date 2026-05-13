<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('customer.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:200',
            'body' => 'required|string',
        ], [
            'subject.required' => 'Subjek wajib diisi.',
            'body.required' => 'Pesan wajib diisi.',
        ]);

        $loggedInUser = auth()->guard('web')->user();
        $newMessage = new Message([
            'subject' => $request->subject,
            'body' => $request->body,
            'created_by' => $loggedInUser->email,
        ]);
        $newMessage->user()->associate($loggedInUser);
        $newMessage->save();

        return back()->with('success', 'Pesan berhasil dikirim ke admin!');
    }
}
