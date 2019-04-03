<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
class BillController extends Controller
{
    public function getWaitBill(){
        $data['billList'] = DB::table('bills')->join('customer','bills.id_customer','=','customer.id')->where('bills.status',false)->orderBy('bills.id','desc')->get();
        return view('backend.bill', $data);
    }

    public function getPaidBill(){
        $data['billList'] = DB::table('bills')->join('customer','bills.id_customer','=','customer.id')->where('bills.status',true)->orderBy('bills.id','desc')->get();
    	return view('backend.bill-paid',$data);
    }

    public function getBillDetail($id){
        $customerName = DB::table('bills')->join('customer','bills.id_customer','=','customer.id')->where('bills.id','=',$id)->first();
        $billDetailList = DB::table('bill_detail')->join('products','bill_detail.id_product','=','products.id')->where('bill_detail.id_bill','=',$id)->select('bill_detail.*', 'products.name')->get();
        return view('backend.bill-detail',compact(['customerName','billDetailList']));
    }

    public function getDeleteDetail($id){
        BillDetail::destroy($id);
        return back();
    }

    public function getDeleteBill($id){
        Bill::destroy($id);
        return back();
    }
}
