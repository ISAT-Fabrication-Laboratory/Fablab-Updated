<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Consultation;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    public function UserDashboardTransation(){

        return view ('/dashboard/user/userside_pendingconsultation');

    }

    public function myTransactions()
    {

        $userID = Session::get('id');
        $data['consultation'] =  DB::table('consultations')
            ->join('users', 'users.id', '=', 'consultations.user_id')
            ->select('consultations.index_id','users.name', DB::raw('count(consultations.index_id) as consult_count_to_user'))
            ->groupBy('consultations.index_id','users.name')
            ->where('users.id',$userID)
            ->get();
        

        return view('dashboard/user/userside_pendingconsultation',$data);
    }

    public function pendingConsultations(){
        $userID = Session::get('id');
        $countConsult = DB::table('consultations')
        ->join('users', 'users.id', '=', 'consultations.user_id')
        ->where('users.id', $userID)
        ->groupBy('consultations.index_id')
        ->count();
        
        return view('dashboard/user/profile',['countConsult' => $countConsult]);
    }

    //Price Quotation
    public function priceQoutation(){
        return view('dashboard/user/userSide_priceQuotation');
    }
    

}
