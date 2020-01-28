<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
	protected $fillable = [ 'name', 'phone_number', 'status', 'group_id', 'user_id' ];
    public function group(){
		return $this->belongsTo(PhonebookGroup::class, 'group_id');
	}
}
