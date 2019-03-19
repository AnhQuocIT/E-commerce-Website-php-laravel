<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Http\Requests\AddSlideRequest;
use App\Http\Requests\EditSlideRequest;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function getSlide(){
        $data['slideList'] =  Slide::all();
    	return view('backend.slide',$data);
    }

    public function postSlide(AddSlideRequest $request){
        $filename = $request->chooseImg->getClientOriginalName();
        $slide = new Slide;
        $slide->image = $filename;
        $slide->link = $request->txtSlideLink;
        $slide->save();
        $request->chooseImg->storeAs('image/slide',$filename);

        return redirect()->intended('admin/slide');
    }

    public function getEditSlide($id){
        $data['slideById'] = Slide::find($id);
        return view('backend.editSlide', $data);
    }

    public function postEditSlide(EditSlideRequest $request, $id){
        $slide = Slide::find($id);
        $slide->link = $request->txtSlideLink;
        
        if($request->hasFile('chooseImg')){
            Storage::delete('image/slide/'.$slide->image);
            $filename = $request->chooseImg->getClientOriginalName();
            $slide->image = $filename;
            $request->chooseImg->storeAs('image/slide',$filename);
        }
        $slide->save();
        return redirect()->intended('admin/slide');
    }

    public function getDeleteSlide($id){
        $slide = Slide::find($id);
        Storage::delete('image/slide/'.$slide->image);
        Slide::destroy($id);
        return back();
    }
}
