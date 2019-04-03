<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\label_products;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;

class ProductController extends Controller
{
    public function getProduct(){
        $prodList = DB::table('products')
                ->join('type_products','products.id_type','=','type_products.id')
                ->join('label_products','products.label_id','=','label_products.id')
                ->select('products.*','type_products.name as typeName','label_products.name as labelName')
                ->orderBy('products.id','desc')
                ->get();
        $typeList =  ProductType::all();
        $labelList = label_products::all();
    	return view('backend.product', compact(['prodList','typeList','labelList']));
    }

    public function postProduct(AddProductRequest $request){
        $img = $request->chooseImg->getClientOriginalName();
        if($request->hasfile('listImg'))
         {
            foreach($request->file('listImg') as $image)
            {
                $nameImg=$image->getClientOriginalName();
                $image->storeAs('image/product',$nameImg);
                $listImg[] = $nameImg;  
            }
            $jsonImg = json_encode($listImg);
         } else {
            $jsonImg = null;
         }
        if($request->cbProdPromotion == 'on'){
            $sale = true;
        } else {
            $sale = false;
        }
        if($request->cbProdNew == 'on'){
            $new = true;
        } else {
            $new = false;
        }
        $product = new Product;
        $product->name              = $request->txtProdName;
        $product->slug              = str_slug($request->txtProdName);
        $product->id_type           = $request->txtCate;
        $product->label_id          = $request->txtLabel;
        $product->description       = $request->txtProdDesc;
        $product->is_sale           = $sale;
        $product->unit_price        = (double)str_replace(",","",$request->txtUnitPrice);
        $product->promotion_price   = (double)str_replace(",","",$request->txtProPrice);
        $product->image             = $img;
        $product->image_list        = $jsonImg;
        $product->new               = $new;
        $product->origin            = $request->txtProdOrigin;

        $product->save();

        $request->chooseImg->storeAs('image/product',$img);
        return redirect()->intended('admin/products');
    }

    public function getEditProduct($id){
        $prodById = Product::find($id);
        $typeList =  ProductType::all();
        $labelList = label_products::all();
        $listImage = json_decode($prodById->image_list,true);
        return view('backend.editProduct', compact(['prodById','typeList','labelList','listImage']));
    }

    public function postEditProduct(EditProductRequest $request, $id){
        $product = Product::find($id);
        if($request->hasfile('chooseImg')){
            Storage::delete('image/product/'.$product->image);
            $img = $request->chooseImg->getClientOriginalName();
            $request->chooseImg->storeAs('image/product',$img);
        } else {
            $img = $product->image;
        }
        if($request->hasfile('listImg'))
         {
            $listImage = json_decode($product->image_list,true);
            foreach($listImage as $imgs){
                Storage::delete('image/product/'.$imgs);
            }
            foreach($request->file('listImg') as $image)
            {
                $nameImg=$image->getClientOriginalName();
                $image->storeAs('image/product',$nameImg);
                $listImg[] = $nameImg;  
            }
            $jsonImg = json_encode($listImg);
         } else {
            $jsonImg = $product->image_list;
         }
        if($request->cbProdPromotion == 'on'){
            $sale = true;
        } else {
            $sale = false;
        }
        if($request->cbProdNew == 'on'){
            $new = true;
        } else {
            $new = false;
        }
        
        $product->name              = $request->txtProdName;
        $product->slug              = str_slug($request->txtProdName);
        $product->id_type           = $request->txtCate;
        $product->label_id          = $request->txtLabel;
        $product->description       = $request->txtProdDesc;
        $product->is_sale           = $sale;
        $product->unit_price        = (double)str_replace(",","",$request->txtUnitPrice);
        $product->promotion_price   = (double)str_replace(",","",$request->txtProPrice);
        $product->image             = $img;
        $product->image_list        = $jsonImg;
        $product->new               = $new;
        $product->origin            = $request->txtProdOrigin;

        $product->save();

        return redirect()->intended('admin/products');
    }

    public function getDeleteProduct($id){
        $product = Product::find($id);
        $listImage = json_decode($product->image_list,true);
        Storage::delete('image/product/'.$product->image);
        foreach($listImage as $img){
            Storage::delete('image/product/'.$img);
        }
        Product::destroy($id);
        return back();
    }
}
