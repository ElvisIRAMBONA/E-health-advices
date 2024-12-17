<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <!-- resources/views/profile/partials/update-password-form.blade.php -->

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <div>
            <label for="current_password">Mot de passe actuel</label>
            <input type="password" name="current_password" id="current_password" required>
        </div>

        <div>
            <label for="password">Nouveau mot de passe</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <button type="submit">Changer le mot de passe</button>
    </form>


</section>