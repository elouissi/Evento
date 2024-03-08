<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Evenement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(Request $request)
    {
        $evenements = Evenement::with('user','categorie')->where('status','accept')->latest()->paginate(10);
        $categories = Categorie::all();
        if ($request->ajax()) {

            $evenements = Evenement::where('categorie_id', $request->input())->get();
 
            return response()->json(['evenements' => $evenements]);
        }

 
        return view('welcome',compact('evenements','categories'));
    }

    public function search(Request $request)
    {
        $input = $request->input('input');


        $evenements = Evenement::with('user','categorie')->where('status','accept')->latest()->paginate(10);
        $categories = Categorie::all();

 

        if ($input == "all") {
            return view('layouts.search', compact('evenements','categories'));
        } else {
 
            $evenements = Evenement::with('user', 'categorie')
            ->where('status', 'accept')
            ->where(function ($query) use ($input) {
                $query->where('titre', 'like', '%' . $input . '%')
                    ->orWhere('prix', 'like', '%' . $input . '%');
            })
            ->get();
         
            return view('layouts.search', compact('evenements','categories'));
        }
    }
    public function dashboard(){

       if( auth()->user()->hasRole('admin') ||auth()->user()->hasRole('organisateur')  ){         
        return view('dashboard.index');
       }else{
        return view('dashboard.users.profile');

       }
    }
}
