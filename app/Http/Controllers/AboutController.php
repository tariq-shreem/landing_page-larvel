<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function all(){
        $about = About::first();
        
        return view('admin.about.index',['about'=>$about]);
    }

    public function add(Request $request){

        $request->validate([
            'about_heading'=>'required',
            'about_short_desc'=>'required',
            'about_long_desc'=>'required',
        ]);

        

       About::create([
        'about_heading'=>$request->about_heading,
        'about_short_desc'=>$request->about_short_desc,
        'about_long_desc'=>$request->about_long_desc,
       ]);

       return back()->with('success','add about successfully');
    }

    public function delete($id){

        $about = About::findOrFail($id)->delete();
        return back()->with('success','delete about successfully');

    }

    public function edit($id){

        $about= About::findOrFail($id);
        return view('admin.about.edit',['about'=>$about]);
    }

    public function updateDone(Request $request,$id){

        $request->validate([
            'about_heading'=>'required',
            'about_short_desc'=>'required',
            'about_long_desc'=>'required',
        ]);


        About::findOrFail($id)->update([
            'about_heading'=>$request->about_heading,
            'about_short_desc'=>$request->about_short_desc,
            'about_long_desc'=>$request->about_long_desc,
    
        ]);
        return back()->with('success','update about successfully');

    }
}
