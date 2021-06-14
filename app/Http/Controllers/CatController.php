<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatController extends Controller
{
    public function __construct(){
       return $this->middleware('auth');
    }
    
    public function all(){
        
        $cats = Cat::paginate(3);
        $trashed = Cat::onlyTrashed()->paginate(3);
        return view('admin.cats.index',['cats'=>$cats,'trashed'=>$trashed]);
    }

    public function add(Request $request){

       $request->validate([
           'category_name' =>'required|unique:cats|max:30',
       ]);

       Cat::create([
           'category_name' =>$request->category_name,
           'user_id'=>Auth::user()->id,
       ]);

       
       return back()->with('success','category added successfully');
    }

    public function Softdelete($id){

        $cat = Cat::findOrFail($id);
        $cat->delete();
        return back()->with('softDelete','category soft deleted successfully');
    }

    public function restore($id){
    
        $cat = Cat::withTrashed()->findOrFail($id);
        $cat->restore();
        return back()->with('success','category restored successfully');
    }

    public function forceDelete($id){
        
        $cat= Cat::onlyTrashed()->findOrFail($id);
        $cat->forceDelete();
        return back()->with('delete','category deleted successfully');

        
    }
}
