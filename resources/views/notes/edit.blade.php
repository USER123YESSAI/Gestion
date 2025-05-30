@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier une note</h2>

    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Étudiant</label>
            <select name="etudiant_id" class="form-control" required>
                @foreach($etudiants as $etudiant)
                    <option value="{{ $etudiant->id }}" {{ $note->etudiant_id == $etudiant->id ? 'selected' : '' }}>
                        {{ $etudiant->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Évaluation</label>
            <select name="evaluation_id" class="form-control" required>
                @foreach($evaluations as $evaluation)
                    <option value="{{ $evaluation->id }}" {{ $note->evaluation_id == $evaluation->id ? 'selected' : '' }}>
                        {{ $evaluation->titre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Note</label>
            <input type="number" name="note" value="{{ $note->note }}" step="0.1" min="0" max="20" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
