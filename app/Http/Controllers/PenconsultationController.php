<?php

namespace App\Http\Controllers;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PenconsultationController extends Controller
{
     //view function
     public function pending_consultation()
     {
         return view('dashboard/admin_panel/p_consultation');
     }


     public function consultations()
     {
         $consultation = consultation::all();
         return view('dashboard/admin_panel/p_consultation', compact('consultation'));
     }
     
     //show data function
     public function show($id)
     {
         $consultation = Consultation::find($id);
         return view('dashboard/admin_panel/show')->with('p_consultation', $consultation);
     }   
   
     //delete function
     public function destroy($id)
     {
         Consultation::destroy($id);
         return redirect('dashboard/admin_panel/p_consultation')->with('flash_message', 'consultation deleted!');  
     }


     //display the name of user that send consulation in the admin dashboard
     //admin side
    public function show_pendingUsers(){
        $show_pending =  DB::table('consultations')
        ->join('users', 'users.id', '=', 'consultations.user_id')
        ->select('users.id', 'users.name', 'users.email', DB::raw('count(consultations.id) as consult_count'))
        ->groupBy('users.id','users.name','users.email')
        ->get();
        return view('dashboard/admin_panel/p_consultation',['show_pending' => $show_pending]);
    }

         //display the name of user that send consulation in the user dashboard
         //admin side
         public function AdminConsultations($user_id){
         $data['consultations'] = DB::table('users')
        ->join('consultations', 'consultations.user_id', '=', 'users.id')
        ->select( 'consultations.index_id','consultations.created_at',DB::raw('count(consultations.id) as counts'))      
        ->groupBy('consultations.index_id','consultations.created_at') 
        ->where('users.id',$user_id)
        ->get();
        $data['users']=User::where('id',$user_id)->first();
        $data['item_name']=Consultation::all();
            return view('dashboard/admin_panel/view_pendingconsultation',$data);
        }

        //users all consultation
        public function viewConsultation($user_id,$index_id){
            $data['consultation']=Consultation::where('index_id',$index_id)->get();
            $data['name']=User::where('id',$user_id)->first();
            return view('dashboard/admin_panel/viewConsultation',$data);
        }
    

    
}
