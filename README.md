<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# CoachPro+ – Plateforme de coaching en entreprise

## Présentation

CoachPro+ est une application web développée dans le cadre d'un projet de **MBA Développeur Full Stack**.

Elle permet de digitaliser la gestion des séances de coaching en entreprise grâce à une plateforme moderne, responsive et sécurisée.

L'objectif est de simplifier les échanges entre les coachs, les salariés et les administrateurs tout en offrant une meilleure organisation des séances.

---

## Fonctionnalités

### Administrateur

* Tableau de bord global
* Gestion des utilisateurs
* Gestion des entreprises
* Gestion des séances
* Consultation des statistiques
* Suivi des inscriptions

### Coach

* Authentification sécurisée
* Tableau de bord personnel
* Création de séances
* Modification des séances
* Suppression des séances
* Consultation des participants
* Calendrier des séances

### Salarié

* Consultation des séances disponibles
* Inscription à une séance
* Historique des participations
* Tableau de bord personnalisé

---

## Technologies utilisées

### Backend

* Laravel 12
* PHP 8
* Laravel Breeze

### Frontend

* Blade
* Tailwind CSS
* Alpine.js
* Vite

### Base de données

* MySQL

### Outils

* Git
* GitHub
* Figma
* Asana

---

## Architecture

```text
CoachPro+

├── Administration
│   ├── Utilisateurs
│   ├── Entreprises
│   ├── Séances
│   └── Statistiques
│
├── Coach
│   ├── Dashboard
│   ├── Mes séances
│   ├── Calendrier
│   └── Profil
│
└── Salarié
    ├── Dashboard
    ├── Séances disponibles
    ├── Historique
    └── Profil
```

---

## Installation

### Cloner le projet

```bash
git clone https://github.com/RebecaMelvyn/coaching-plateform.git
```

### Installer les dépendances

```bash
composer install
```

```bash
npm install
```

### Copier le fichier d'environnement

```bash
cp .env.example .env
```

### Générer la clé Laravel

```bash
php artisan key:generate
```

### Configurer la base de données

Modifier le fichier `.env` :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=coachpro
DB_USERNAME=root
DB_PASSWORD=
```

### Lancer les migrations

```bash
php artisan migrate
```

### Exécuter les seeders

```bash
php artisan db:seed
```

### Compiler les assets

```bash
npm run dev
```

### Lancer le serveur

```bash
php artisan serve
```

---

## Comptes de démonstration

### Administrateur

```
Email : admin@example.com
Mot de passe : password
```

### Coach

```
Email : coach@example.com
Mot de passe : password
```

### Salarié

```
Email : employee1@example.com
Mot de passe : password
```

*(Adapter ces identifiants en fonction des seeders du projet.)*

---

## Captures d'écran

Le projet comprend notamment :

* Page de connexion
* Tableau de bord Administrateur
* Tableau de bord Coach
* Tableau de bord Salarié
* Gestion des séances
* Gestion des utilisateurs
* Calendrier
* Version responsive

---

## Évolutions prévues

* Notifications par e-mail
* Tableau de bord analytique avancé
* API REST
* Application mobile
* Gestion multi-entreprises
* Tableau de bord RH

---

## Auteur

**Melvyn REBECA**

MBA Développeur Full Stack

Projet réalisé dans le cadre du Workshop Client Réel.

---

## Licence

Projet réalisé dans un cadre pédagogique.
