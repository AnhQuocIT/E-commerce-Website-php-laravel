<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\EditMemberRequest;
use App\Http\Requests\EditGuestRequest;

class CustomerController extends Controller
{
    public function getMember(){
        $data['memberList'] = Customer::where('is_member',true)->get();
    	return view('backend.member',$data);
    }

    public function getEditMember($id){
        $data['memberById'] = Customer::find($id);
        return view('backend.editMember',$data);
    }

    public function postEditMember(EditMemberRequest $request, $id){
        $member = Customer::find($id);
        $member->name = $request->txtMemberName;
        $member->gender = $request->txtMemberSex;
        $member->email = $request->txtMemberEmail;
        $member->address = $request->txtMemberAddress;
        $member->phone_number = $request->txtMemberPhone;

        $member->save();
        return redirect()->intended('admin/member');
    }

    public function getDeleteMember($id){
        $member = Customer::find($id);
        Customer::destroy($id);
        return back();
    }

    public function getCustomer(){
        $data['guestList'] = Customer::where('is_member',false)->get();
    	return view('backend.guest',$data);
    }

    public function getEditCustomer($id){
        $data['guestById'] = Customer::find($id);
        return view('backend.editGuest',$data);
    }

    public function postEditCustomer(EditGuestRequest $request, $id){
        $member = Customer::find($id);
        $member->name = $request->txtMemberName;
        $member->gender = $request->txtMemberSex;
        $member->email = $request->txtMemberEmail;
        $member->address = $request->txtMemberAddress;
        $member->phone_number = $request->txtMemberPhone;

        $member->save();
        return redirect()->intended('admin/customer');
    }

    public function getDeleteCustomer($id){
        $member = Customer::find($id);
        Customer::destroy($id);
        return back();
    }
}
