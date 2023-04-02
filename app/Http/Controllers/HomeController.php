<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Offer;


class HomeController extends Controller
{

    public function home()
    {
        $data['training'] = offer::where('type', 'training')->get();
        $data['services'] = offer::where('type', 'services')->get();
        return view('dashboard/home', $data);
    }


    public function homesection()
    {
        $data['training'] = offer::where('type', 'training')->get();
        $data['services'] = offer::where('type', 'services')->get();
        
        return view('frontview/homesection', $data);
    }
}
