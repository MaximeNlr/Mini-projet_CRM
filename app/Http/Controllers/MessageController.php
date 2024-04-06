<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Prospect;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prospects = Prospect::all();
        $messages = Message::all();

        
        return view('messages.index', [
            'prospects' => $prospects,
            'messages' => $messages,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prospects = Prospect::all();
        return view('messages.create', [
            'prospects' => $prospects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'typeCommunication' => 'required|string|max:100',
            'contenu' => 'required|string|min:10',
            'prospect_id' => 'required',
        ]);
            
        $message = Message::create($validated);

        return redirect()->route('messages.index')
            ->with('Communication enregistré', [
                'typeCommunication' => $validated['typeCommunication'],
                'contenu' => $validated['contenu'],
                'prospect_id' => $validated['prospect_id']
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prospect = Prospect::all();
        $message = Message::findOrFail($id);
        
       

        return view('messages.show', [
            'message' => $message,
            'prospect' => $prospect
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prospects = Prospect::all();
        $message = Message::findOrFail($id);
        return view('messages.edit', [
            "message" => $message,
            'prospects' => $prospects
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {

        $validated = $request->validate([
            'typeCommunication' => 'required|string|max:100',
            'contenu' => 'required|string|min:10',
            'prospect_id' => 'required',
        ]);

        $message->typeCommunication = $validated['typeCommunication'];
        $message->contenu = $validated['contenu'];
        $message->prospect_id = $validated['prospect_id'];

        $message->save();

        return redirect()->route('messages.index')->with('success', 'Votre communication a bien été modifié');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Votre communication a bien été supprimé.');
    }
}
