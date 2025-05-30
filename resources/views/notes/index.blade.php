@extends('layouts.base')

@section('content')
<div class="container">
    <h2>Liste des notes</h2>
    <a href="{{ route('notes.create') }}" class="btn btn-primary mb-3">Ajouter une note</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Étudiant</th>
                <th>Évaluation</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{ $note->etudiant->nom }}</td>
                    <td>{{ $note->evaluation->titre }}</td>
                    <td>{{ $note->note }}</td>
                    <td>
                        <a href="{{ route('notes.edit', $note) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette note ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
