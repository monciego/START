<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Start extends Model
{
    use HasFactory;

    protected $fillable = ['see', 'think', 'aim', 'refine', 'tell', 'identifier_id'];
    protected $with= ['user'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
