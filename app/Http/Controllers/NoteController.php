<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Etudiant;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::with(['etudiant', 'evaluation'])->get();
        return view('note.index', compact('notes'));
    }

    public function create()
    {
        $etudiants = Etudiant::all();
        $evaluations = Evaluation::all();
        return view('note.create', compact('etudiants', 'evaluations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'evaluation_id' => 'required|exists:evaluations,id',
            'note' => 'required|numeric|min:0|max:20',
        ]);

        Note::create($request->all());

        return redirect()->route('note.index')->with('success', 'Note ajoutée avec succès.');
    }

    public function edit(Note $note)
    {
        $etudiants = Etudiant::all();
        $evaluations = Evaluation::all();
        return view('note.edit', compact('note', 'etudiants', 'evaluations'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'evaluation_id' => 'required|exists:evaluations,id',
            'note' => 'required|numeric|min:0|max:20',
        ]);

        $note->update($request->all());

        return redirect()->route('note.index')->with('success', 'Note mise à jour avec succès.');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('note.index')->with('success', 'Note supprimée avec succès.');
    }
}
