<?php

namespace App\Http\Controllers;
use App\Models\Vente;
use App\Models\Client;
use App\Models\Prospect;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    
    public function index()
    {
        $prospect = Prospect::all();
        $client = Client::all();
        $ventes = Vente::all();

        return view('ventes.index', [
            'prospect' => $prospect,
            'client' => $client,
            'ventes' => $ventes
        ]);
    }

    public function create()
    {
        $prospect = Prospect::all();
        $clients = Client::all();

        return view('ventes.create', [
            'prospect' => $prospect,
            'clients' => $clients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'prixHT' => 'required|numeric',
            'tva' => 'required|numeric',
            'titre' => 'required|string|min:2|max:155',
            'description' => 'required|string|min:5',
            'client_id' => 'required',
        ]);

        $ventes = Vente::create($validated);

        return redirect()->route('ventes.index')
            ->with('Vente enregistré', [
                'prixHT' => $validated['prixHT'],
                'tva' => $validated['tva'],
                'titre' => $validated['titre'],
                'description' => $validated['description'],
                'client_id' => $validated['client_id'],
                'clients' => $ventes
            ]);
    }

   
    public function show(string $id)
    {
        $vente = Vente::findOrFail($id);
        $prospect = Prospect::all();
        $client = Client::all();
        

        return view('ventes.show', [
            'client' => $client,
            'prospect' => $prospect,
            'vente' => $vente
        ]);
    }

    public function edit(string $id)
    {
        $clients = Client::all();
        $prospects = Prospect::all();
        $vente = Vente::findOrFail($id);
        
        return view('ventes.edit', [
            "vente" => $vente,
            'prospects' => $prospects,
            'clients' => $clients
        ]);
    }

    
    public function update(Request $request, Vente $vente)
    {
        
        $validated = $request->validate([
            'prixHT' => 'required|numeric',
            'tva' => 'required|numeric',
            'titre' => 'required|string|min:2|max:155',
            'description' => 'required|string|min:5',
            'client_id' => 'required',
        ]);

        $vente->prixHT = $validated['prixHT'];
        $vente->tva = $validated['tva'];
        $vente->titre = $validated['titre'];
        $vente->description = $validated['description'];
        $vente->client_id = $validated['client_id'];

        $vente->save();

        return redirect()->route('ventes.index')->with('success', 'Votre vente a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vente $vente)
    {
        $vente->delete();

        return redirect()->route('ventes.index')->with('success', 'Votre communication a bien été supprimé.');
    }
}
