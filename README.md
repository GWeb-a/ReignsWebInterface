# ReignsWebInterface
Interface Web interagissant avec l'API Reigns développée pour le projet Ac'Lab.

# Prérequis
Posséder un environnement apache, mysql et php. (une plateforme de développement web comme WAMP suffit)

# Installation
Récuperation du dépot git :
    
    git clone https://github.com/GWeb-a/ReignsWebInterface.git

Récupération de la base de données

Créer une base de données nommée "reigns" et importer le dump sql suivant :
    
    DROP TABLE IF EXISTS `user`;
    
    CREATE TABLE IF NOT EXISTS `user` (
       `id` int(11) NOT NULL AUTO_INCREMENT,
       `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
       `roles` json NOT NULL,
       `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
       PRIMARY KEY (`id`),
       UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

    INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES (
       2, 'admin@test.com', '[\"ROLE_ADMIN\"]',
       '$argon2i$v=19$m=65536,t=4,p=1$VjhqanAuOFNIbWtuRnkzVQ$UurJBdCIs0+5VNsG2eBND8hUUU6JKvaCph1Ashs70Is');

# Lancement
Se placer dans le dossier ReignsWebInterface.

Lancer la commande suivante :

    php bin/console server:run

# Tester l'application
Ouvrir un navigateur et renseigner l'adresse suivante (avec le port 8000) :
http://127.0.0.1:8000

## Identifiants de connexion

**Pseudo :** admin@test.com

**Mot de passe :** admin
