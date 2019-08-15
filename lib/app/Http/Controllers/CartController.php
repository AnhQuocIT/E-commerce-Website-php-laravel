<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use App\Http\Requests\BillRequest;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use Mail;
use Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    public function getAddCart($id){
        $product = Product::find($id);
        if($product->is_sale == true){
            $price = $product->promotion_price;
        } else {
            $price = $product->unit_price;
        }
        Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $price, 'options' => ['img' => $product->image]]);
        return back();
    }

    public function getShowCart(){
        $count = Cart::count();
        if($count > 0){
            $data['total'] = Cart::total();
            $data['items'] = Cart::content();
            return view('fontend.shopping-cart',$data);
        } else {
            return view('fontend.empty-cart');
        }
    }

    public function getDeleteCart($id){
        if($id == 'all'){
            Cart::destroy();
            return view('fontend.empty-cart');
        } else {
            Cart::remove($id);
            return back();
        }
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->id,$request->qty);
    }

    public function getCheckoutCart(){
        $data['items'] = Cart::content();
        $data['customer'] = Auth::guard('customer');
        return view('fontend.register',$data);
    }

    public function postCheckoutCart(BillRequest $request){
         $customerByEmail = DB::table('customer')->select('customer.*')->where('customer.email','like', $request->email)->first();
         if(Auth::guard('customer')->check()){
            $customer = Customer::find(Auth::guard('customer')->user()->id);
        } else {
            if($customerByEmail != null){
                if($customerByEmail->is_member == true){
                    $this->validate($request,[
                        'email'=>'email|unique:customer,email',
                    ],
                    [
                        'email.email'=>'Không đúng định dạng email!',
                        'email.unique'=>'Email này đã đăng ký thành viên!',
                    ]);
                } else {
                    $this->validate($request,[
                        'email'=>'email',
                    ],
                    [
                        'email.email'=>'Không đúng định dạng email!',
                    ]);
                }
                $customer = Customer::find($customerByEmail->id);
                $customer->name = $request->name;
                $customer->gender = 1 ;
                $customer->email = $request->email;
                $customer->address = $request->address;
                $customer->phone_number = $request->phone;
                $customer->is_member = false;
                $customer->save();
            } else {
                $this->validate($request,[
                    'email'=>'email',
                ],
                [
                    'email.email'=>'Không đúng định dạng email!',
                ]);

                $customer = new Customer;
                $customer->name = $request->name;
                $customer->gender = 1 ;
                $customer->email = $request->email;
                $customer->address = $request->address;
                $customer->phone_number = $request->phone;
                $customer->is_member = false;
                $customer->save();
            }
        }
        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total =(double)str_replace(",","",Cart::total());
        $bill->payment = $request->payment;
        $bill->note = $request->note;
        $bill->status = 0;
        $bill->save();

        $items = Cart::content();
        foreach($items as $item){
            $billDetail = new BillDetail;
            $billDetail->id_bill = $bill->id;
            $billDetail->id_product = $item->id;
            $billDetail->quantity = $item->qty;
            $billDetail->unit_price = $item->price;
            $billDetail->save();
        }

        $data['info'] = $request->all();
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        $email = $request->email;
        $name = $request->name;
        Mail::send('fontend.email',$data, function($message) use ($email,$name){
            $message->from('tomhome987@gmail.com','BiShop');
            $message->to($email,$name);
            // $message->cc('','');
            $message->subject('Xác nhận đơn hàng');
        });
        Cart::destroy();
        return view('fontend.complete');
    }
}
