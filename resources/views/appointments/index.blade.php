@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Rendez-vous</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
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
                <td>{{ $appointment->doctor->name }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->status }}</td>
                <td>
                    <a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-warning">Modification</a>
                    <form action="{{ route('appointments.destroy', $appointment) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Annuler</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection