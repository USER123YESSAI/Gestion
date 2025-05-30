<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluationController extends Controller {
    public function index() {
        $evaluations = Evaluation::all();
        return view('evaluations.index', compact('evaluations'));
    }
    public function store(Request $request) {
        Evaluation::create($request->all());
        return redirect()->route('evaluations.index');
    }
}
