<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SmsSender;

class SmsSenderController extends Controller
{
    public function sms_sender(){
		$sms_sender = SmsSender::first();
		return view('pages.sms_sender.sms_sender', compact('sms_sender'));
	}

    public function sms_sender_store(Request $request){
		$this->validate($request, [
			"sender" => "required",
		]);
		$data = $request->all();
		SmsSender::create($data);
		return redirect()->route('sms_sender')->with('success_msg', 'SMS Sender Added Successfully.');
	}

    public function sms_sender_update(Request $request, $id){
		$this->validate($request, [
			"sender" => "required",
		]);
		$data = $request->all();
		SmsSender::find($id)->update($data);
		return redirect()->route('sms_sender')->with('success_msg', 'SMS Sender Updated Successfully.');
	}


}
