<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceStatus;

class ServiceStatusController extends Controller
{
    public function service_status_add(){
		$content = ServiceStatus::first();
		return view('pages.administrator.service_status_add', compact('content'));
	}
    public function service_status_store(Request $request){
		$data = new ServiceStatus;
		$data->sms_rate= $request->sms_rate;
		$data->save();
		return redirect()->back()->with('success_msg', 'Data Added Successfully.');
	}
    public function service_status_update(Request $request){
		$data = ServiceStatus::first();
		$data->sms_rate= $request->sms_rate;
		$data->save();
		return redirect()->back()->with('success_msg', 'Data Updated Successfully.');
	}
}
