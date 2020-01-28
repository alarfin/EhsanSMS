<?php

namespace App\Imports;

use App\Models\Phonebook;
use Maatwebsite\Excel\Concerns\ToModel;
use Session;
use Auth;

class PhonebookImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Phonebook([
			'name'     => $row[0],
           	'phone_number'    => $row[1],
           	'group_id'    => Session::get('group_id'),
           	'user_id'    => Auth::user()->id,
        ]);
    }

}
