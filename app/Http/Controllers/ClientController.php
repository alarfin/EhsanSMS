<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use Illuminate\Http\Request;
use Storage;

class ClientController extends Controller
{
    public function client_add(){
		return view('pages.client.client_add');
	}
    public function client_list(){
		$clients = Client::where('role', 'client')->get();
		return view('pages.client.client_list', compact('clients'));
	}
    public function client_store(Request $request){
		$this->validate($request, [
			'name' => 'string|required',
			'email' => 'email|unique:users',
			'phone_number' => 'required|unique:users',
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
		$client = new Client;
		$client->name = $request->name;
		$client->email = $request->email;
		$client->phone_number = $request->phone_number;
		$client->company = $request->company;
		$client->address = $request->address;
		$client->bio = $request->bio;
		$client->sms_rate = $request->sms_rate;
		$client->role = $request->role;
		$client->join_date = date('Y-m-d', strtotime($request->join_date));
		$client->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
		$client->api_key = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 30);
		$client->sender_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15);
		$client->password = Hash::make($request->password);
		if ($request->hasFile('photo')) {
			if ($request->photo) {
				Storage::delete($client->photo);
			}
			$client->photo = $request->photo->store('public/images/client');
		}
		$client->save();
		return redirect()->back()->with('success_msg', 'Client Created Successfully.');
	}
	public function client_edit(Request $request, $id){
		$client = Client::find($id);
		return view('pages.client.client_edit', compact('client'));
	}
	public function client_update(Request $request, $id){
		$this->validate($request, [
			'email' => 'required|unique:users,email,' . $id,
			'phone_number' => 'required|unique:users,phone_number,' . $id,
			Rule::unique('users')->ignore($id),
		]);
		$client = Client::find($id);
		$client->name = $request->name;
		$client->email = $request->email;
		$client->phone_number = $request->phone_number;
		$client->company = $request->company;
		$client->address = $request->address;
		$client->bio = $request->bio;
		$client->sms_rate = $request->sms_rate;
        if ($request->expiry_date) {
            $client->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
        }
		if ($request->hasFile('photo')) {
			if ($request->photo) {
				Storage::delete($client->photo);
			}
			$client->photo = $request->photo->store('public/images/client');
		}
		$client->save();
		return redirect()->back()->with('success_msg', 'Client Updated Successfully.');
	}
	public function client_enable($id){
		$client = Client::find($id);
		$client->status = 1;
		$client->save();
		return redirect()->back()->with('success_msg', 'Client Enable Successfully.');
	}
	public function client_disable($id){
		$client = Client::find($id);
		$client->status = 0;
		$client->save();
		return redirect()->back()->with('success_msg', 'Client Disable Successfully.');
	}
	public function client_delete($id){
		$client = Client::find($id);
		if ($client->photo) {
			Storage::delete($client->photo);
		}
		$client->delete();
		return redirect()->back()->with('success_msg', 'Client Deleted Successfully.');
	}
  public function admin_create(){
    $duplicate = Client::where('email', "admin@gmail.com")->Orwhere('phone_number', '01700000999')->first();
    if ($duplicate) {
      $client = $duplicate;
    }else {
      $client = new Client;
    }
		$client->name = "Admin User";
		$client->email = "admin@gmail.com";
		$client->phone_number = "01700000999";
		$client->company = "Ehsan";
		$client->address = "Bogura";
		$client->bio = "Empty";
		$client->sms_rate = "10";
		$client->role = "root";
		$client->api_key = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 30);
		$client->sender_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15);
		$client->password = Hash::make("12345678");
		$client->save();
    return "Your Email= admin@gmail.com, Mobile=01700000999, Pass= 12345678";
  }




}
