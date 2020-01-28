<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\SmsReport;
use App\Models\Balance;
use App\Models\Phonebook;
use App\Models\DirectSms;
use App\Models\PhonebookGroup;
use Auth;

class AdminController extends Controller
{
    public function home(){
		$total_clients = count(Client::where('status', 1)->get());
		$sms_costs = SmsReport::where('user_id', Auth::user()->id)->sum('cost');
		$total_send_sms = $sms_costs/Auth::user()->sms_rate;
		$month_sms_costs = SmsReport::where('user_id', Auth::user()->id)->whereMonth('created_at', '=', date('m'))->sum('cost');
		$monthly_send_sms = $month_sms_costs/Auth::user()->sms_rate;
		$total_contacts = count(Phonebook::where('user_id', Auth::user()->id)->get());
		$total_group = count(PhonebookGroup::where('user_id', Auth::user()->id)->get());
		$total_balance = Balance::where('user_id', Auth::user()->id)->sum('amount');
		$total_cost = SmsReport::where('user_id', Auth::user()->id)->sum('cost');
		$current_balance = $total_balance - $total_cost;
		return view('pages.home.admin_dashboard', compact('total_clients', 'total_send_sms', 'monthly_send_sms', 'total_contacts', 'total_group', 'current_balance'));
	}
    public function client(){
		$sms_costs = SmsReport::where('user_id', Auth::user()->id)->sum('cost');
		$total_send_sms = $sms_costs/Auth::user()->sms_rate;
		$month_sms_costs = SmsReport::where('user_id', Auth::user()->id)->whereMonth('created_at', '=', date('m'))->sum('cost');
		$monthly_send_sms = $month_sms_costs/Auth::user()->sms_rate;
		$total_contacts = count(Phonebook::where('user_id', Auth::user()->id)->get());
		$total_group = count(PhonebookGroup::where('user_id', Auth::user()->id)->get());
		$total_balance = Balance::where('user_id', Auth::user()->id)->sum('amount');
		$total_cost = SmsReport::where('user_id', Auth::user()->id)->sum('cost');
		$direct_sms_cost = DirectSms::where('user_id', Auth::id())->sum('amount');
		$current_balance = $total_balance - ($total_cost+$direct_sms_cost);
		return view('pages.home.client_dashboard', compact('total_send_sms', 'monthly_send_sms', 'total_contacts', 'total_group', 'current_balance','direct_sms_cost'));
	}
}
