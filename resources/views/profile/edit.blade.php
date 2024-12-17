@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Update Profile</h2>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>
        <!-- Champ de mot de passe -->
        <div class="form-group">
            <label for="password">Nouveau mot de passe</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <!-- Champ de confirmation de mot de passe -->
        <div class="form-group">
            <label for="password_confirmation">Confirmez le nouveau mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
        </div>

        <!-- Bio -->
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" class="form-control">{{ old('bio', $user->bio) }}</textarea>
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control">
        </div>

        <!-- Profile Picture -->
        <div class="form-group">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" name="profile_picture" class="form-control-file">
            @if ($user->profile_picture)
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="mt-2" width="100">
            @endif
        </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection