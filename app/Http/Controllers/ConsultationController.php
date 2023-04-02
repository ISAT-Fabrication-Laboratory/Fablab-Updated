<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use Illuminate\Session\SessionManager;

class ConsultationController extends Controller

//users homepage
{
    protected $session;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function ConsultationView()
    {
        return view('/dashboard/home');
    }

    //send data from modal to DB
    function AddConsultation(Request $request)
    {
        $item_name = $request->input('item_name');
        $description = $request->input('description');
        $material = $request->input('material');
        $quantity = $request->input('quantity');
        $user_id = $request->input('user_id');
        $offers_id = $request->input('offers_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        if (Consultation::exists()) {
            $index=Consultation::orderBy('consultations.id','DESC')->first();
            $index_id= $index->index_id +1;
        }
        else{
            $index_id=1;
        }

        foreach ($item_name as $key => $isInsertSuccess) : //foreach every clone item_name array, in name u can see name="item_name[]"
            $isInsertSuccess = Consultation::insert([
                'index_id'                 =>$index_id,
                'item_name'                => $item_name[$key],
                'user_id'                  => $this->session->get('id'),
                'description'              => $description[$key],
                'material'                 => $material[$key],
                'quantity'                 => $quantity[$key],
                'offers_id'                => $offers_id,
                'start_date'               => $start_date[$key],
                'consultation_status'      => 0,
                'end_date'                 => $end_date[$key],
            ]);
        endforeach;

        if ($isInsertSuccess) {
            // Success Redirect to the desired page with message
            $this->session->flash('success', 'Your consultation will be reviewed by the FabLab office');
            return redirect()->to('/home');
        } else {
            $this->session->flash('failed', ' Consultation Failed');
            return redirect()->to('/home');
        }
    }


    // Training
    function TrainingAddConsultation(Request $training)
    {
        
        $training_item = $training->input('training_name');
        $training_description =$training->input('training_description');
        $training_material =$training->input('training_material');
        $training_quantity =$training->input('training_quantity');
        $offers_id = $training->input('offers_id');
        $training_start =$training->input('training_start');
        $training_end =$training->input('training_end');
        if (Consultation::exists()) {
            $index=Consultation::orderBy('consultations.id','DESC')->first();
            $index_id= $index->index_id + 1;
        }
        else{
            $index_id=1;
        }

        foreach ($training_item as $train => $isInsertSuccess) : //foreach every clone item_name array, in name u can see name="item_name[]"
            $isInsertSuccess = Consultation::insert([
                'index_id'              =>$index_id,
                'user_id'               => $this->session->get('id'),
                'item_name'             => $training_item[$train],
                'description'           => $training_description[$train],
                'material'              => $training_material[$train],
                'quantity'              => $training_quantity[$train],
                'offers_id'             => $offers_id,
                'start_date'            => $training_start[$train],
                'end_date'              => $training_end[$train],
                'consultation_status'   =>0,
            ]);
        endforeach;

        if ($isInsertSuccess) {
            // Success Redirect to the desired page with message
            $this->session->flash('success', 'Your consultation will be reviewed by the FabLab office');
            return redirect()->to('/home');
        } else {
            $this->session->flash('failed', ' Consultation Failed');
            return redirect()->to('/home');
        }
    }

    //View Consultation

    public function pending_consulation()
    {
        $consultation = Consultation::latest()->paginate(5);

        return view('/dashboard/admin_panel/p_consultation', compact('consultations'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    //Show or Display consultation
    public function show(Consultation $consultation)
    {
        //i'll change later the show directory
        return view('/dashboard/admin/user_pending_consultation/show', compact('consultation'));
    }



}

