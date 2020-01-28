<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\PhonebookGroup;
use Illuminate\Http\Request;
use Storage;
use Auth;

class PhonebookGroupController extends Controller
{
	public function phonebook_group_add(){
		return view('pages.phonebook_group.phonebook_group_add');
	}
    public function phonebook_group_list(){
		$phonebook_groups = PhonebookGroup::where('user_id', Auth::user()->id)->get();
		return view('pages.phonebook_group.phonebook_group_list', compact('phonebook_groups'));
	}
    public function phonebook_group_store(Request $request){
		$check = PhonebookGroup::where('user_id', Auth::user()->id)->where('name', $request->name)->first();
		if ($check) {
			return redirect()->back()->with('error_msg', 'This group already created by you.');
		}
		$this->validate($request, [
			'name' => 'string|required',
		]);
		$phonebook_group = new PhonebookGroup;
		$phonebook_group->user_id = Auth::user()->id;
		$phonebook_group->name = $request->name;
		$phonebook_group->status = $request->status;
		$phonebook_group->save();
		return redirect()->back()->with('success_msg', 'Phonebook Group Created Successfully.');
	}
	public function phonebook_group_edit(Request $request, $id){
		$phonebook_group = PhonebookGroup::find($id);
		return view('pages.phonebook_group.phonebook_group_edit', compact('phonebook_group'));
	}
	public function phonebook_group_update(Request $request, $id){
		$this->validate($request, [
			'name' => 'required|unique:phonebook_groups,name,' . $id,
			Rule::unique('phonebook_groups')->ignore($id),
		]);
		$phonebook_group = PhonebookGroup::find($id);
		$phonebook_group->name = $request->name;
		$phonebook_group->status = $request->status;
		$phonebook_group->save();
		return redirect()->back()->with('success_msg', 'Phonebook Group Updated Successfully.');
	}
	public function phonebook_group_enable($id){
		$phonebook_group = PhonebookGroup::find($id);
		$phonebook_group->status = 1;
		$phonebook_group->save();
		return redirect()->back()->with('success_msg', 'Phonebook Group Enable Successfully.');
	}
	public function phonebook_group_disable($id){
		$phonebook_group = PhonebookGroup::find($id);
		$phonebook_group->status = 0;
		$phonebook_group->save();
		return redirect()->back()->with('success_msg', 'Phonebook Group Disable Successfully.');
	}
	public function phonebook_group_delete($id){
		$phonebook_group = PhonebookGroup::find($id);
		$phonebook_group->delete();
		return redirect()->back()->with('success_msg', 'Phonebook Group Deleted Successfully.');
	}


}
