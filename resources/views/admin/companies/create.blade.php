@php
    $inputClass = 'mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-primary focus:ring-primary';
@endphp

<x-admin-layout>
    <x-slot name="header">
        {{ __('Nouvelle entreprise') }}
    </x-slot>

    @include('admin.partials.flash')

    <x-admin.page-card title="Créer une entreprise">
        <form method="POST" action="{{ route('admin.companies.store') }}" class="mx-auto max-w-2xl space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-bold text-primary">Nom de l'entreprise *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="{{ $inputClass }}">
            </div>

            <div>
                <label for="address" class="block text-sm font-bold text-primary">Adresse</label>
                <input type="text" name="address" id="address" value="{{ old('address') }}" class="{{ $inputClass }}">
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <label for="phone" class="block text-sm font-bold text-primary">Téléphone</label>
                    <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="{{ $inputClass }}">
                </div>
                <div>
                    <label for="email" class="block text-sm font-bold text-primary">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="{{ $inputClass }}">
                </div>
            </div>

            <div>
                <label for="contact_email" class="block text-sm font-bold text-primary">Email de contact</label>
                <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email') }}" class="{{ $inputClass }}">
            </div>

            <div class="flex flex-col gap-3 sm:flex-row">
                <button type="submit" class="rounded-xl bg-primary px-6 py-3 font-bold text-white shadow-lg transition hover:bg-primary-dark">
                    Créer l'entreprise
                </button>
                <a href="{{ route('admin.companies.index') }}" class="rounded-xl border border-primary/20 px-6 py-3 text-center font-bold text-primary transition hover:bg-primary/5">
                    Annuler
                </a>
            </div>
        </form>
    </x-admin.page-card>
</x-admin-layout>
