<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use Storage;

class ProfileController extends Controller
{
    public function profile(){
		return view('pages.profile.profile');
	}
    public function profile_edit(Request $request, $id){
		$user = User::find($id);
		return view('pages.profile.profile_edit', compact('user'));
	}
    public function profile_update(Request $request, $id){
		$this->validate($request, [
			'phone_number' => 'unique:users,phone_number,' . $id,
			'email' => 'unique:users,email,' . $id,
          	'name' => 'required',
          	Rule::unique('users')->ignore($id),
		]);
		$user = User::find($id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->phone_number = $request->phone_number;
		$user->company = $request->company;
		$user->address = $request->address;
		$user->bio = $request->bio;
		if ($request->hasFile('photo')) {
			if ($request->photo) {
				Storage::delete($user->photo);
			}
			$user->photo = $request->photo->store('public/images/user');
		}
		$user->save();
		return redirect()->back()->with('success_msg', 'Profile Updated Successfully.');
	}
    public function password_update(){
		return view('pages.profile.password_update');
	}
    public function password_store(Request $request, $id){
		$this->validate($request, [
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
		$user = User::find($id);
		$user->password = Hash::make($request->password);
		$user->save();
		return redirect()->route('profile')->with('success_msg', 'Password Updated Successfully.');
	}



}
