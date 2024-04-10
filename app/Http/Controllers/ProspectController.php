<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prospect;

class ProspectController extends Controller
{
    
    public function index()
    {
        $prospects = Prospect::all();

        return view ('prospects.index', [
            'prospects' => $prospects
        ]);
    }

    
    public function create()
    {
        return view('prospects.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:155',
            'prenom' => 'required|string|max:155',
            'email' => 'required|string|max:255',
            'tel' => 'required|string',
            'dateNaissance' => 'required|date_format:Y-m-d',
            'besoin' => 'required|string'
        ]);
        $prospect = Prospect::create($validated);
        
            return redirect()->back()->with('Le prospect' . $prospect->name . 'est créé');
        ;
    }

    
    public function show(string $id)
    {
        $prospect = Prospect::findOrFail($id);

        return view ('prospects.show', [
            'prospect' => $prospect
        ]);
    }

    
    public function edit(string $id)
    {
        $prospect = Prospect::findOrFail($id);

        return view ('prospects.edit', [
            'prospect' => $prospect
        ]);
    }

   
    public function update(Request $request, string $id)
    {
        $prospect = Prospect::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|max:155',
            'prenom' => 'required|string|max:155',
            'email' => 'required|string|max:255',
            'tel' => 'required|string',
            'dateNaissance' => 'required|date_format:Y-m-d',
            'besoin' => 'required|string'
        ]);
        
        $prospect->nom = $validated['nom'];
        $prospect->prenom = $validated['prenom'];
        $prospect->email = $validated['email'];
        $prospect->tel = $validated['tel'];
        $prospect->dateNaissance = $validated['dateNaissance'];
        $prospect->besoin = $validated['besoin'];

        $prospect->save();

        return view ('prospects.show', [
            'prospect' => $prospect
        ]);

    }

    public function destroy(string $id)
    {
        $prospect = Prospect::findOrFail($id);
        $prospect->message()->delete();
        $prospect->delete();
        
        
        $prospects = Prospect::all();
        return view ('prospects.index', [
            'prospects' => $prospects
        ]);
        

    }
}