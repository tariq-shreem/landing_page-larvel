<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\PortfolioImage;

class HomeController extends Controller
{
    public function getData(){
    $data['about'] = About::first();
    $data['brands'] = Brand::all();
    $data['sliders'] = Slider::all();
    $data['services']=Service::all();
    $data['portfolios']=Portfolio::all();
    $data['PortfolioImage']=PortfolioImage::all();
    return view('home')->with($data);
    }
}
