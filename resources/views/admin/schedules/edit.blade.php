<!-- resources/views/admin/schedules/edit.blade.php -->

@extends('layouts.admin')
<!-- Inclure un layout admin si tu en as un -->

@section('content')
<div class="container">
    <h1>Modifier un horaire</h1>

    <!-- Formulaire de modification -->
    <form action="{{ route('admin.schedules.update', $schedule) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="doctor_id" class="form-label">Médecin</label>
            <select name="doctor_id" id="doctor_id" class="form-select @error('doctor_id') is-invalid @enderror">
                @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ $doctor->id == $schedule->doctor_id ? 'selected' : '' }}>
                    {{ $doctor->name }}
                </option>
                @endforeach
            </select>
            @error('doctor_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="day_of_week" class="form-label">Jour de la semaine</label>
            <input type="text" name="day_of_week" id="day_of_week"
                class="form-control @error('day_of_week') is-invalid @enderror"
                value="{{ old('day_of_week', $schedule->day_of_week) }}">
            @error('day_of_week')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Heure de début</label>
            <input type="time" name="start_time" id="start_time"
                class="form-control @error('start_time') is-invalid @enderror"
                value="{{ old('start_time', $schedule->start_time) }}">
            @error('start_time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">Heure de fin</label>
            <input type="time" name="end_time" id="end_time"
                class="form-control @error('end_time') is-invalid @enderror"
                value="{{ old('end_time', $schedule->end_time) }}">
            @error('end_time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Mettre à jour l'horaire</button>
    </form>
</div>
@endsection