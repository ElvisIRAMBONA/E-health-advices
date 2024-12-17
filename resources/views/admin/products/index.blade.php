@extends('admin.layouts.admin')

@section('title', 'Liste des Produits')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4 mb-4 text-center">Liste des Produits</h1>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajouter Produit
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->namep }}</td>
                        <td>{{ $product->price }} €</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Modifier
                            </a>



                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection