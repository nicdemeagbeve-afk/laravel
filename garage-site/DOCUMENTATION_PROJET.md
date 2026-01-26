# 📋 GARAGE-SITE - DOCUMENTATION COMPLÈTE

## 1. OVERVIEW DU PROJET

- **Nom :** Garage-Site
- **Type :** Système de gestion de garage automobile
- **Framework :** Laravel 12 (PHP 8.2+)
- **Frontend :** Tailwind CSS + Alpine.js + Vite
- **Base de données :** MySQL/PostgreSQL
- **Architecture :** MVC (Model-View-Controller)
- **Statut :** En développement/Production

---

## 2. TECHNOLOGIES UTILISÉES

### Backend
- Laravel 12 - Framework web PHP complet
- PHP 8.2+ - Langage serveur performant
- Eloquent ORM - Gestion orientée objet de la BDD
- Laravel Tinker - Débogage et tests REPL
- Composer - Gestionnaire de dépendances PHP

### Frontend
- Tailwind CSS 3.1 - Framework CSS utilitaire
- Alpine.js 3.4 - Réactivité légère (< 10kb)
- Axios 1.11 - Client HTTP moderne
- Vite 7.0 - Build tool ultra-rapide
- PostCSS 8.4 - Traitement CSS avancé
- Laravel Vite Plugin - Intégration Laravel

### Tests & Qualité
- Pest PHP 3.8 - Framework de test moderne
- MockeryPHP 1.6 - Mocking pour tests
- Laravel Pint - Code formatting PHP
- Laravel Pail - Logs en temps réel
- Laravel Sail - Environnement Docker

### Dépendances
- FakerPHP 1.23 - Données de test
- Nunomaduro Collision - Messages d'erreur améliorés

---

## 3. ARCHITECTURE DE LA BASE DE DONNÉES

### Table: Users (Utilisateurs)
```
id                INT (Clé primaire, Auto-increment)
name              VARCHAR(255) - Nom complet
email             VARCHAR(255) - Email unique
password          VARCHAR(255) - Hash du mot de passe
role              VARCHAR(50) - 'admin' ou 'user'
remember_token    VARCHAR(100) - Token de session
created_at        TIMESTAMP
updated_at        TIMESTAMP
```

### Table: Vehicules
```
id                INT (Clé primaire)
immatriculation   VARCHAR(20) - Unique
marque            VARCHAR(100) - Marque (BMW, Mercedes, etc.)
modele            VARCHAR(100) - Modèle (X5, C-Class, etc.)
couleur           VARCHAR(50)
annee             INT - Année de fabrication
kilometrage       INT - Km parcourus
carrosserie       VARCHAR(50) - SUV, Berline, Coupé, etc.
energie           VARCHAR(50) - Essence, Diesel, Électrique, etc.
boite             VARCHAR(50) - Manuelle, Automatique
photo             VARCHAR(255) - URL de la photo
created_at        TIMESTAMP
updated_at        TIMESTAMP
```

### Table: Techniciens
```
id                INT (Clé primaire)
nom               VARCHAR(100)
prenom            VARCHAR(100)
specialite        VARCHAR(100) - Domaine de compétence
photo             VARCHAR(255) - Photo de profil
created_at        TIMESTAMP
updated_at        TIMESTAMP
```

### Table: Reparations
```
id                INT (Clé primaire)
vehicule_id       INT - Clé étrangère (Vehicules)
technicien_id     INT - Clé étrangère (Techniciens)
description       TEXT - Description du travail
prix              DECIMAL(10,2) - Prix en F CFA
date_debut        DATE - Date de commencement
date_fin          DATE - Date de fin (NULL si en cours)
created_at        TIMESTAMP
updated_at        TIMESTAMP
```

### Table: Clients
```
id                INT (Clé primaire)
nom               VARCHAR(100)
prenom            VARCHAR(100)
email             VARCHAR(255)
telephone         VARCHAR(20)
adresse           TEXT
created_at        TIMESTAMP
updated_at        TIMESTAMP
```

---

## 4. RELATIONS ENTRE LES DONNÉES

```
┌─────────────────────────────────────────────────┐
│                  Modèle de Données              │
└─────────────────────────────────────────────────┘

Vehicule (1) ──────< Reparation >──── (1) Technicien
    │                    │
    │ (1:N)              │ (M:1)
    │                    │
    └──────── Relation 1:N ────────┘

User (1) ────── Rôle ────── (N) Permissions
     │                            │
     │ admin/user      dashboard,│ modules
     │                            │
     └──────── Accès Conditionnel┘
```

---

## 5. FONCTIONNALITÉS DU SYSTÈME

### A. Authentification & Autorisation
✅ Inscription avec validation email
✅ Connexion sécurisée (Remember me)
✅ Déconnexion
✅ Système de rôles (Admin / Utilisateur standard)
✅ Protection CSRF intégrée
✅ Middleware d'authentification

### B. Gestion des Véhicules
✅ **CRUD complet** (Create, Read, Update, Delete)
✅ Fiche détaillée avec 10 champs
✅ Stockage de photos (JPG, PNG)
✅ Recherche et filtrage
✅ Historique des réparations par véhicule
✅ Statut et suivi

### C. Gestion des Techniciens
✅ **CRUD complet**
✅ Profil détaillé (nom, prénom, spécialité)
✅ Photo de profil
✅ Historique des réparations assignées
✅ Gestion des spécialités (Mécanique, Électrique, etc.)

### D. Gestion des Réparations
✅ Création de réparations
✅ Assignation à un technicien
✅ Lien avec un véhicule
✅ Description détaillée du travail
✅ Tarification (prix en F CFA)
✅ Suivi des dates (début/fin)
✅ Statut automatique (En cours / Terminée)
✅ Modification et suppression

### E. Gestion des Clients
✅ **CRUD complet**
✅ Informations de contact
✅ Historique des véhicules et réparations
✅ Email et téléphone

### F. Dashboard
✅ Vue d'ensemble des opérations
✅ Accès centralisé aux modules
✅ Statistiques rapides
✅ Navigation intuitive

### G. Pages Publiques
✅ Accueil (Home) - Présentation
✅ Fonctionnalités (Features)
✅ Tarification (Pricing)
✅ Sécurité (Security)
✅ Documentation
✅ FAQ - Questions fréquentes
✅ Contact - Formulaire de contact
✅ Politique de confidentialité
✅ Conditions d'utilisation
✅ Mentions légales

---

## 6. ARCHITECTURE DES ROUTES

### Routes Publiques (Sans authentification)
```
GET    /                     → Page d'accueil
GET    /features             → Fonctionnalités
GET    /pricing              → Tarification
GET    /security             → Sécurité
GET    /documentation        → Documentation
GET    /contact              → Formulaire de contact
GET    /faq                  → Questions fréquentes
GET    /privacy              → Politique de confidentialité
GET    /terms                → Conditions d'utilisation
GET    /legal                → Mentions légales

GET    /login                → Formulaire de connexion
POST   /login                → Traitement de la connexion
GET    /register             → Formulaire d'inscription
POST   /register             → Traitement de l'inscription
```

### Routes Protégées (Authentification requise)
```
POST   /logout               → Déconnexion

GET    /dashboard            → Dashboard principal
GET    /dashboard            → Vue d'ensemble (DashboardController)

GET    /vehicules            → Liste des véhicules
GET    /vehicules/create     → Formulaire création
POST   /vehicules            → Enregistrement
GET    /vehicules/{id}       → Détail
GET    /vehicules/{id}/edit  → Édition
PUT    /vehicules/{id}       → Mise à jour
DELETE /vehicules/{id}       → Suppression

GET    /techniciens          → Liste des techniciens
GET    /techniciens/create   → Formulaire création
POST   /techniciens          → Enregistrement
GET    /techniciens/{id}     → Détail
GET    /techniciens/{id}/edit → Édition
PUT    /techniciens/{id}     → Mise à jour
DELETE /techniciens/{id}     → Suppression

GET    /reparations          → Liste des réparations
GET    /reparations/create   → Formulaire création
POST   /reparations          → Enregistrement
GET    /reparations/{id}     → Détail
GET    /reparations/{id}/edit → Édition
PUT    /reparations/{id}     → Mise à jour
DELETE /reparations/{id}     → Suppression

GET    /clients              → Liste des clients
GET    /clients/create       → Formulaire création
POST   /clients              → Enregistrement
GET    /clients/{id}         → Détail
GET    /clients/{id}/edit    → Édition
PUT    /clients/{id}         → Mise à jour
DELETE /clients/{id}         → Suppression
```

