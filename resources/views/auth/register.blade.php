<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf


        @if ($errors->has('error'))
            <div class="mb-4 font-medium text-red-600">
                {{ $errors->first('error') }}
            </div>
        @endif

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Type de compte')" />
            <select name="role" id="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" onchange="toggleCompanyFields()">
                <option value="coach" {{ old('role') == 'coach' ? 'selected' : '' }}>Coach</option>
                <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employé</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Company Selection (for employees) -->
        <div class="mt-4" id="company-fields" style="display: none;">
            <x-input-label for="company_id" :value="__('Entreprise')" />
            <select name="company_id" id="company_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Sélectionnez une entreprise</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('company_id')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Déjà inscrit?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function toggleCompanyFields() {
            const roleSelect = document.getElementById('role');
            const companyFields = document.getElementById('company-fields');
            const companySelect = document.getElementById('company_id');

            if (roleSelect.value === 'employee') {
                companyFields.style.display = 'block';
                companySelect.required = true;
            } else {
                companyFields.style.display = 'none';
                companySelect.required = false;
            }
        }

        // Exécuter au chargement de la page pour gérer l'état initial
        document.addEventListener('DOMContentLoaded', function() {
            toggleCompanyFields();
        });
    </script>
</x-guest-layout>
