<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }
    public function BanerUser()  {
        
    }

    public function profile(){

        if(auth()->user()->hasRole('spectateur')){
            $payment = Payment::where('user_id', auth()->id())->pluck('product_name')->all();

            foreach($payment as $name){
  
            $evenements = Evenement::where('titre', $name)
            ->get();
            }
 


            return view('dashboard.users.profile', compact('evenements'));


         }
        return view('dashboard.users.profile');
    }

}
