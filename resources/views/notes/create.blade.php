@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter une note</h2>

    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Étudiant</label>
            <select name="etudiant_id" class="form-control" required>
                @foreach($etudiants as $etudiant)
                    <option value="{{ $etudiant->id }}">{{ $etudiant->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Évaluation</label>
            <select name="evaluation_id" class="form-control" required>
                @foreach($evaluations as $evaluation)
                    <option value="{{ $evaluation->id }}">{{ $evaluation->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Note</label>
            <input type="number" name="note" step="0.1" min="0" max="20" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
