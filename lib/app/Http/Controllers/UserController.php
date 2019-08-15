<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\label_products;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;
class UserController extends Controller
{
    public function getHome(){
        $data['listNewProd'] = Product::where([['new',true],['status',true]])->orderBy('created_at','desc')->take(10)->get();
        $data['listSaleProd'] = Product::where([['is_sale',true],['status',true]])->orderBy('created_at','desc')->take(10)->get();
        $data['listBestProd'] = Product::where([['count_buy','>',0],['status',true]])->orderBy('count_buy','desc')->take(10)->get();
        
        return view('fontend.index',$data);
    }

    public function getDetail($id){
        $prod = Product::find($id);
        if($prod->image_list != null){
            $data['listImg'] = json_decode($prod->image_list,true);
        }
        $data['prodById'] = Product::find($id);
        $cateID = DB::table('products')->select('id_type')->where('id',$id)->value('id_type');
        $data['listProdByCate'] = Product::where([['id_type',$cateID],['status',true]])->orderBy('created_at','desc')->take(10)->get();
        return view('fontend.product-details', $data); 
    }

    public function getCategory($id){
        $data['listProdByCate'] = Product::where([['id_type',$id],['status',true]])->orderBy('created_at','desc')->paginate(12);
        $data['cateName'] = ProductType::find($id)->value('name');
        return view('fontend.categories', $data);
    }

    public function getLabel($id){
        $data['listProdByCate'] = Product::where([['label_id',$id],['status',true]])->orderBy('created_at','desc')->paginate(12);
        $data['cateName'] = label_products::find($id)->value('name');
        return view('fontend.categories', $data);
    }

    public function getSearch(Request $request){
        $key = $request->key;
        $key = str_replace(' ','%',$key);
        $data['listSearch'] = Product::where('name','like','%'.$key.'%')->paginate(12);
        $data['keyword'] = $request->key;
        return view('fontend.search', $data);
    }

    public function getContact(){
        return view("fontend.contact");
    }

    public function getUserLogin(){
        return view('fontend.login');
    }

    public function postUserLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'pass'=>'required|min:6|max:20',
        ],
        [
            'email.required'=>'Vui lòng nhập email!',
            'email.email'=>'Không đúng định dạng email!',
            'pass.required'=>'Vui lòng nhập mật khẩu!',
            'pass.min'=>'Mật khẩu ít nhất 6 ký tự!',
            'pass.max'=>'Mật khẩu không quá 20 ký tự!'
        ]);
        $arr = ['email' => $request->email , 'password' => $request->pass];
        if(Auth::guard('customer')->attempt($arr)){
            return redirect()->intended('/');
    	} else {
    		return back()->with('error','Đăng nhập không thành công!');
    	}
        return view("fontend.index");
    }

    public function postUserSignin(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:customer,email',
            'address'=>'required',
            'pass'=>'required|min:6|max:20',
            'repass' => 'required|same:pass'
        ],
        [
            'email.required'=>'Vui lòng nhập email!',
            'email.email'=>'Không đúng định dạng email!',
            'email.unique'=>'Tài khoản đã tồn tại!',
            'pass.required'=>'Vui lòng nhập mật khẩu!',
            'pass.min'=>'Mật khẩu ít nhất 6 ký tự!',
            'pass.max'=>'Mật khẩu không quá 20 ký tự!',
            'repass.same'=>'Mật khẩu không giống nhau!',
            'name.required'=>'Vui lòng nhập tên!',
            'address.required'=>'Vui lòng nhập địa chỉ!',
        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone;
        $customer->address = $request->address;
        $customer->is_member = true;
        $customer->password = Hash::make($request->pass);
        $customer->save();
        return redirect()->back()->with('Success','Tạo tài khoản thành công!');
    }

    public function getUserLogout(){
        Auth::guard('customer')->logout();
        return redirect()->intended('/');
    }

	public function getUserInfo($id){
        $data['cusById'] = Customer::find($id);
        return view('fontend.user-info', $data);
    }

    public function postUserInfo(Request $request, $id){
        $user = Customer::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone;
        $user->address = $request->address;
        if($request->has('changePass')){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->intended('/');
    }
}
