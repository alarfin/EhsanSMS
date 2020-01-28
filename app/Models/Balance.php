<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Balance extends Model
{
    public function user(){
		return $this->belongsTo(User::Class, 'user_id');
	}



	protected $fillable = [
        'trx_id', 'user_id', 'amount', 'status',
    ];
}
