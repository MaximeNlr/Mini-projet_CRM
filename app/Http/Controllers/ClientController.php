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

    /**
     * Show the form for creating a new resource.
     */
    // public function create($prospectId)
    // {
    //     $prospect = Prospect::find($prospectId);

    //     $delaiPaiementDefault = 30;

    //     return view('clients.create', compact('prospect', 'delaiPaiementDefault'));
    // }

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
            'delai_paiement' => 'required|numeric|default:30'
        ]);
        $client = Client::create($validated);

        return view ('clients.store',[
            'client' => $client 
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);

        return view ('clients.show', [
            'clients' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);

        return view ('clients.edit', [
            'client' => $client
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
            'delai_paiement' => 'required|numeric|default:30'
        ]);

        $client->adresse = $validated['adresse'];
        $client->delai_paiement = $validated['delai_paiement'];

        $client->save();

        return view('clients.update', [
            'client' => $client
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return view ('client.destroy');
    }
}