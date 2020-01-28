<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SmsReport;
use Auth;

class ReportController extends Controller
{
    public function report_list(){
		$reports = SmsReport::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->get();
		return view('pages.report.report_list', compact('reports'));
	}
    public function month_report_list(){
		$reports = SmsReport::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->whereMonth('created_at', date('m'))->get();
		return view('pages.report.month_report_list', compact('reports'));
	}
}
