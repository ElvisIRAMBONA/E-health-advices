@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Prendre un Rendez-vous</h1>

    <form action="{{ route('appointments.store',$doctor->id) }}" method="POST">
        @csrf
        <label for="appointment_date">Date de rendez-vous :</label>
        <input type="date" name="appointment_date" required>
        <input type="hidden" name="status" value="pending">
        <button type="submit" class="btn btn-primary">Prendre Rendez-vous</button>
    </form>
    @endsection