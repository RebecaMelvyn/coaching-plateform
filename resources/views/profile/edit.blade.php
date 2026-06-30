<x-app-layout>
    <x-slot name="header">Mon profil</x-slot>
    <x-slot name="subtitle">Gérez vos informations personnelles</x-slot>

    <div class="mx-auto max-w-3xl space-y-6">
        <x-admin.page-card title="Informations du profil">
            @include('profile.partials.update-profile-information-form')
        </x-admin.page-card>
        <x-admin.page-card title="Modifier le mot de passe">
            @include('profile.partials.update-password-form')
        </x-admin.page-card>
        <x-admin.page-card title="Supprimer le compte">
            @include('profile.partials.delete-user-form')
        </x-admin.page-card>
    </div>
</x-app-layout>
