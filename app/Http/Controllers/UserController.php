<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }
    public function BanerUser(int $id)  {
 
        User::where('id',$id)->update([
            'status' => 'baner'
        ]);
        return redirect()->route('users');
    }
    public function DeBanerUser(int $id)  {
 
        User::where('id',$id)->update([
            'status' => 'normal'
        ]);
        return redirect()->route('users');
    }

    public function profile(){

        if(auth()->user()->hasRole('spectateur')) {
            $payment = Payment::where('user_id', auth()->id())->pluck('product_name')->all();
            $evenements = []; // Initialize the $evenements array
        
            foreach($payment as $name) {
                $evenement = Evenement::where('titre', $name)->get();
                // Assuming you want to merge the results of each loop iteration into $evenements
                $evenements = array_merge($evenements, $evenement->toArray());
            }
        
            $reservations = Reservation::where('status', 'publish')->get();
        
            return view('dashboard.users.profile', compact('evenements', 'reservations'));
        }
        
        return view('dashboard.users.profile');
    }


}
