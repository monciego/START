<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        "message",
        "read_at",
        "start_id",
        "receiver_id"
    ];
}
