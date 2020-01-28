<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SmsReport;
use App\Models\ServiceStatus;
use App\Models\Balance;
use App\Models\PhonebookGroup;
use App\Models\Phonebook;
use App\Models\SmsSender;
use Auth;

class SmsController extends Controller
{
	// private $rate = 5;
	public function single_sms(){
		return view('pages.send_sms.single_sms');
	}
	public function send_multi_sms(){
		return view('pages.send_sms.multi_sms');
	}
	public function send_group_sms(){
		$groups = PhonebookGroup::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->where('status', 1)->get();
		return view('pages.send_sms.send_group_sms', compact('groups'));
	}
	public function post_method_sms(){
		return view('pages.administrator.post_method_sms');
	}
	public function get_group_number(Request $request){
		$groups = PhonebookGroup::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->where('status', 1)->get();
		$numbers = Phonebook::where('group_id', $request->group_id)->where('user_id', Auth::user()->id)->where('status', 1)->get();
		if (count($numbers) > 0) {
			return view('pages.send_sms.send_group_sms', compact('numbers', 'groups'));
		}else {
			$no_numbers = 'This group has no numbers.';
			return view('pages.send_sms.send_group_sms', compact('no_numbers', 'groups'));
		}

	}
	public function send_sms(Request $request){
		$this->validate($request, [
			'phone_number' => 'required',
		]);
		if (Auth::user()->expiry_date < date('Y-m-d') ) {
			return redirect()->back()->with('error_msg', 'Your SMS Validity Expired !!!');
		}

		if ($request->type == 'unicode') {
			if (empty($request->unicode_message)) {
				return redirect()->back()->with('error_msg', 'Message field required');
			}
			$message = $request->unicode_message.'@Ehsan Software';
			$msg_count = ceil(strlen($message)/160);
			$message = urlencode($message);
		}
		if ($request->type == 'regular') {
			if (empty($request->regular_message)) {
				return redirect()->back()->with('error_msg', 'Message field required');
			}
			$message = $request->regular_message.'@Ehsan Software';
			if(preg_match('/[^\x20-\x7f]/', $message)){
				return redirect()->back()->with('error_msg', 'In regular text message, you can not use Unicode.');
			}else {
				$msg_count = ceil(strlen($message)/160);
			}
			$message = urlencode($message);
		}

		if ($request->phone_number) {
			$phone_number = $request->phone_number;
			$array  = explode(',', $request->phone_number);
			$number_count  = count($array);
			// return $number_count;
		}
		$balances = Balance::where('user_id', Auth::user()->id)->get();
		$old_balance = 0;
		foreach ($balances as $balance) {
			$old_balance += $balance->amount;
		}
		$total_costs = SmsReport::where('user_id', Auth::user()->id)->get();
		$old_cost = 0;
		foreach ($total_costs as $total_cost) {
			$old_cost += $total_cost->cost;
		}
		$sms_rate = Auth::user()->sms_rate;
		$current_balance = $old_balance - $old_cost;
		$msg_cost = $msg_count*$number_count*$sms_rate;
		if ($msg_cost > $current_balance) {
			return redirect()->back()->with('error_msg', 'You have no sufficient Balance. Message cost is = '.$msg_cost.'Taka. But you have '.$current_balance.' Taka');
			die();
		}
		$sms_sender = SmsSender::first();
		if (empty($sms_sender)) {
			return redirect()->back()->with('error_msg', 'SMS Sender is not setup.');
			die();
		}
		$url = 'https://api.mobireach.com.bd/SendTextMessage?Username=esoftware&Password=Abcd@4321&From='.$sms_sender->sender.'&To='.$phone_number.'&Message='.$message;
		// return $url;
		//  Initiate curl 01847417295
		$data = curl_init();
		curl_setopt($data, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($data, CURLOPT_URL, $url);
		$result=curl_exec($data);
		curl_close($data);
		$xml = simplexml_load_string($result);
		$json  = json_encode($xml);
		$arr_data = json_decode($json, true);
		// return $arr_data;
		if (isset($arr_data['ServiceClass']['Status'])) {
			if ($arr_data['ServiceClass']['Status'] == -1 ) {
				return redirect()->back()->with('error_msg', 'Message Sending Failed.');
			}else{
				$report = new SmsReport;
				$report->user_id = Auth::user()->id;
				$report->phone_number = $request->phone_number;
				$report->message = urldecode($message);
				$report->number_count = $number_count;
				$report->sms_rate = $sms_rate;
				$report->cost = $msg_cost;
				$report->save();
				return redirect()->back()->with('success_msg', 'Message Sent Successfully. This message cost '.$msg_cost.'Taka');
			}


		}elseif(isset($arr_data['ServiceClass']['ErrorCode'])){
			if ($arr_data['ServiceClass']['ErrorCode'] != 0) {
				return redirect()->back()->with('error_msg', 'Message Sending Failed.');
			}

		}else {
			$report = new SmsReport;
			$report->user_id = Auth::user()->id;
			$report->phone_number = $request->phone_number;
			$report->message = urldecode($message);
			$report->number_count = $number_count;
			$report->sms_rate = $sms_rate;
			$report->cost = $msg_cost;
			$report->save();
			return redirect()->back()->with('success_msg', 'Message Sent Successfully. This message cost '.$msg_cost.'Taka');
		}


	}

    public function report_list(){
		$reports = SmsReport::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->get();
		return view('pages.report.report_list', compact('reports'));
	}
    public function month_report_list(){
		$reports = SmsReport::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->whereMonth('created_at', date('m'))->get();
		return view('pages.report.month_report_list', compact('reports'));
	}


}
