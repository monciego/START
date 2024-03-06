<?php

namespace App\Http\Controllers;

use App\Models\ReplyNotification;
use Illuminate\Http\Request;

class ReplyNotificationController extends Controller
{
    public function update(Request $request, ReplyNotification $reply_notification)
    {
        dd($request);
    }
}
