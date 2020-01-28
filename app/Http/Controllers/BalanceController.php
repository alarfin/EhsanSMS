<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\SmsReport;
use App\Models\Client;
use App\Models\DirectSms;
use App\Models\SmsSender;
use Auth;

class BalanceController extends Controller
{
	public function merchant_tran_id(){
		return view('pages.recharge.merchant_tran_id');
	}
	public function recharge(){
		return view('pages.recharge.recharge');
	}
	public function balance_store(Request $request){
		$sms_sender = SmsSender::first();
		// return $request->trans_id;
		$url = 'https://www.bkashcluster.com:9081/dreamwave/merchant/trxcheck/sendmsg?user=EHSANMARKETING&pass=3H$@nWarket!nG&msisdn='.$sms_sender->sender.'&trxid='.$request->trx_id;
		// return $url;
		//  Initiate curl 01819770294
		$data = curl_init();
		curl_setopt($data, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($data, CURLOPT_URL, $url);
		$result=curl_exec($data);
		curl_close($data);
		//convert xml string into an object
		$xml = simplexml_load_string($result);
		//convert into json
		$json  = json_encode($xml);
		//convert into associative array
		$arr_data = json_decode($json, true);
		// print_r($test); die();
		$trx_status = $arr_data['transaction']['trxStatus'];
		if ($trx_status == 0000) {
			$amount = $arr_data['transaction']['amount'];
			$trx_id = $arr_data['transaction']['trxId'];
			$sender = $arr_data['transaction']['sender'];
			$currency = $arr_data['transaction']['currency'];
			// Save Data To Balance
			$check = Balance::where('trx_id', $trx_id)->first();
			if ($check) {
				return redirect()->back()->with('error_msg', 'Sorry ! This transaction ID already Used.');
			}else{
				$balance = new Balance;
				$balance->user_id = Auth::user()->id;
				$balance->trx_id = $trx_id;
				$balance->amount = $amount;
				$balance->save();
				return redirect()->back()->with('success_msg', 'Your Account Recharge Successfully.');
			}

		}
		if ($trx_status == 0010 || $trx_status == 0011) {
			return redirect()->back()->with('error_msg', 'trxID is valid but transaction is in pending state.Try Later.');
		}
		if ($trx_status == 0100) {
			return redirect()->back()->with('error_msg', 'trxID is valid but transaction has been reversed.');
		}
		if ($trx_status == 0111) {
			return redirect()->back()->with('error_msg', 'trxID is valid but transaction has failed.');
		}
		if ($trx_status == 1001) {
			return redirect()->back()->with('error_msg', 'Invalid MSISDN input. Try with correct mobile no.');
		}
		if ($trx_status == 1002) {
			return redirect()->back()->with('error_msg', 'Invalid trxID, it does not exist.');
		}
		if ($trx_status == 1003) {
			return redirect()->back()->with('error_msg', 'Access denied. Username or Password is incorrect.');
		}
		if ($trx_status == 1004) {
			return redirect()->back()->with('error_msg', 'Access denied. trxID is not related to this username.');
		}
		if ($trx_status == 9999) {
			return redirect()->back()->with('error_msg', 'Could not process request.');
		}if ($trx_status == 4001) {
			return redirect()->back()->with('error_msg', 'You already hit by this ID. Waiting 10 minute and try again');
		}else{
			return redirect()->back()->with('error_msg', 'wopps !!! There was a problem.');
		}
	}

	public function recharge_history(){
		$recharge_histories = Balance::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->get();
		return view('pages.recharge.recharge_history', compact('recharge_histories'));
	}
	public function recharge_docs(){
		return view('pages.recharge.recharge_docs');
	}
	public function balance(){
		$balances = Balance::where('user_id', Auth::user()->id)->sum('amount');
		$costs = SmsReport::where('user_id', Auth::user()->id)->sum('cost');
		$direct_sms_cost = DirectSms::where('user_id', Auth::id())->sum('amount');
		$current_balance = $balances - ($costs+$direct_sms_cost);
		return view('pages.recharge.balance', compact('balances', 'costs', 'direct_sms_cost', 'current_balance'));
	}

	public function recharge_admin(Request $request){
		$clients = Client::orderBy('id', 'desc')->where('status', 1)->get();
		return view('pages.recharge.recharge_admin', compact('clients'));
	}
	public function recharge_admin_store(Request $request){
		$this->validate($request, [
			'user_id' => 'required',
			'amount' => 'required',
		]);
		$balance = new Balance;
		$balance->user_id = $request->user_id;
		$balance->trx_id = 'a_'.substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
		$balance->amount = $request->amount;
		$balance->save();
		return redirect()->route('all_recharge_history')->with('success_msg', 'Reacharge Successfully done.');
	}
	public function all_recharge_history(){
		$recharge_histories = Balance::orderBy('id', 'desc')->get();
		return view('pages.recharge.all_recharge_history', compact('recharge_histories'));
	}

	public function recharge_edit($id){
		$balance = Balance::find($id);
		return view('pages.recharge.recharge_edit', compact('balance'));
	}

	public function recharge_update(Request $request, $id){
		$this->validate($request, [
			'amount' => 'required',
		]);
		$balance = Balance::find($id);
		$balance->amount = $request->amount;
		$balance->save();
		return redirect()->route('all_recharge_history')->with('success_msg', 'Reacharge Successfully Updated.');
	}


}
