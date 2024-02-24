<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TellReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'start_id',
        'user_id'
    ];

    protected $with = ['user'];

    public function start()
    {
        return $this->belongsTo(Start::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
