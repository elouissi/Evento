<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Http\Requests\StoreEvenementRequest;
use App\Http\Requests\UpdateEvenementRequest;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Dans votre contrôleur ou votre vue

// Vous pouvez maintenant utiliser $user pour accéder aux informations de l'utilisateur
     
        if (Auth::user()->hasRole('organisateur')) {
            $evenements = Evenement::with('user','categorie')->where('organisateur',auth()->id())->latest()->paginate(6);
            $categories = Categorie::all();
      }else{

            $categories = Categorie::all();
            $evenements = Evenement::with('user','categorie')->where('status','attend')->paginate(6);
  

      }
        return view('dashboard.evenement.index', compact('evenements','categories'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function accept(Evenement $evenement)
    {
        Evenement::where('id',$evenement->id)->update(['status'=>'accept']);
        return redirect(route('evenement'));


    }
    public function refuse(Evenement $evenement)
    {
        Evenement::where('id',$evenement->id)->update(['status'=>'refusable']);
        return redirect(route('evenement'));


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
        $evenements = Evenement::with('user','categorie')->where('status','accept')->latest()->paginate(6);

        $evenement = Evenement::with('user','categorie')->findOrFail($evenement->id);
         return view('detailsEvent',compact('evenement','evenements'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement)
    {
        $categories = Categorie::all();

        $evenement = Evenement::with('user', 'categorie')->where('id', $evenement->id)->first();
         return view('dashboard.evenement.edit',compact('evenement','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvenementRequest $request, Evenement $evenement)
    {
         $request->validated();
    
        $manuel = $request['accptance'] ?? null;
        if ($manuel !== null) {
            $accept = "manuel";
        } else {
            $accept = "auto";
        }
    
        // Vérifier si un nouveau fichier a été téléchargé
         if ($request->hasFile('image')) {
            $image = $request->file('image')->store('evenement', 'public');
        } else {
            $image = $evenement->image; // Conserver l'image actuelle si aucun nouveau fichier n'a été téléchargé
        }
    
        $evenement->update([
            'lieux' => $request->input('lieux'),
            'titre' => $request->input('titre'),
            'prix' => $request->input('prix'),
            'durée' => $request->input('durée'),
            'accptance' => $accept,
            'description' => $request->input('description'),
            'capacity' => $request->input('capacity'),
            'localisation' => $request->input('localisation'),
            'date' => $request->input('date'),
            'categorie_id' => $request->input('categorie_id'),
            'tickets_vendus' => 0,
            'image' => $image, // Utiliser la nouvelle image ou l'image existante
            'organisateur' => auth()->id(),
        ]);
    
        return redirect(route('evenement'));
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
