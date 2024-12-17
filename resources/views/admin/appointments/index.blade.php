@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Rendez-vous</h1>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Docteur</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->user->name }}</td>
                <td>{{ $appointment->doctor->name }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->status }}</td>
                <td>
                    @if ($appointment->status !== 'confirmed')
                    <form action="{{ route('appointments.approve', $appointment->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Approuver</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection