<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "users";
    protected $fillable = [
        'name', 'email',
        'phone_number',
        'photo', 'bio',
        'company',
        'address',
        'sms_rate',
        'role',
        'sender_id',
        'api_key',
        'status',
        'join_date',
        'expiry_date',
        'status',
        'email_verified_at',
    ];
}
