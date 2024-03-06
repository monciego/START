<?php

namespace App\Http\Controllers;

use App\Models\TellReply;
use Illuminate\Http\Request;

class TellReplyController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required',
        ]);

        TellReply::create([
            'body' => $request->body,
            'start_id' => $request->start_id,
            'user_id' => auth()->user()->id,
        ]);

        $request->user()->replyNotifications()->create([
            'message' => "Admin replied to your submitted start",
            'start_id' => $request->start_id,
            'receiver_id' => $request->my_id,
        ]);

        return redirect()->back()->with('success', 'Submitted Successfully!');
    }
}
