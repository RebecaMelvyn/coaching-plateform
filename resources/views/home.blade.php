@extends('layouts.guest')

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-blue-400 py-16 text-white text-center">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Plateforme de Coaching Professionnel</h1>
        <p class="text-lg md:text-xl mb-8">Connectez vos employés avec les coachs experts pour leur bien-être et leur développement</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-8">
            <a href="#" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded-lg shadow hover:bg-blue-50 transition">Découvrir les séances</a>
            <a href="#" class="bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow hover:bg-blue-800 transition">Devenir coach</a>
        </div>
    </div>
</div>

<div class="bg-white py-8">
    <div class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
        <div>
            <div class="text-3xl font-bold text-blue-600">500+</div>
            <div class="text-gray-700 mt-2">Séances organisées</div>
        </div>
        <div>
            <div class="text-3xl font-bold text-blue-600">150+</div>
            <div class="text-gray-700 mt-2">Entreprises partenaires</div>
        </div>
        <div>
            <div class="text-3xl font-bold text-blue-600">50+</div>
            <div class="text-gray-700 mt-2">Coachs experts</div>
        </div>
        <div>
            <div class="text-3xl font-bold text-blue-600">95%</div>
            <div class="text-gray-700 mt-2">Satisfaction</div>
        </div>
    </div>
</div>

<div class="bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold text-center mb-8">Types de Coaching Disponibles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow p-6 text-center">
                <div class="flex justify-center mb-4">
                    <span class="bg-green-100 text-green-600 rounded-full p-3">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 014-4h3m4 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </span>
                </div>
                <h3 class="font-semibold text-lg mb-2">Coaching Sport</h3>
                <p class="text-gray-600 mb-2">Séances sportives pour booster l'énergie et la cohésion d'équipe.</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 text-center">
                <div class="flex justify-center mb-4">
                    <span class="bg-blue-100 text-blue-600 rounded-full p-3">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 10c-4.418 0-8-1.79-8-4V7a4 4 0 014-4h8a4 4 0 014 4v7c0 2.21-3.582 4-8 4z" /></svg>
                    </span>
                </div>
                <h3 class="font-semibold text-lg mb-2">Bien-être</h3>
                <p class="text-gray-600 mb-2">Yoga, méditation, gestion du stress pour le bien-être mental.</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 text-center">
                <div class="flex justify-center mb-4">
                    <span class="bg-purple-100 text-purple-600 rounded-full p-3">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m4 0h-1v4h-1m-4 0h-1v-4h-1" /></svg>
                    </span>
                </div>
                <h3 class="font-semibold text-lg mb-2">Développement Professionnel</h3>
                <p class="text-gray-600 mb-2">Coaching carrière, leadership, prise de parole en public.</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white py-12">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold text-center mb-8">Créneaux Adaptés à Votre Emploi du Temps</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-yellow-50 rounded-xl shadow p-6 text-center">
                <div class="text-yellow-500 mb-2">
                    <svg class="h-8 w-8 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" /></svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Matin</h3>
                <p class="text-gray-600">Avant le travail, pour bien démarrer la journée.</p>
            </div>
            <div class="bg-blue-50 rounded-xl shadow p-6 text-center">
                <div class="text-blue-500 mb-2">
                    <svg class="h-8 w-8 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 12h8m-8 4h6" /></svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Midi</h3>
                <p class="text-gray-600">Pause déjeuner active et ressourçante.</p>
            </div>
            <div class="bg-purple-50 rounded-xl shadow p-6 text-center">
                <div class="text-purple-500 mb-2">
                    <svg class="h-8 w-8 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87" /></svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Soir</h3>
                <p class="text-gray-600">Après le travail, pour se détendre et récupérer.</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold text-center mb-8">Nos Coachs Experts</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow p-6 text-center flex flex-col items-center">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Marc Dubois" class="w-20 h-20 rounded-full mb-4">
                <h3 class="font-semibold text-lg mb-1">Marc Dubois</h3>
                <div class="text-yellow-400 mb-2">★★★★★</div>
                <p class="text-gray-600 text-sm">Coach Sportif</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 text-center flex flex-col items-center">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sophie Martin" class="w-20 h-20 rounded-full mb-4">
                <h3 class="font-semibold text-lg mb-1">Sophie Martin</h3>
                <div class="text-yellow-400 mb-2">★★★★★</div>
                <p class="text-gray-600 text-sm">Coach Bien-être</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 text-center flex flex-col items-center">
                <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="Thomas Leroy" class="w-20 h-20 rounded-full mb-4">
                <h3 class="font-semibold text-lg mb-1">Thomas Leroy</h3>
                <div class="text-yellow-400 mb-2">★★★★★</div>
                <p class="text-gray-600 text-sm">Coach Pro</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-gradient-to-r from-blue-600 to-blue-400 py-10 text-white text-center">
    <h2 class="text-2xl md:text-3xl font-bold mb-4">Prêt à Transformer Votre Entreprise ?</h2>
    <a href="#" class="bg-white text-blue-600 font-semibold px-8 py-3 rounded-lg shadow hover:bg-blue-50 transition">Contactez-nous</a>
</div>
@endsection
