<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerateReportController extends Controller
{
    //view
    public function viewGeneratereports(){

        return view('/dashboard/admin_panel/generate_reports');
    }
}
