<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'picture',
        'chat_input',
        'incoming_msg_id',
        'outgoing_msg_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'incoming_msg_id');
    }
}
