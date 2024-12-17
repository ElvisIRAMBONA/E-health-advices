@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h1>Ajouter un Médecin</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.doctors.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="specialization">Spécialisation</label>
            <input type="text" class="form-control" id="specialization" name="specialization" required>
        </div>

        <div class="form-group">
            <label for="location">Localisation </label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image du medecin </label>
            <input type="file" name="image" id="image" class="form-control">
        </div>


        <button type=" submit" class="btn btn-primary mt-3">Ajouter</button>
    </form>
</div>
@endsection