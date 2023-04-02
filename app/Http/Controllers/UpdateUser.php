<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UpdateUser extends Controller
{
    function showData($id){
        $data=User::find($id);
        return view('/dashboard/user/profile',['users'=>$data]);
    }

    



}
