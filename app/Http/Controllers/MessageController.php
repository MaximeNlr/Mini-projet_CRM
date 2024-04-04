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
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'typeCommunication' => 'required|string|max:100',
            'contenu' => 'required|string|min:10'
        ]);

        $message = Message::create($validated);

        return redirect()->back()
            ->with('Communication enregistré', [
                'typeCommunication' => $validated['typeCommunication'],
                'contenu' => $validated['contenu']
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);

        return view('messages.show', [
            'message' => $message
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $message = Message::findOrFail($id);

        return view('message.edit', [
            "message" => $message
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = Message::findOrFail($id);

        $validated = $request->validate([
            'typeCommunication' => 'required|string|max:100',
            'contenu' => 'required|string|min:10'
        ]);

        $message->save();     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

    }
}
