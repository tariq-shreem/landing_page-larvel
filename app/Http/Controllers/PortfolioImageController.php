<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\PortfolioImage;
use Intervention\Image\Facades\Image;

class PortfolioImageController extends Controller
{
    public function all(){
        
        $PortfolioImages = PortfolioImage::all();
        $portfolio=Portfolio::all();
        return view('admin.portfolioImage.index',['PortfolioImages' => $PortfolioImages,'portfolio'=>$portfolio]);
    }

    public function add(Request $request){

        $request->validate([

            'img'=>'required',
            'portfolio_id'=>'required',

        ]);

        $portfolio_image = $request->file('img');
        $name_gen = hexdec(uniqid()).".".$portfolio_image->getClientOriginalExtension();
        

        Image::make($portfolio_image)->resize(200,200)
        ->save("images/portfolio/$name_gen");

        $last_img = "images/portfolio/$name_gen";

        PortfolioImage::create([
            'img'=>$last_img,
            'portfolio_id'=>$request->portfolio_id,
        ]);
        return back()->with('success','portfolio image added successfully');
    }

    public function delete($id){

        $portfolio = PortfolioImage::findOrFail($id);
        unlink($portfolio->img);
        $portfolio->delete();
        
        return back()->with('success','portfolio image deleted successfully');
    }

   
}
