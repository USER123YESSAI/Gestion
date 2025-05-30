<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller {
    public function create(Evaluation $evaluation) {
        $etudiants = Etudiant::all();
        return view('notes.create', compact('evaluation', 'etudiants'));
    }
    public function store(Request $request) {
        foreach ($request->notes as $etudiant_id => $valeur) {
            Note::updateOrCreate(
                ['etudiant_id' => $etudiant_id, 'evaluation_id' => $request->evaluation_id],
                ['valeur' => $valeur]
            );
        }
        return back()->with('success', 'Notes enregistrées');
    }
    public function statistiques() {
        $moyennes = Etudiant::with('notes')->get()->map(function ($etudiant) {
            $notes = $etudiant->notes->pluck('valeur');
            return [
                'etudiant' => $etudiant,
                'moyenne' => round($notes->avg(), 2)
            ];
        });
        return view('notes.statistiques', compact('moyennes'));
    }
}