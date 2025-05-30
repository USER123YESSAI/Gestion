<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtudiantController extends Controller {
    public function index() {
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }
    public function store(Request $request) {
        Etudiant::create($request->all());
        return redirect()->route('etudiants.index');
    }
}