@extends('admin.layouts.admin')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <h2>Créer une nouvelle catégorie</h2>

    <!-- Affichage des messages de succès ou d'erreur -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        <!-- Champ pour le nom de la catégorie -->
        <div class="form-group">
            <label for="name">Nom de la catégorie</label>
            <input type="text" id="name" name="name" class="form-control" required>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary mt-3">Créer la catégorie</button>
    </form>
</div>
@endsection