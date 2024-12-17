<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>
    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('DELETE')

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?')">
            Supprimer le compte
        </button>
    </form>
    </x-modal>
</section>