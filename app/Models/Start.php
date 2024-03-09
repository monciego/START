<?php

namespace App\Models;

use App\Events\StartCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Start extends Model
{
    use HasFactory;

    protected $fillable = ['see', 'think', 'aim', 'refine', 'tell', 'identifier_id'];

  protected $dispatchesEvents = [

        'created' => StartCreated::class,

    ];
    protected $with= ['user'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tellReplies() {
        return $this->hasMany(TellReply::class);
    }
}
