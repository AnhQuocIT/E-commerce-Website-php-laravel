<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductType;
use App\Models\label_products;
use App\Http\Requests\AddProdTypeRequest;
use App\Http\Requests\EditProdTypeRequest;
use App\Http\Requests\AddProdLabelRequest;
use App\Http\Requests\EditProdLabelRequest;
use File;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{

    public function getCategory(){
    	$data['productTypeList'] = ProductType::all();
    	return view('backend.category',$data);
    }

    public function postCategory(AddProdTypeRequest $request){
        $filename = $request->chooseImg->getClientOriginalName();
        $prodType = new ProductType;
        $prodType->name = $request->txtCateName;
        $prodType->slug = str_slug($request->txtCateName);
        $prodType->image = $filename;

        $prodType->save();
        $request->chooseImg->storeAs('image/productType',$filename);

        return redirect()->intended('admin/product-type');
    }

    public function getEditCategory($id){
        $data['prodTypeById'] = ProductType::find($id);
        return view('backend.editProdType',$data);
    }

    public function postEditCategory(EditProdTypeRequest $request, $id){ 
        $prodType = ProductType::find($id);
        $prodType->name = $request->txtCateName;
        $prodType->slug = str_slug($request->txtCateName);
        
        if($request->hasFile('chooseImg')){
            Storage::delete('image/productType/'.$prodType->image);
            $filename = $request->chooseImg->getClientOriginalName();
            $prodType->image = $filename;
            $request->chooseImg->storeAs('image/productType',$filename);
        }
        $prodType->save();
        return redirect()->intended('admin/product-type');
    }

    public function getDeleteCategory($id){
        $prodType = ProductType::find($id);
        Storage::delete('image/productType/'.$prodType->image);
        ProductType::destroy($id);
        return back();
    }



    public function getLabelProduct(){
        $data['productLabelList'] = label_products::all();
    	return view('backend.label_product',$data);
    }

    public function postLabelProduct(AddProdLabelRequest $request){
        $filename = $request->chooseImg->getClientOriginalName();
        $prodLabel = new label_products;
        $prodLabel->name = $request->txtCateName;
        $prodLabel->slug = str_slug($request->txtCateName);
        $prodLabel->image = $filename;

        $prodLabel->save();
        $request->chooseImg->storeAs('image/productLabel',$filename);

        return redirect()->intended('admin/product-label');
    }

    public function getEditLabelProduct($id){
        $data['prodLabelById'] = label_products::find($id);
        return view('backend.editProdLabel',$data);
    }

    public function postEditLabelProduct(EditProdLabelRequest $request, $id){ 
        $prodLabel = label_products::find($id);
        $prodLabel->name = $request->txtCateName;
        $prodLabel->slug = str_slug($request->txtCateName);
        
        if($request->hasFile('chooseImg')){
            Storage::delete('image/productLabel/'.$prodLabel->image);
            $filename = $request->chooseImg->getClientOriginalName();
            $prodLabel->image = $filename;
            $request->chooseImg->storeAs('image/productLabel',$filename);
        }
        $prodLabel->save();
        return redirect()->intended('admin/product-label');
    }

    public function getDeleteLabelProduct($id){
        $prodLabel = label_products::find($id);
        Storage::delete('image/productLabel/'.$prodLabel->image);
        label_products::destroy($id);
        return back();
    }
}