### Routes Administrateur (Admin uniquement)
```
GET    /users                → Gestion des utilisateurs
GET    /users/create         → Créer un utilisateur
POST   /users                → Enregistrer
GET    /users/{id}           → Détails
GET    /users/{id}/edit      → Éditer
PUT    /users/{id}           → Mettre à jour
DELETE /users/{id}           → Supprimer
```

---

## 7. STRUCTURE DU PROJET

```
garage-site/
├── app/
│   ├── Http/
│   │   ├── Controllers/         ← Logique métier
│   │   │   ├── HomeController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── VehiculeController.php
│   │   │   ├── TechnicienController.php
│   │   │   ├── ReparationController.php
│   │   │   ├── ClientController.php
│   │   │   ├── UserController.php
│   │   │   └── ContactController.php
│   │   ├── Middleware/          ← Middlewares
│   │   │   └── IsAdmin.php
│   │   ├── Requests/            ← Validation
│   │   └── kernel.php
│   ├── Models/                  ← Modèles ORM
│   │   ├── User.php
│   │   ├── Vehicule.php
│   │   ├── Reparation.php
│   │   ├── Technicien.php
│   │   └── Client.php
│   ├── Providers/               ← Service providers
│   │   └── AppServiceProvider.php
│   └── View/Components/         ← Composants Blade
├── routes/
│   ├── web.php                  ← Routes web principales
│   └── console.php
├── resources/
│   ├── css/
│   │   └── app.css              ← Styles Tailwind
│   ├── js/
│   │   ├── app.js
│   │   └── bootstrap.js
│   └── views/                   ← Templates Blade
│       ├── layouts/
│       │   └── app.blade.php
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── dashboard/
│       │   └── dashboard.blade.php
│       ├── vehicules/
│       ├── techniciens/
│       ├── reparations/
│       │   └── show.blade.php
│       ├── clients/
│       ├── pages/
│       └── components/
├── database/
│   ├── migrations/              ← Schéma DB
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 2026_01_15_190120_create_vehicules_table.php
│   │   ├── 2026_01_15_191754_create_techniciens_table.php
│   │   ├── 2026_01_15_191919_create_reparations_table.php
│   │   ├── 2026_01_19_094636_create_clients_table.php
│   │   └── 2026_01_20_*_add_photo_*.php
│   ├── seeders/                 ← Données initiales
│   │   └── DatabaseSeeder.php
│   └── factories/               ← Factories de test
│       └── UserFactory.php
├── public/
│   ├── index.php
│   ├── images/                  ← Images statiques
│   ├── storage/                 ← Lien vers storage
│   └── build/
│       ├── manifest.json
│       └── assets/              ← Assets compilés
├── storage/
│   ├── app/                     ← Fichiers uploadés
│   ├── framework/
│   └── logs/
├── tests/
│   ├── Feature/
│   ├── Unit/
│   ├── TestCase.php
│   └── Pest.php
├── config/
│   ├── app.php
│   ├── database.php
│   ├── auth.php
│   ├── cache.php
│   └── ... (autres configurations)
├── bootstrap/
│   ├── app.php
│   └── providers.php
├── composer.json               ← Dépendances PHP
├── package.json                ← Dépendances Node.js
├── vite.config.js              ← Configuration Vite
├── tailwind.config.js          ← Configuration Tailwind
├── postcss.config.js           ← Configuration PostCSS
├── phpunit.xml                 ← Configuration tests
└── README.md
```

---

## 8. SÉCURITÉ

### Implémentations de sécurité
✅ **Authentification Laravel native** - Système éprouvé
✅ **Protection CSRF** - Jetons anti-forgery
✅ **Hachage des mots de passe** - Bcrypt
✅ **Middleware d'autorisation** - Rôles et permissions
✅ **Sessions sécurisées** - HttpOnly cookies
✅ **Validation des entrées** - Côté serveur
✅ **Rate limiting** - Protection brute-force
✅ **Secrets d'environnement** - .env

### Bonnes pratiques appliquées
- Pas de données sensibles en frontend
- Validation bidirectionnelle
- Logs d'activité
- Protection des uploads de fichiers
- SQL injection: Protégé par Eloquent ORM

---

