<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function all(){
        $services = Service::all();
        
        return view('admin.service.index',['services'=>$services]);
    }

    public function add(Request $request){

        $request->validate([
            'heading'=>'required',
            'icon'=>'required',
            'description'=>'required',
        ]);

        

       Service::create([
        'heading'=>$request->heading,
        'icon'=>$request->icon,
        'description'=>$request->description,
       ]);

       return back()->with('success','add service successfully');
    }

    public function delete($id){

        $service = Service::findOrFail($id)->delete();
        return back()->with('success','delete service successfully');

    }

    public function edit($id){

        $service= Service::findOrFail($id);
        return view('admin.service.edit',['service'=>$service]);
    }

    public function updateDone(Request $request,$id){

        $request->validate([
            'heading'=>'required',
            'icon'=>'required',
            'description'=>'required',
        ]);


        Service::findOrFail($id)->update([
            'heading'=>$request->heading,
            'icon'=>$request->icon,
            'description'=>$request->description,
    
        ]);
        return back()->with('success','update service successfully');

    }
}
