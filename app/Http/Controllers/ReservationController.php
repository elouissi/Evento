<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Http\Requests\StorereservationRequest;
use App\Http\Requests\UpdatereservationRequest;
use App\Models\Evenement;
use Illuminate\Support\Str;
use Illuminate\Http\Request as HttpRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('dashboard.reservations.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $id)
    {


        $evenement = Evenement::with('user', 'categorie')->where('id', $id)->first();
        $reference = strtoupper(Str::random(6)); // Génère une chaîne aléatoire de 6 caractères


        if($evenement->accptance == "manuel"){
            Reservation::create([
                'user_id' => auth()->id(),
                'evenement_id' => $id,
                'reference' => $reference,
                'status' => "refuse"
    
            ]);
            return redirect()->back()->with('sucsess','wait reservation');

        }
        if($evenement->accptance == "auto"){
            Reservation::create([
                'user_id' => auth()->id(),
                'evenement_id' => $id,
                'reference' => $reference,
                'status' => "publish"
    
            ]);
            return redirect()->back()->with('sucsess','you are reserved this event');

        }
    }

    public function publish(int $id){

        Reservation::where('id',$id)->update([
            'status'=>'publish'
        ]);
        return redirect()->back();
    }

    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatereservationRequest $request, Reservation $reservation)
    {
        //
    }

    public function BanerUser(){
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

}
