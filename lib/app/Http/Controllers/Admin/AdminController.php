<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\EditAdminRequest;

class AdminController extends Controller
{
    public function getAdminInfo () {
        return view('backend.admin-info');
    }

    public function getListAdmin () {
        $data['adminList'] = Users::all();
        return view('backend.admin', $data);
    }

    public function getAddAdmin() {
        return view('backend.register');
    }

    public function postAddAdmin(AddAdminRequest $request){
        $admin = new Users;
        $admin->name = $request->name;
        $admin->email = $request->inputEmail;
        $admin->password = bcrypt($request->password);
        $admin->level = $request->level;

        $admin->save();

        return redirect()->intended('admin/admin-control/list');
    }

    public function getEditAdmin($id){
        $data['adminById'] = Users::find($id);
        return view('backend.editAdmin', $data);
    }

    public function postEditAdmin(EditAdminRequest $request, $id){
        $admin = Users::find($id);
        $admin->name = $request->name;
        $admin->email = $request->inputEmail;
        $admin->level = $request->level;
        if($request->has('changePass')){
            $admin->password = bcrypt($request->password);
        }
        $admin->save();
        return redirect()->intended('admin/admin-control/list');
    }
}
