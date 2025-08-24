<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CoachPro+ - Plateforme de Coaching en Entreprise</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-white text-gray-800">
  <!-- Barre de navigation -->
  <nav class="w-full flex justify-end items-center px-8 py-4 bg-transparent absolute top-0 left-0 z-10">
    <div class="flex gap-4">
      <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg font-semibold text-blue-700 bg-white border border-blue-700 hover:bg-blue-50 transition">Connexion</a>
      <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-blue-700 hover:bg-blue-800 transition">Inscription</a>
    </div>
  </nav>
  <header class="bg-blue-700 text-white py-16 text-center relative">
    <h1 class="text-4xl font-extrabold mb-4">CoachPro+&nbsp;: Coaching en Entreprise</h1>
    <p class="text-xl mb-6 max-w-2xl mx-auto">Plateforme dédiée au bien-être et à la performance des salariés. Proposez à vos équipes des séances de coaching sportif, bien-être et développement professionnel, animées par des coachs certifiés, sur site ou à distance.</p>
    <div class="flex flex-col sm:flex-row justify-center gap-4">
      <a href="{{ route('login') }}" class="bg-white text-blue-700 px-6 py-3 font-bold rounded-xl hover:bg-blue-100">Découvrir la plateforme</a>
      <a href="{{ route('register') }}" class="bg-violet-500 text-white px-6 py-3 font-bold rounded-xl hover:bg-violet-600">Devenir coach</a>
    </div>
  </header>

  <section class="bg-blue-600 text-white py-12 text-center">
    <div class="flex justify-center flex-wrap gap-10 text-lg font-semibold">
      <div>+500 séances de coaching animées</div>
      <div>+150 coachs certifiés (sport, bien-être, pro)</div>
      <div>+50 entreprises clientes</div>
      <div>95% de satisfaction des salariés</div>
    </div>
  </section>

  <section class="py-20 bg-gray-50 text-center">
    <h2 class="text-3xl font-bold mb-10">Des Coachings Adaptés à Vos Objectifs</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
      <div class="p-6 bg-white rounded-xl shadow-md">
        <h3 class="text-xl font-semibold mb-2">Coaching Sportif</h3>
        <p>Renforcez la cohésion et la santé de vos équipes avec des séances de sport adaptées en entreprise ou à distance.</p>
      </div>
      <div class="p-6 bg-white rounded-xl shadow-md">
        <h3 class="text-xl font-semibold mb-2">Bien-être & Gestion du Stress</h3>
        <p>Yoga, méditation, sophrologie, ateliers de gestion du stress pour améliorer la qualité de vie au travail.</p>
      </div>
      <div class="p-6 bg-white rounded-xl shadow-md">
        <h3 class="text-xl font-semibold mb-2">Développement Professionnel</h3>
        <p>Coaching leadership, prise de parole, gestion de carrière et développement des soft skills.</p>
      </div>
    </div>
  </section>

  <section class="py-20 bg-white text-center">
    <h2 class="text-3xl font-bold mb-10">Des Créneaux Flexibles pour Tous</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
      <div class="p-6 bg-yellow-100 rounded-xl">
        <h3 class="text-lg font-semibold mb-2">Matin</h3>
        <p>Commencez la journée avec énergie grâce à une séance de coaching adaptée.</p>
      </div>
      <div class="p-6 bg-blue-100 rounded-xl">
        <h3 class="text-lg font-semibold mb-2">Midi</h3>
        <p>Profitez de la pause déjeuner pour booster votre bien-être ou votre performance.</p>
      </div>
      <div class="p-6 bg-purple-100 rounded-xl">
        <h3 class="text-lg font-semibold mb-2">Soirée</h3>
        <p>Détendez-vous après le travail avec des séances de relaxation ou de sport.</p>
      </div>
    </div>
  </section>

  <section class="py-20 bg-gray-50 text-center">
    <h2 class="text-3xl font-bold mb-10">Nos Coachs Experts</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
      <div class="bg-white p-6 rounded-xl shadow-md">
        <img src="https://i.pravatar.cc/100?img=12" class="rounded-full w-20 h-20 mx-auto mb-4" alt="Coach 1">
        <h3 class="font-semibold text-lg">Marc Dubois</h3>
        <p class="text-sm text-gray-500">Coach Sportif & Leadership</p>
        <p class="text-yellow-500">★★★★★</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-md">
        <img src="https://i.pravatar.cc/100?img=45" class="rounded-full w-20 h-20 mx-auto mb-4" alt="Coach 2">
        <h3 class="font-semibold text-lg">Sophie Martin</h3>
        <p class="text-sm text-gray-500">Coach Bien-être & Soft Skills</p>
        <p class="text-yellow-500">★★★★★</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-md">
        <img src="https://i.pravatar.cc/100?img=60" class="rounded-full w-20 h-20 mx-auto mb-4" alt="Coach 3">
        <h3 class="font-semibold text-lg">Thomas Lang</h3>
        <p class="text-sm text-gray-500">Coach Sportif & Gestion du Stress</p>
        <p class="text-yellow-500">★★★★★</p>
      </div>
    </div>
  </section>

  <footer class="bg-blue-700 text-white text-center py-10">
    <h2 class="text-2xl font-bold mb-2">Prêt à booster la performance et le bien-être de vos équipes&nbsp;?</h2>
    <a href="{{ route('login') }}" class="inline-block mt-4 bg-white text-blue-700 px-6 py-3 rounded-full font-bold hover:bg-blue-100">Découvrir CoachPro+</a>
  </footer>
</body>
</html>