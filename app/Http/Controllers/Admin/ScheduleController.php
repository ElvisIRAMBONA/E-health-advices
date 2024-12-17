<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Doctor;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
 //public function __construct()
   // {
    //    $this->middleware('role:2');
   // }

    // Affiche tous les horaires des médecins
    public function index()
    {
        $schedules = Schedule::with('doctor')->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    // Affiche le formulaire pour ajouter un horaire
    public function create()
    {
        $doctors = Doctor::all();
        return view('admin.schedules.create', compact('doctors'));
    }

    // Enregistre un nouvel horaire
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day_of_week' => 'required|string|max:20',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        Schedule::create([
            'doctor_id' => $request->doctor_id,
            'day_of_week' => $request->day_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('admin.schedules.index')->with('success', 'Horaire ajouté avec succès');
    }

    // Affiche le formulaire pour modifier un horaire
    public function edit(Schedule $schedule)
    {
        $doctors = Doctor::all();
        return view('admin.schedules.edit', compact('schedule', 'doctors'));
    }

    // Met à jour un horaire existant
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day_of_week' => 'required|string|max:20',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $schedule->update([
            'doctor_id' => $request->doctor_id,
            'day_of_week' => $request->day_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('admin.schedules.index')->with('success', 'Horaire mis à jour avec succès');
    }

    // Supprime un horaire
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->with('success', 'Horaire supprimé avec succès');
    }
}