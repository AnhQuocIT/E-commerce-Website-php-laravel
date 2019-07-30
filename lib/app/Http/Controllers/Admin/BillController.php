<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use PDF;
class BillController extends Controller
{
    public function getWaitBill(){
        $data['billList'] = DB::table('bills')->join('customer','bills.id_customer','=','customer.id')->where('bills.status',false)->select('bills.*', 'customer.name')->orderBy('bills.id','desc')->get();
        return view('backend.bill', $data);
    }

    public function getPaidBill(){
        $data['billList'] = DB::table('bills')->join('customer','bills.id_customer','=','customer.id')->where('bills.status',true)->select('bills.*', 'customer.name')->orderBy('bills.id','desc')->get();
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

    public function getReportPDF($id){
        $bill = Bill::find($id);
        $data['bill'] = $bill;
        $data['customer'] = Customer::where('id',$bill->id_customer)->first();
        $data['total'] = $bill->total;
        $data['items'] = DB::table('bill_detail')->join('products','bill_detail.id_product','=','products.id')->where('bill_detail.id_bill','=',$id)->select('bill_detail.*', 'products.name')->get();
        $pdf = PDF::loadView('backend.report', $data);
        $bill->status = true;
        $bill->save();

        $items = BillDetail::where('id_bill',$id)->get();
        foreach($items as $item){
            $product = Product::find($item->id_product);
            $product->count_buy += $item->quantity;
            $product->save();
        }
        return $pdf->download('report.pdf');
    }
}
