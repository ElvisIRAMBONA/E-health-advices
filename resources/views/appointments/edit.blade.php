@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier mon Rendez-vous</h1>

    <form action="{{ route('appointments.update', $appointment) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="doctor_id">Docteur</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                <option value="{{ $appointment->doctor_id }}">{{ $appointment->doctor->name }} -
                    {{ $appointment->doctor->specialization }}</option>
                @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }} - {{ $doctor->specialization }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="appointment_date">Date du rendez-vous</label>
            <input type="date" name="appointment_date" id="appointment_date" class="form-control"
                value="{{ $appointment->appointment_date }}" required>
        </div>

        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmé</option>
                <option value="canceled" {{ $appointment->status == 'canceled' ? 'selected' : '' }}>Annulé</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection