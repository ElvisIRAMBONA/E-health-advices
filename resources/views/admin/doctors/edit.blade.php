@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Modifier un Médecin</h1>

    <form action="{{ route('doctors.update', $doctor) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name }}" required>
        </div>

        <div class="form-group">
            <label for="specialization">Spécialisation</label>
            <input type="text" class="form-control" id="specialization" name="specialization"
                value="{{ $doctor->specialization }}" required>
        </div>

        <div class="form-group">
            <label for="location">Localisation</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $doctor->location }}"
                required>
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ $doctor->contact }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection