<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function all(){
        
        $sliders = Slider::all();
        return view('admin.slider.index',['sliders' => $sliders]);
    }

    public function add(Request $request){

        $request->validate([

            'slider_title'=>'required',
            'slider_img'=>'required',
            'slider_description'=>'required',

        ]);

        $slider_image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).".".$slider_image->getClientOriginalExtension();
        

        Image::make($slider_image)->resize(1200,900)
        ->save("images/slider/$name_gen");

        $last_img = "images/slider/$name_gen";

        Slider::create([
            'slider_title'=>$request->slider_title,
            'slider_img'=>$last_img,
            'slider_description'=>$request->slider_description,
        ]);
        return back()->with('success','slider added successfully');
    }

    public function delete($id){

        $slider = Slider::findOrFail($id);
        unlink($slider->slider_img);
        $slider->delete();
        
        return back()->with('success','slider deleted successfully');
    }

    public function edit($id){

        $slider = Slider::findOrFail($id);
        
        return view('admin.slider.edit',['slider' => $slider]);
    }

    public function update($id,Request $request){

        $slider_img = $request->file('slider_img');
        
        if($slider_img){
            $name_gen = hexdec(uniqid()).".".$slider_img->getClientOriginalExtension();
            Image::make($slider_img)->resize(1200,900)
            ->save("images/slider/$name_gen");
            $last_img = "images/slider/$name_gen";

            $old_image=$request->old_image;
            unlink($old_image);
            
            Slider::findOrFail($id)->update([
                'slider_title'=>$request->slider_title,
                'slider_img'=>$last_img,
                'slider_description'=>$request->slider_description,
    
            ]);
    
        }else { 

            Slider::findOrFail($id)->update([
                'slider_title'=>$request->slider_title,
                'slider_description'=>$request->slider_description,
    
            ]);

        }

        return back()->with('success','image updaed successfully');

    }
}
