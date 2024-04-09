<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Prospect;

class ClientController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        $prospects = Prospect::all();

        return view('clients.index', [
            'clients' => $clients,
            'prospects' => $prospects
        ]);
    }

    public function create()
{
    $prospects = Prospect::all();

    $delaiPaiementDefault = 30;

    return view('clients.create', [
        'prospects' => $prospects,
         'delaiPaiementDefault' => $delaiPaiementDefault
        ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'adresse' => 'required|string|min:5|max:255',
            'delaisPaiement' => 'required|numeric',
            'prospect_id' => 'required'
        ]);
        
        $client = Client::create($validated);

        return view ('clients.index',[
            'client' => $client,
            'adresse' => $validated['adresse'],
            'delaisPaiement' => $validated['delaisPaiement'],
            'prospect_id' => $validated['prospect_id']
        ]);
    }

    public function show(string $id)
{
    $client = Client::findOrFail($id);

    return view ('clients.show', [
        'client' => $client,
    ]);
}


    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        $prospects = Prospect::all();

        return view ('clients.edit', [
            'client' => $client,
            'prospects' => $prospects
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'adresse' => 'required|string|min:5|max:255',
            'delaisPaiement' => 'required|numeric',
            'prospect_id' => 'required'
        ]);
        

        $client->adresse = $validated['adresse'];
        $client->delaisPaiement = $validated['delaisPaiement'];

        $client->save();

        return redirect()->route('clients.index')->with('success', 'Votre client a bien été modifié');

    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Votre client a bien été supprimé.');
    }
}