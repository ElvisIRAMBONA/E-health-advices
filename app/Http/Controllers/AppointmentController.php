<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Notifications\AppointmentApproved;

class AppointmentController extends Controller
{
    /**
     * Afficher la liste des rendez-vous pour un utilisateur.
     */
    
    public function getAll()
    {
        // Récupérer les rendez-vous associés à l'utilisateur connecté
        $appointments = Appointment::with(['doctor', 'user'])->get();
        return view('admin.appointments.index', compact('appointments'));
    }

     
    public function index()
    {
        // Récupérer les rendez-vous associés à l'utilisateur connecté
        $appointments = Appointment::with('doctor')->where('user_id', Auth::user()->id)->get();
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Afficher le formulaire de prise de rendez-vous.
     */
    public function create($id)
    {
        // Récupérer tous les médecins disponibles
       $doctor=Doctor::findOrFail($id);
        return view('appointments.create',compact('doctor'));
    }


public function store(Request $request,$id)
{

       

    // Continue with the rest of the method...
    // Validate the appointment date
    $request->validate([
        'appointment_date' => 'required|date|after_or_equal:today', 
    ]);

    // Get the authenticated user
    $user = Auth::user();

    if ($user) {
        // Create the appointment
        Appointment::create([
            'user_id' => $user->id,
            'doctor_id' => $id, // Use the doctor_id from the route
            'appointment_date' => $request->appointment_date,
            'status' => $request->status ?? 'pending',
      
        ]);
    } else {
        // Redirect if the user is not authenticated
        return redirect()->route('login')->with('error', 'Veuillez vous connecter pour prendre un rendez-vous.');
    }

    // Redirect with a success message
    return redirect()->route('my')->with('success', 'Rendez-vous pris avec succès.');
}
 

    /**
     * Afficher le formulaire d'édition d'un rendez-vous.
     */
    public function edit(Appointment $appointment)
    {
        // Vérifier que l'utilisateur est propriétaire du rendez-vous
        if ($appointment->user_id !== Auth::user()->id) {
            return redirect()->route('appointments.index')->with('error', 'Accès non autorisé');
        }

        // Récupérer tous les médecins
        $doctors = Doctor::all();
        return view('appointments.edit', compact('appointment', 'doctors'));
    }

    /**
     * Mettre à jour un rendez-vous.
     */
    public function update(Request $request, Appointment $appointment)
    {
        // Vérifier que l'utilisateur est propriétaire du rendez-vous
        if ($appointment->user_id !== Auth::user()->id) {
            return redirect()->route('appointments.index')->with('error', 'Accès non autorisé');
        }

        // Validation des données
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after:today',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        // Mettre à jour le rendez-vous
        $appointment->update([
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'status' => $request->status,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Rendez-vous mis à jour avec succès');
    }

    /**
     * Annuler un rendez-vous.
     */
    public function destroy(Appointment $appointment)
    {
        // Vérifier que l'utilisateur est propriétaire du rendez-vous
        if ($appointment->user_id !== Auth::user()->id) {
            return redirect()->route('appointments.index')->with('error', 'Accès non autorisé');
        }

        // Supprimer le rendez-vous
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Rendez-vous annulé avec succès');
    }

    // Méthode pour approuver un rendez-vous
public function approve($id)
{
    // Fetch the appointment by its ID
    $appointment = Appointment::with(['doctor', 'user'])->findOrFail($id);

    // Update the appointment status
    $appointment->status = 'confirmed';
    $appointment->save();

    // Notify the user about the approval
    $appointment->user->notify(new AppointmentApproved($appointment));

    // Redirect with a success message
    return redirect()->route('allApointments')->with('success', 'Le rendez-vous a été approuvé avec succès.');
}

    public function myAppointments()
    {
        $appointments = Appointment::where('user_id', Auth::id())->get(); // Utiliser Auth::id()
        return view('appointments.my_appointments', compact('appointments'));
    }
    public function adminIndex()
   {
    // Récupérer tous les rendez-vous
    $appointments = Appointment::with('user', 'doctor')->get();

    return view('admin.appointments.index', compact('appointments'));
    }
    public function confirmAppointment(Appointment $appointment)
{
    // Mettre à jour le statut du rendez-vous
    $appointment->update(['status' => 'confirmed']);

    // Notifier l'utilisateur
    $appointment->user->notify(new AppointmentApproved($appointment));

    return redirect()->route('admin.appointments.index')->with('success', 'Le rendez-vous a été confirmé avec succès.');
}


}