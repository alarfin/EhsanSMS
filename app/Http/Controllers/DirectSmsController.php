<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\DirectSms;

class DirectSmsController extends Controller
{
    public function direct_sms_admin(){
      $clients = Client::orderBy('id', 'desc')->where('status', 1)->get();
      return view('pages.administrator.direct_sms_admin', compact('clients'));
    }

    public function direct_sms_admin_list(){
      $direct_smss = DirectSms::orderBy('id', 'desc')->where('status', 1)->get();
      return view('pages.administrator.direct_sms_admin_list', compact('direct_smss'));
    }

    public function direct_sms_admin_store(Request $request){
      $this->validate($request, [
        "user_id" => "required",
        "count" => "numeric",
      ]);
      $rate = Client::find($request->user_id)->sms_rate;
      $data = $request->all();
      $data['amount'] = $request->count*$rate;
      DirectSms::create($data);
      return redirect()->route('direct_sms_admin_list')->with('success_msg', 'Direct SMS Added Successfully.');
    }

    public function direct_sms_admin_edit($id){
      $clients = Client::orderBy('id', 'desc')->where('status', 1)->get();
      $direct_sms = DirectSms::find($id);
      return view('pages.administrator.direct_sms_admin_edit', compact('clients', 'direct_sms'));
    }


    public function direct_sms_admin_update(Request $request, $id){
      $this->validate($request, [
        "user_id" => "required",
        "count" => "numeric",
      ]);
      $rate = Client::find($request->user_id)->sms_rate;
      $data = $request->all();
      $data['amount'] = $request->count*$rate;
      DirectSms::find($id)->update($data);
      return redirect()->route('direct_sms_admin_list')->with('success_msg', 'Direct SMS Updated Successfully.');
    }

    public function direct_sms_admin_delete($id){
      $direct_sms = DirectSms::find($id);
      $direct_sms->delete();
      return redirect()->route('direct_sms_admin_list')->with('success_msg', 'Direct SMS Deleted Successfully.');
    }


}