## 9. INSTALLATION & DÉMARRAGE

### Prérequis
- PHP 8.2 ou supérieur
- Composer
- Node.js & npm
- MySQL/PostgreSQL
- Git

### Installation
```bash
# 1. Cloner le projet
git clone <repo-url>
cd garage-site

# 2. Installer les dépendances PHP
composer install

# 3. Installer les dépendances Node.js
npm install

# 4. Créer le fichier .env
cp .env.example .env

# 5. Générer la clé d'application
php artisan key:generate

# 6. Configurer la base de données dans .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=garage_db
# DB_USERNAME=root
# DB_PASSWORD=

# 7. Migrer la base de données
php artisan migrate

# 8. Compiler les assets
npm run build
```

### Démarrage en développement
```bash
# Terminal 1: Serveur Laravel
php artisan serve

# Terminal 2: Compilation assets
npm run dev

# Accéder à http://localhost:8000
```

### Démarrage avec Docker (Sail)
```bash
# Lancer les conteneurs
./vendor/bin/sail up

# En arrière-plan
./vendor/bin/sail up -d

# Accéder à http://localhost
```

---

## 10. COMMANDES UTILES

### Développement
```bash
php artisan serve              # Lancer le serveur (localhost:8000)
npm run dev                    # Compiler assets avec Vite
php artisan tinker            # REPL pour la base de données
php artisan migrate           # Exécuter les migrations
php artisan db:seed           # Seeder les données
```

### Production
```bash
npm run build                 # Minifier les assets
php artisan migrate --force   # Migrer en production
php artisan config:cache      # Cache la configuration
php artisan route:cache       # Cache les routes
php artisan view:cache        # Comprime les vues
```

### Tests
```bash
php artisan test              # Lancer les tests Pest
pest                          # Lancer les tests (alternatif)
php artisan test --coverage   # Tests avec coverage
```

### Maintenance
```bash
php artisan cache:clear       # Vider le cache
php artisan route:clear       # Recréer les routes
php artisan view:clear        # Recréer les vues
php artisan config:clear      # Recréer la config
php artisan storage:link      # Créer lien storage
```

---

## 11. PERFORMANCE & OPTIMISATIONS

### Mises en cache
- Configuration en cache
- Routes en cache
- Vues compilées
- Assets minifiés par Vite

### Optimisations
- Lazy loading des relations Eloquent
- Requêtes optimisées (N+1 query prevention)
- Compression CSS/JS
- Images optimisées
- CDN-ready

---

## 12. CAS D'USAGE DU SYSTÈME

### Pour les petits garages
- Gestion simplifiée des véhicules
- Suivi des réparations
- Historique client

### Pour les chaînes de garages
- Gestion multi-sites (extensible)
- Allocation des techniciens
- Reporting détaillé

### Pour les ateliers de réparation
- Planification des tâches
- Gestion des coûts
- Suivi des clients

---

## 13. FUTURES AMÉLIORATIONS POSSIBLES

### Court terme
📧 Notifications par email et SMS
📄 Génération de devis en PDF
📅 Calendrier des rendez-vous
🔔 Système d'alertes

### Moyen terme
📦 Gestion des stocks de pièces
📊 Rapports et statistiques avancées
💳 Intégration paiement en ligne
🗂️ Archivage automatique

### Long terme
🤖 Prédiction de maintenance
📱 Application mobile
🌍 Multi-langue / multi-devise
☁️ Synchronisation cloud

---

## 14. SUPPORT & DOCUMENTATION

### Ressources
- [Documentation Laravel](https://laravel.com/docs)
- [Tailwind CSS Docs](https://tailwindcss.com)
- [Alpine.js Docs](https://alpinejs.dev)
- [Pest PHP Docs](https://pestphp.com)

### Support
- Code source sur GitHub
- Wiki du projet
- Documentation intégrée

---

## 15. INFORMATIONS COMPLÉMENTAIRES

### Versions
- Laravel: 12.x
- PHP: 8.2+
- Node.js: 18+
- Tailwind CSS: 3.1
- Vite: 7.0

### Licence
MIT License - Code source libre

### Auteur(s)
Projet développé par votre équipe

### Date de création
Janvier 2026

---

**Document généré le:** 23 Janvier 2026
**Version:** 1.0
**Status:** Documentation Complète
