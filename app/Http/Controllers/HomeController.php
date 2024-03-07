<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $evenements = Evenement::with('user','categorie')->where('status','accept')->latest()->paginate(10);
 
        return view('welcome',compact('evenements'));
    }

    public function search(Request $request)
    {
        $input = $request->input('input');


        $evenements = Evenement::with('user','categorie')->where('status','accept')->latest()->paginate(10);
 

        if ($input == "all") {
            return view('layouts.search', compact('evenements'));
        } else {
 
            $evenements = Evenement::with('user', 'categorie')
            ->where('status', 'accept')
            ->where(function ($query) use ($input) {
                $query->where('titre', 'like', '%' . $input . '%')
                    ->orWhere('prix', 'like', '%' . $input . '%');
            })
            ->get();
         
            return view('layouts.search', compact('evenements'));
        }
    }
    public function dashboard(){
        
        return view('dashboard.index');
    }
}
