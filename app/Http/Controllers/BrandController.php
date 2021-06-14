<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function all(){

        $brands = Brand::latest()->paginate(3);
        return view('admin.brand.index',['brands' => $brands]);
    }

    public function add(Request $request){

        $request->validate([
            'brand_name'=>'required|unique:brands|min:4',
            'brand_image'=>'required|mimes:jpg,png,jpeg',
        ]);

       $brand_image=$request->file('brand_image');

       $name_gen = hexdec(uniqid());
       $img_ext  = strtolower($brand_image->getClientOriginalExtension());
       $img_name="$name_gen.$img_ext";
       $up_location='images/brands/';
       $last_img=$up_location.$img_name;
       $brand_image->move($up_location,$img_name);

       Brand::create([
           'brand_name'=>$request->brand_name,
           'brand_image'=>$last_img,
       ]);

       return back()->with('success','brand added successfully');
    }

    public function update($id){

        $brand = Brand::findORFail($id);

        return view('admin.brand.edit',['brand'=>$brand]);
    }

    public function updateDone($id,Request $request){
        
        $request->validate([
            'brand_name'=>'required|min:4',
            'brand_image'=>'nullable|mimes:jpg,png,jpeg',
        ]);

       $brand_image=$request->file('brand_image');

       if($brand_image){
       $name_gen = hexdec(uniqid());
       $img_ext  = strtolower($brand_image->getClientOriginalExtension());
       $img_name="$name_gen.$img_ext";
       $up_location='images/brands/';
       $last_img=$up_location.$img_name;
       $brand_image->move($up_location,$img_name);
       $old_image=$request->old_image;
       unlink($old_image);

       Brand::findOrFail($id)->update([
           'brand_name'=>$request->brand_name,
           'brand_image'=>$last_img,
       ]);
       }else {
        Brand::findOrFail($id)->update([
            'brand_name'=>$request->brand_name,
        ]);
       }

       return back()->with('success','brand updated successfully');
        

    }


    public function delete($id){
        
        $brand = Brand::findOrFail($id);
        $brand_image=$brand->brand_image;
        unlink($brand_image);
        $brand->delete();
        
        return back()->with('success','brand deleted successfully');
    }
}
