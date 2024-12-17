<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
   // public function __construct()
  //   {
  //  $this->middleware(['auth', 'admin']);
  // }
public function index()
{
    $doctors = Doctor::all(); // Récupère les médecins
    return view('admin.doctors.index', ['doctors' => $doctors]); // Passe la variable 'doctors' à la vue
    
}
public function showall()
{
    $doctors = Doctor::all(); // Récupère les médecins
    return view('admin.doctors.show', ['doctors' => $doctors]); // Passe la variable 'doctors' à la vue

    
}


//methode pour creer doctor

    /**
     * Mettre à jour les informations d'un médecin.
     */

    /**
     * Ajouter un nouveau médecin.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact' =>'required|string|max:255', // Ensure 'category_id' is required
        ]);

        // Handle the image upload and generate URL
     
        $request->hasFile('image');
     

       Doctor::create([
            'name' => $request->name,
            'specialization' => $request->specialization,
            'location' => $request->location,
            'contact' => $request->contact,
            'image_url' =>  $request->image, // Save the URL to the image
        ]);
     

           return redirect()->route('admin.doctors.index')->with('success', 'Médecin ajouté avec succès');
    }


     public function create()
    {
        return view('admin.doctors.create'); // Retourne la vue pour ajouter un médecin
    }

    /**
     * Afficher un médecin spécifique avec ses relations.
     */
public function show($doctor)
{
    if (!is_numeric($doctor)) {
        abort(404, 'Invalid doctor ID');
    }

    $doctor = Doctor::findOrFail($doctor);
    return view('admin.doctors.show', compact('doctor'));
}

    public function update(Request $request, Doctor $doctor)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // Vérification de la validation
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Mise à jour des informations du médecin
        $doctor->update($request->only(['name', 'specialization', 'location', 'contact','image' ]));

        return response()->json([
            'message' => 'Médecin mis à jour avec succès',
            'doctor' => $doctor,
        ]);
    }

    /**
     * Supprimer un médecin.
     */
    public function destroy(Doctor $doctor)
    {
        // Vérification de l'existence du médecin avant suppression
        if (!$doctor) {
            return response()->json(['message' => 'Médecin non trouvé'], 404);
        }

        // Suppression du médecin
        $doctor->delete();

        return response()->json(['message' => 'Médecin supprimé avec succès']);
    }
}