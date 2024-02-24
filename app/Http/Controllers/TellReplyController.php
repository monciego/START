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

        // $request->user()->tellReplies()->create([
        //     'body' => $request->body,
        //     'start_id' => $request->start_id,
        // ]);

        TellReply::create([
            'body' => $request->body,
            'start_id' => $request->start_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success', 'Submitted Successfully!');
    }
}
