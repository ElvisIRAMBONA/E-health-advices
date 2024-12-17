@extends('admin.layouts.admin')

@section('title', 'Liste des Catégories')

@section('content')
<div class="container">
    <h1 class="mt-4">Catégories</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Ajouter Catégorie</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>

                <td>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection