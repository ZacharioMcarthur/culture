# Culture Béninoise - Application Laravel

## Description

Application web Laravel pour la promotion et la découverte de la culture béninoise. Le système permet aux utilisateurs de découvrir des contenus culturels (plats traditionnels, danses, lieux touristiques, événements) moyennant un paiement, avec un système d'administration complet.

## Fonctionnalités

### Pour les Utilisateurs
- **Authentification sécurisée** avec double facteur (2FA)
- **Découverte de contenus** culturels (plats, danses, lieux, événements)
- **Système de paiement** pour accéder aux contenus complets
- **Commentaires et notation** des contenus
- **Interface responsive** et moderne

### Pour les Administrateurs
- **Dashboard complet** avec statistiques
- **Gestion CRUD** de toutes les tables de la base de données
- **DataTables** pour une navigation facile
- **AdminLTE** pour l'interface d'administration

## Installation

1. **Cloner le repository**
   ```bash
   git clone <repository-url>
   cd cultureBenin
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   npm install
   ```

3. **Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Base de données**
   - Créer une base de données MySQL
   - Modifier le fichier `.env` avec vos paramètres de BD
   - Importer le fichier `culture_database.sql`
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Permissions et liens symboliques**
   ```bash
   php artisan storage:link
   chmod -R 775 storage
   chmod -R 775 bootstrap/cache
   ```

6. **Compiler les assets**
   ```bash
   npm run build
   ```

7. **Démarrer le serveur**
   ```bash
   php artisan serve
   ```

## Utilisation

### Accès Admin
- **URL**: `/admin/dashboard`
- **Email**: `admin@culturebenin.bj`
- **Mot de passe**: `admin123`

### Structure des Tables

Le système gère 10 tables principales :

1. **utilisateurs** - Gestion des utilisateurs avec rôles
2. **roles** - Rôles utilisateur (Admin, Modérateur, Contributeur, Lecteur)
3. **langues** - Langues parlées au Bénin
4. **regions** - Régions géographiques et administratives
5. **contenus** - Contenus culturels (statut: en_attente, valide, bloque)
6. **commentaires** - Commentaires utilisateurs (unique par contenu)
7. **medias** - Fichiers multimédias (images, audio, vidéo, documents)
8. **type_contenus** - Catégories de contenus (Histoire/Conte, Recette, Article culturel)
9. **type_medias** - Types de médias (Image, Audio, Vidéo, Document)
10. **parler** - Relations langues-régions

### Workflow Utilisateur

1. **Inscription/Connexion** obligatoire
2. **Configuration 2FA** recommandée pour la sécurité
3. **Navigation** dans les contenus (aperçu gratuit)
4. **Paiement** pour accéder au contenu complet (5€ par contenu)
5. **Commentaires et notation** possibles après paiement

### Workflow Administrateur

1. **Dashboard** avec statistiques générales
2. **Gestion des utilisateurs** (CRUD complet)
3. **Modération des contenus** (validation, blocage)
4. **Gestion des médias** et métadonnées
5. **Maintenance** des données de référence

## Sécurité

- **Authentification Laravel** standard
- **Double facteur (2FA)** avec Google Authenticator
- **Middleware admin** pour la protection des routes admin
- **Validation des formulaires** côté serveur
- **Protection CSRF** sur tous les formulaires
- **Accès payant** aux contenus sensibles

## Technologies Utilisées

- **Laravel 12** - Framework PHP
- **MySQL** - Base de données
- **AdminLTE 3** - Interface d'administration
- **DataTables** - Tables interactives
- **Bootstrap 4** - Framework CSS
- **Google 2FA** - Authentification double facteur
- **Chart.js** - Graphiques du dashboard

## API Routes

### Routes Publiques
- `GET /` - Page d'accueil
- `GET /contenus/{type}` - Liste des contenus par type (auth requis)
- `GET /contenu/{id}` - Détail d'un contenu (auth + paiement requis)

### Routes Admin
- `GET /admin/dashboard` - Dashboard administrateur
- `GET /admin/{table}` - CRUD pour chaque table

## Développement

### Ajouter une nouvelle table
1. Créer la migration Laravel
2. Créer le modèle Eloquent
3. Ajouter les relations nécessaires
4. Créer le contrôleur CRUD
5. Ajouter les routes
6. Créer les vues avec DataTables
7. Mettre à jour la sidebar admin

### Personnalisation
- Modifier les styles dans `resources/views/layouts/culture.blade.php`
- Personnaliser AdminLTE dans `resources/views/admin/layout.blade.php`
- Adapter les prix dans `ContentController.php`

## Support

Pour toute question ou problème, contacter l'équipe de développement.

## Licence

Ce projet est sous licence MIT.