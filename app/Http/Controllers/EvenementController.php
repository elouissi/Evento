<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Http\Requests\StoreEvenementRequest;
use App\Http\Requests\UpdateEvenementRequest;
use App\Models\Categorie;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Dans votre contrôleur ou votre vue

// Vous pouvez maintenant utiliser $user pour accéder aux informations de l'utilisateur

        $evenements = Evenement::with('user','categorie')->latest()->paginate(6);
        $categories = Categorie::all();
        return view('dashboard.evenement.index', compact('evenements','categories'));


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
    public function store(StoreEvenementRequest $request)
    {
 
        $request->validated();
 

        $manuel=$request['accptance']??null; 
         if($manuel !== null){
               $accept = "manuel";
            }else{
                $accept = "auto"; 
            }

           Evenement::create([
            'lieux' => $request->input('lieux'),
            'titre' => $request->input('titre'),
            'prix' => $request->input('prix'),
            'durée' => $request->input('durée'),
            'accptance'=>$accept,
            'description' => $request->input('description'),
             'capacity' => $request->input('capacity'),
            'localisation' => $request->input('localisation'),
            'date' => $request->input('date'),
            'categorie_id' => $request->input('categorie_id'),
            'tickets_vendus' => 0,
            'image'=>$request->file('image')->store('evenement', 'public'),
            'organisateur' => auth()->id(),
         ]);
        
        return redirect(route('evenement'));

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement)
    {
        
        $evenements = Evenement::with('user','categorie')->latest()->paginate(6);
        $categories = Categorie::all();
        return view('dashboard.evenement.edit',compact('evenements','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvenementRequest $request, Evenement $evenement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->route('evenement');

    }
}
