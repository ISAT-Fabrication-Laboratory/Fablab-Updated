<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatModel extends Model
{
    protected $table = 'chat';
    protected $primaryKey = 'id';
    public $timestamps = false;
    const CREATED_AT = 'created_at';

    protected $fillable = [
        'admin_id', 'user_id', 'sender', 'type', 'data', 'created_at'
    ];

    // public static function getChatHistory($session_id)
    // {
    //     return static::join('users', 'users.id', '=', 'chats.sender')
    //         ->where('users.id', 'user_id')
    //         ->get();
    // }
}
