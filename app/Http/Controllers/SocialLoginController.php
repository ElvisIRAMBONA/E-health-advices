<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialLoginController extends Controller
{
    /**
     * Redirection vers Google pour l'authentification.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
     public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Gestion du callback de Google après authentification.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
    {
        try {
            // Obtenir les informations de l'utilisateur depuis Google
            $googleUser = Socialite::driver('google')->user();

            // Rechercher un utilisateur existant par e-mail
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Si l'utilisateur n'existe pas, le créer
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt('default_password'), // Générer un mot de passe par défaut
                ]);
            }

            // Connecter l'utilisateur
            Auth::login($user);

            // Rediriger vers le tableau de bord ou une autre page
            return redirect()->route('home');
        } catch (\Exception $e) {
            // Gérer les erreurs et rediriger vers la page de connexion avec un message d'erreur
            return redirect()->route('login')->withErrors([
                'error' => 'Échec de l\'authentification avec Google. Veuillez réessayer.',
            ]);
        }
    }
}