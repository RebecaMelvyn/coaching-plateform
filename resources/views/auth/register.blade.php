<x-guest-layout>
    <div class="auth-panel max-w-lg mx-auto w-full lg:max-w-none">
        <div class="mb-8">
            <h1 class="font-display text-3xl font-bold text-ink">Inscription</h1>
            <p class="mt-2 text-sm text-ink-muted">Créez votre compte CoachPro+</p>
        </div>

        @if ($errors->has('error'))
            <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">{{ $errors->first('error') }}</div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-ink">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="app-input mt-1">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-ink">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="app-input mt-1">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-ink">Type de compte</label>
                <select name="role" id="role" class="app-input mt-1" onchange="toggleCompanyFields()">
                    <option value="coach" @selected(old('role') == 'coach')>Coach</option>
                    <option value="employee" @selected(old('role') == 'employee')>Employé</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <div id="company-fields" class="{{ old('role') === 'employee' ? '' : 'hidden' }}">
                <label for="company_id" class="block text-sm font-medium text-ink">Entreprise</label>
                <select name="company_id" id="company_id" class="app-input mt-1">
                    <option value="">Sélectionnez une entreprise</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" @selected(old('company_id') == $company->id)>{{ $company->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('company_id')" class="mt-2" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-ink">Mot de passe</label>
                <input id="password" type="password" name="password" required class="app-input mt-1">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-ink">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="app-input mt-1">
            </div>

            <button type="submit" class="app-btn-primary w-full py-3">S'inscrire</button>
        </form>

        <p class="mt-8 text-center text-sm text-ink-muted">
            Déjà inscrit ?
            <a href="{{ route('login') }}" class="font-semibold text-primary">Se connecter</a>
        </p>
    </div>

    <script>
        function toggleCompanyFields() {
            const role = document.getElementById('role').value;
            const fields = document.getElementById('company-fields');
            const select = document.getElementById('company_id');
            fields.classList.toggle('hidden', role !== 'employee');
            select.required = role === 'employee';
        }
        document.addEventListener('DOMContentLoaded', toggleCompanyFields);
    </script>
</x-guest-layout>
