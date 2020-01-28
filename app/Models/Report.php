<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [ 'user_id', 'phone_number', 'message', 'number_count', 'sms_rate', 'cost', 'status', ];
}
