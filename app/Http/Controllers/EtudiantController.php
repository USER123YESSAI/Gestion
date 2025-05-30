<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    public function index(){
        $etudiants = Etudiant::orderBy('nom', 'asc')->paginate(10);

        return view('etudiant.index', [
            'etudiants' => $etudiants,
        ]);
    }

    public function create(){
        return view('etudiant.create');
    }

    public function store(Request $request){
        $request->validate([
            'nom' => 'required|min:2|max:45',
            'prenom' => 'required|min:2|max:45',
            'date_naissance' => 'required|date',
        ]);

        try {
            Etudiant::create([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'date_naissance' => $request->input('date_naissance')
            ]);
            return redirect()->route('etudiant.create')
                             ->with('success', 'Étudiant enregistré avec succès');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function delete(Etudiant $etudiant){
        $etudiant->delete();
        return redirect()->route('etudiant.index')->with('success', 'Étudiant supprimé avec succès');
    }

    public function edit(Etudiant $etudiant){
        return view('etudiant.edit', compact('etudiant'));
    }

    public function update(Request $request, Etudiant $etudiant){
        $request->validate([
            'nom' => 'required|min:2|max:45',
            'prenom' => 'required|min:2|max:45',
            'date_naissance' => 'required|date',
        ]);

        $etudiant->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'date_naissance' => $request->input('date_naissance'),
        ]);

        return redirect()->route('etudiant.index')->with('success', 'Étudiant modifié avec succès');
    }
}
