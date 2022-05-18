<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layout;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function banner(){
        return view('Admin.design.banner',[
            'title' => "Chỉnh sửa banner"
        ]);
    }
    public function sliders(){
        return "AAAa";
    }
    public function create_banner( Request $request){
        $this->uploadImg($request,"banner");
        return redirect()->route("admin.design.banner");   
    }
    public function uploadImg(Request $request, $name){
        
        if($request->hasFile($name)){
            $image = $request->file($name);
            $type = $request->file($name)->extension();
            $image_name = $name.'.'.$type;
            $design = Layout::first();
            if($design){
                unlink("uploads/layouts/".$design->$name);
                $design->$name = $image_name;
                $design->save();
            }
            $path = $image->storeAs('layouts',$image_name,'public_uploads');
        }
    }
}   
