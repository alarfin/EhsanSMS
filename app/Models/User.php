<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
