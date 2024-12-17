<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
public function edit(Request $request): View
{
return view('profile.edit', [
'user' => $request->user(),
]);
}

public function update(ProfileUpdateRequest $request): RedirectResponse
{
$user = $request->user();
$user->fill($request->validated());
   $validatedData = $request->validated();
    if ($request->filled('password')) {
        $validatedData['password'] = bcrypt($request->input('password'));
    } else {
        unset($validatedData['password']); // Ne pas mettre à jour le mot de passe s'il n'est pas changé
    }

// Gestion de la photo de profil
if ($request->hasFile('profile_picture')) {
if ($user->profile_picture) {
Storage::disk('public')->delete($user->profile_picture);
}
$path = $request->file('profile_picture')->store('profile_pictures', 'public');
$user->profile_picture = $path;
}

// Réinitialiser la vérification de l'e-mail si changé
if ($user->isDirty('email')) {
$user->email_verified_at = null;
}

$user->save();

 return redirect('/')->with('status', 'Profile updated!');
}

public function destroy(Request $request): RedirectResponse
{
$request->validateWithBag('userDeletion', [
'password' => ['required', 'current_password'],
]);

$user = $request->user();

Auth::logout();

$user->delete();

$request->session()->invalidate();
$request->session()->regenerateToken();

return Redirect::to('/');
}

}