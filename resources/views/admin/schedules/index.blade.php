<!-- resources/views/admin/schedules/index.blade.php -->

@extends('layouts.admin')
<!-- Inclure un layout admin si tu en as un -->

@section('content')
<div class="container">
    <h1>Gestion des horaires des médecins</h1>

    <!-- Affichage des messages de succès ou d'erreur -->
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Bouton pour ajouter un horaire -->
    <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary mb-3">Ajouter un horaire</a>

    <!-- Tableau des horaires -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom du Médecin</th>
                <th>Jour de la semaine</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->doctor->name }}</td>
                <td>{{ $schedule->day_of_week }}</td>
                <td>{{ $schedule->start_time }}</td>
                <td>{{ $schedule->end_time }}</td>
                <td>
                    <a href="{{ route('admin.schedules.edit', $schedule) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection