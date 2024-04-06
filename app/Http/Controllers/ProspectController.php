<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prospect;

class ProspectController extends Controller
{
    
    public function index()
    {
        $prospects = Prospect::all();

        return view('prospects.index' , [
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
            'dateNaissance' => 'required|date_format:Y-m-d',
            'tel' => 'required|string',
            'besoin' => 'required|string'
        ]);

        $prospect = Prospect::create($validated);

        return view ('prospects.index',[
            'prospect' => $prospect
        ]);
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        //
    }

   
    public function destroy(string $id)
    {
        //
    }
}
