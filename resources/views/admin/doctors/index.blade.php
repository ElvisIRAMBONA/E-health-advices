@extends('admin.layouts.admin')
@section('title', 'Liste des Produits')
@section('content')
<div class="container">
    <h1>List of doctors</h1>


    <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">Add</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>specialization</th>
                <th>Location</th>
                <th>Contact</th>
                <th>Image</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
            <tr>
                <td>{{ $doctor->id }}</td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->specialization }}</td>
                <td>{{ $doctor->location }}</td>
                <td>{{ $doctor->contact }}</td>
                <td>
                    @if ($doctor->image_url)
                    <img src="{{ $doctor->image_url }}" alt="{{ $doctor->name }}" style="width:100px;">
                    @else
                    Aucune image
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.doctors.edit', $doctor) }}" class="btn btn-warning">Modify</a>
                    <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST" style="display:inline;">
                        @csrf
                        @method(' DELETE') <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif