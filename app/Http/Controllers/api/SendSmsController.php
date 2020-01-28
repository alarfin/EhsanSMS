<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SmsReport;
use App\Models\ServiceStatus;
use App\Models\Balance;
use App\Models\SmsSender;
use App\Models\DirectSms;
use App\Models\User;
class SendSmsController extends Controller
{
    public function send_sms(Request $request){
		if (isset($_GET['api_key']) && isset($_GET['sender_id']) && isset($_GET['number']) && isset($_GET['message'])) {
			$user = User::where('api_key', $_GET['api_key'])->where('sender_id', $_GET['sender_id'])->first();
			if (!empty($user)) {
                if ($user->expiry_date < date('Y-m-d')) {
                    return response()->json(['status' => 'Your SMS validity expired !']);
                }
				if (!empty($_GET['number']) && !empty($_GET['message'])) {
					$number = $_GET['number'];
					$message = $_GET['message'].'@Ehsan Software';
					if(preg_match('/[^\x20-\x7f]/', $message)){
						$msg_count = ceil(strlen($message)/160);
					}else{
						$msg_count = ceil(strlen($message)/160);
					}
					$message = urlencode($message);

					$phone_number = str_replace(' ', '', $number);
					$array  = explode(',', $phone_number);
					$number_count  = count($array);
					// return response()->json(['status' => $number_count]);
					$balances = Balance::where('user_id', $user->id)->get();
					$old_balance = 0;
					foreach ($balances as $balance) {
						$old_balance += $balance->amount;
					}
					$total_costs = SmsReport::where('user_id', $user->id)->get();
					$old_cost = 0;
					foreach ($total_costs as $total_cost) {
						$old_cost += $total_cost->cost;
					}
					$sms_rate = $user->sms_rate;
					$current_balance = $old_balance - $old_cost;
					$msg_cost = $msg_count*$number_count*$sms_rate;
					if ($msg_cost > $current_balance) {
						return response()->json(['status' => 'You have no sufficient Balance.']);
					}
                    $sms_sender = SmsSender::first();
            		if (empty($sms_sender)) {
            			return response()->json(['status' => 'SMS Sender is not setup.']);
            		}
					$url = 'https://api.mobireach.com.bd/SendTextMessage?Username=esoftware&Password=Abcd@4321&From='.$sms_sender->sender.'&To='.$phone_number.'&Message='.$message;
					// return $url;
					//  Initiate curl
					$data = curl_init();
					curl_setopt($data, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($data, CURLOPT_URL, $url);
					$result=curl_exec($data);
					curl_close($data);
					$xml = simplexml_load_string($result);
					$json  = json_encode($xml);
					$arr_data = json_decode($json, true);
					if (isset($arr_data['ServiceClass']['Status'])) {
						if ($arr_data['ServiceClass']['Status'] == -1 ) {
							return redirect()->back()->with('error_msg', 'Message Sending Failed.');
						}else{
							$report = new SmsReport;
							$report->user_id = $user->id;
							$report->phone_number = $phone_number;
							$report->message = urldecode($message);
							$report->number_count = $number_count;
							$report->sms_rate = $sms_rate;
							$report->cost = $msg_cost;
							$report->save();
							return response()->json(['status' => 'Message Sent Successfully. This message cost '.$msg_cost.' Taka']);
						}

					}elseif(isset($arr_data['ServiceClass']['ErrorCode'])){
						if ($arr_data['ServiceClass']['ErrorCode'] != 0) {
							return response()->json(['status' => 'Message Sending Failed.']);
						}

					}else {
						$report = new SmsReport;
						$report->user_id = $user->id;
						$report->phone_number = $phone_number;
						$report->message = urldecode($message);
						$report->number_count = $number_count;
						$report->sms_rate = $sms_rate;
						$report->cost = $msg_cost;
						$report->save();
						return response()->json(['status' => 'Message Sent Successfully. This message cost '.$msg_cost.' Taka']);
					}
				}else{
					return response()->json(['status' => 'Number or message must not empty']);
				}

			}else {
				return response()->json(['status'=>'API Key or Sender ID not Found.']);
			}
		}else{
			return response()->json(['status'=>'Parameter Missing']);
		}
	}

  public function sms_balance(){
    $user = User::where('sender_id', $_GET['sender_id'])->where('api_key', $_GET['api_key'])->first();
    if ($user) {
      $total_balance = Balance::where('user_id', $user->id)->sum('amount');
  	  $total_cost = SmsReport::where('user_id', $user->id)->sum('cost');
      $direct_sms_cost = DirectSms::where('user_id', $user->id)->sum('amount');
  	  $current_balance = $total_balance - ($total_cost+$direct_sms_cost);
      $sms = floor($current_balance/$user->sms_rate);
      return response()->json(['balance'=> $current_balance, 'rate' => $user->sms_rate, 'sms' => $sms]);
    }else {
      return response()->json(['status'=>'This Sender ID & API Key not found !']);
    }


  }




}
