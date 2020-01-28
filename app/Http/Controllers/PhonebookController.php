<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\PhonebookGroup;
use App\Models\Phonebook;
use Storage;
use Session;
use Auth;
use App\Imports\Phonebookimport;
use Maatwebsite\Excel\Facades\Excel;

class PhonebookController extends Controller
{
	public function phonebook_add(){
		$groups = PhonebookGroup::where('status', 1)->where('user_id', Auth::user()->id)->get();
		return view('pages.phonebook.phonebook_add', compact('groups'));
	}
	public function phonebook_import(){
		$groups = PhonebookGroup::where('status', 1)->where('user_id', Auth::user()->id)->get();
		return view('pages.phonebook.phonebook_import', compact('groups'));
	}
    public function phonebook_list(){
		$phonebooks = Phonebook::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->get();
		return view('pages.phonebook.phonebook_list', compact('phonebooks'));
	}
    public function phonebook_blocked_list(){
		$phonebooks = Phonebook::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->where('status', 0)->get();
		return view('pages.phonebook.phonebook_blocked_list', compact('phonebooks'));
	}
    public function phonebook_store(Request $request){
		$this->validate($request, [
			'name' => 'string|nullable',
			'phone_number' => 'string|required',
		]);
		$phonebook = new Phonebook;
		$phonebook->user_id = Auth::user()->id;
		$phonebook->group_id = $request->group_id;
		$phonebook->name = $request->name;
		$phonebook->phone_number = $request->phone_number;
		$phonebook->status = $request->status;
		$phonebook->save();
		return redirect()->route('phonebook_list')->with('success_msg', 'Phonebook Added Successfully.');
	}
    public function phonebook_import_store(Request $request){
		$request->validate([
            'file' => 'required'
        ]);
		Session::flash('group_id', $request->group_id);
        $path = $request->file('file')->getRealPath();
		$phonebook = Excel::import(new Phonebookimport, $path);
		$phonebook->user_id = Auth::user()->id;
		$phonebook->save();
		return redirect()->route('phonebook_list')->with('success_msg', 'Phonebook Added Successfully.');
	}
	public function phonebook_edit(Request $request, $id){
		$groups = PhonebookGroup::all();
		$phonebook = Phonebook::find($id);
		return view('pages.phonebook.phonebook_edit', compact('phonebook', 'groups'));
	}
	public function phonebook_update(Request $request, $id){
		$this->validate($request, [
			'phone_number' => 'required|unique:phonebooks,phone_number,' . $id,
			Rule::unique('phonebooks')->ignore($id),
		]);
		$phonebook = Phonebook::find($id);
		$phonebook->group_id = $request->group_id;
		$phonebook->name = $request->name;
		$phonebook->phone_number = $request->phone_number;
		$phonebook->status = $request->status;
		$phonebook->save();
		return redirect()->route('phonebook_list')->with('success_msg', 'Phonebook Updated Successfully.');
	}
	public function phonebook_enable($id){
		$phonebook = Phonebook::find($id);
		$phonebook->status = 1;
		$phonebook->save();
		return redirect()->back()->with('success_msg', 'Phonebook Enable Successfully.');
	}
	public function phonebook_disable($id){
		$phonebook = Phonebook::find($id);
		$phonebook->status = 0;
		$phonebook->save();
		return redirect()->back()->with('success_msg', 'Phonebook Disable Successfully.');
	}
	public function phonebook_delete($id){
		$phonebook = Phonebook::find($id);
		$phonebook->delete();
		return redirect()->back()->with('success_msg', 'Phonebook Deleted Successfully.');
	}


}
