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

    public function create(Prospect $prospect)
{
    return view('clients.create', [
        'prospect' => $prospect
        ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prospect = Prospect::findOrFail($request->prospect_id);
        $client = new Client();
        $client->nom = $request -> nom;
        $client->prenom = $request -> prenom;
        $client->tel = $request -> tel;
        $client->email = $request -> email;
        $client->dateNaissance = $request -> dateNaissance;
        $client->besoin = $request -> besoin;
        $client->adresse = $request -> adresse; 
        $client->delaisPaiement = $request -> delaisPaiement; 
        $client->prospect_id = $prospect -> id; 
        $client->save();

        $clients = Client::all();

        return view ('clients.index', [
            'clients' => $clients
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