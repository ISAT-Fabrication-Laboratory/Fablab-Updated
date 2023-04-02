<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboard extends Controller
{
    public function adminhome()
    {
        return view('dashboard/adminHome');
    }
    //display users in admin home
    public function Showusers(){
        $display = User::all();
        return view('/dashboard/adminHome',['display' => $display]);
    }

    //CRUD
    //Admin Panel. Products

    public function toProducts(){
        $offers = DB::table('offers')->paginate(10);
        return view ('/dashboard/admin_panel/addProducts', compact('offers'));
    }
    
    //ADD Products
    public function addProducts(Request $request)
{
  
    if ($request->hasFile('images') && $request->file('images')->isValid()) {
        $file = $request->file('images');
        $image_name = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/cards'), $image_name);
        $prodimage = 'images/cards/' . $image_name;
    }
    

    $data=[
        'name'=>$request->input('name'),
        'description'=>$request->input('description'),
        'images'=>$prodimage,
        'type'=>$request->input('type'),
    ];
    Offer::insert($data);

    return redirect('/Products')->with('success', 'Product created successfully.');
}

    //delete Products

        public function destroy($offer)
        {
            $offer = Offer::find($offer);
            if (!$offer) {
                return redirect()->to('/Products')->with('error', 'Offer not found');
            }
            $offer->delete();
            return redirect()->to('/Products')->with('success', 'Offer data has been deleted');
        }



        //Edit Products

        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'type' => 'required',
                'images' => 'required',
            ]);
           // set default value for $img
            $img = null;
            $item = Offer::findOrFail($id);
            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                $file = $request->file('images');
                $image_name = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/cards'), $image_name);
                $prodimage = 'images/cards/' . $image_name;
                $img = $prodimage;
            }
            $itemData = [
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'images'=>$img,
            ];
            

            $item->update($itemData);

            return redirect()->to('/dashboard/admin_panel/addProducts');
        }

        
        
        
        
    
    


}
