<?php

namespace App\Http\Controllers;

use App\Models\ReplyNotification;
use App\Models\Start;
use Illuminate\Http\Request;

class ReplyNotificationController extends Controller
{
    public function store(Request $request)
    {
        $replies = $request->input('userNotificationReplies');

        foreach ($replies as $reply) {
            $notificationId = $reply['start_id'];
            ReplyNotification::where('start_id', $notificationId)->delete();
        }

        return redirect()->back()->with('success','Marked as unread');
    }
}
