<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Evenement;
use App\Models\User;
use Carbon\Carbon;
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

       if( auth()->user()->hasRole('admin')  ){  

        $data_m = Evenement::select('id', 'created_at')->where('accptance', 'manuel' )->get()->groupBy(function($data){
               return  Carbon::parse($data->created_at)->format("D");
        });
        $data_a = Evenement::select('id', 'created_at')->where('accptance', 'auto' )->get()->groupBy(function($data){
               return  Carbon::parse($data->created_at)->format("D");
        });
 
        // $months = [];
        // $monthCount = [];

        // foreach($data as $month => $values){
        //     $months[]= $month;
        //     $monthCount [] = count($values);


        // }

        $ev_acp = Evenement::where('status','accept')->count();
        $ev_ref =  Evenement::where('status','attend')->count();
  
        return view('dashboard.index',[ 'ev_acp' => $ev_acp , 'ev_ref' => $ev_ref,'data_a' => $data_a ,'data_m' => $data_m]);

       }else{
        return view('dashboard.users.profile');

       }
    }
}
