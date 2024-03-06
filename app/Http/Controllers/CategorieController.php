<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Http\Requests\StorecategorieRequest;
use App\Http\Requests\UpdatecategorieRequest;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=categorie::all();
        return view('dashboard.categories.index',compact('categories'));
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
    public function store(StorecategorieRequest $request)
    {
       $form = $request->validated();
       categorie::create($form);
       return redirect()->route('categorie');
    }

    /**
     * Display the specified resource.
     */
    public function show(categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
 
     public function edit($id)
     {
         $categorie = categorie::findOrFail($id);
         return view('dashboard.categories.edit', compact('categorie'));
     }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategorieRequest $request, int  $id)
    {
        $request->validate([
            'nom' => 'required|max:255|string',
        ]);
        categorie::findOrFail($id)->update([
            'nom' => $request->nom,
        ]);
        return redirect()->route('categorie')->with('success', 'Category updated Successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categorie');
    }
    
}
