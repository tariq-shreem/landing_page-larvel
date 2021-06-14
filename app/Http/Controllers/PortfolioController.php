<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function all(){
        
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index',['portfolios' => $portfolios]);
    }

    public function add(Request $request){

        $request->validate([

            'name'=>'required',
        ]);

        Portfolio::create([
            'name'=>$request->name,
        ]);
        return back()->with('success','portfolio added successfully');
    }

    public function delete($id){

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();
        
        return back()->with('success','portfolio deleted successfully');
    }

    public function edit($id){

        $portfolio = Portfolio::findOrFail($id);
        
        return view('admin.portfolio.edit',['portfolio' => $portfolio]);
    }

    public function update($id,Request $request){        
            
            Portfolio::findOrFail($id)->update([
                'name'=>$request->name,
            ]);
            return back()->with('success','name updaed successfully');
        }

}