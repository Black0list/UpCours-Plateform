# E-learning Application with Laravel & MySQL

Ce projet est une plateforme d’apprentissage en ligne qui permet aux utilisateurs de s’inscrire à des cours, de regarder des vidéos de formation, de compléter des quiz et d’obtenir des certificats. Elle offre une interface conviviale à la fois pour les étudiants et les instructeurs, permettant la création de cours, la gestion de contenu et le suivi de la progression.
## Prérequis

- PHP >= 8.0
- Composer
- Laravel 9
- MySQL / PostgreSQL
- Node.js & npm

## Installation

### 1. Cloner le projet
```bash
git clone https://github.com/Black0list/UpCours-Plateform.git
cd UpCours-Plateform
```

### 2. Installer les dépendances
Installez les dépendances pour Laravel via Composer et les dépendances frontend via npm :
```bash
composer install
npm install && npm run dev
```

### 3. Configurer l'environnement
Copiez le fichier `.env.example` et renommez-le `.env` :
```bash
cp .env.example .env
```

Modifiez le fichier `.env` pour configurer la base de données MySQL :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_la_base
DB_USERNAME=nom_utilisateur
DB_PASSWORD=mot_de_passe
```

Générez une clé d'application Laravel :
```bash
php artisan key:generate
```

### 4. Exécuter les migrations
Créez les tables nécessaires dans la base de données :
```bash
php artisan migrate --seed
```

### 5. Lancer le serveur de développement
Démarrez le serveur local :
```bash
php artisan serve
```

L'application sera accessible à cette adresse : `http://localhost:8000`.

## Fonctionnalités

### 1. Authentification par Sessions
- Inscription & connexion sécurisées avec gestion des sessions.
- Middleware pour gérer l'accès aux fonctionnalités protégées.

### 2. Gestion des Données
- Interaction facile avec la base de données via Eloquent ORM.
- Création, lecture, mise à jour et suppression des enregistrements.

### 3. Génération de PDF avec DomPDF
- Génération dynamique de documents PDF intégrée.

### 4. Gestion des E-mails
- Envoi d'e-mails via Symfony Mailer.
- Personnalisation des modèles d'e-mail.



## 👨‍💻 Auteur

Ce projet a été développé par **HADOUI ABDELKEBIR**.  
N'hésitez pas à me suivre sur GitHub et à contribuer à ce projet ! 🚀

📧 Contact : contact.abdelkebir@gmail.com
🔗 GitHub : [Blacklist](https://github.com/Black0list)
