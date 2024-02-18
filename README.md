﻿# garage-v-parrot-tshauke
Déployer une application en local avec WampServer

Pour configurer une base de données MySQL et déployer son application en local avec WampServer :

Étape 1 : Téléchargement et installation de WampServer Téléchargez la dernière version de WampServer depuis le site officiel : Télécharger WampServer. Lancez le programme d'installation de WampServer et suivez les instructions pour installer le logiciel sur votre système.

Étape 2 : Démarrage de WampServer Après l'installation, recherchez l'icône de WampServer dans votre barre des tâches ou sur votre bureau. Cliquez avec le bouton gauche de la souris sur l'icône de WampServer et sélectionnez "Démarrer tous les services" pour lancer les services Apache et MySQL. L'icône deviendra verte une fois que les services seront démarrés.

Étape 3 : Accès à phpMyAdmin Ouvrez votre navigateur web et entrez l'URL suivante dans la barre d'adresse : http://localhost/phpmyadmin/. Cela vous amènera à l'interface de phpMyAdmin, qui est un outil de gestion de base de données web. Vous devriez voir une page de connexion. Par défaut, le nom d'utilisateur est "root" et il n'y a pas de mot de passe. Laissez le champ du mot de passe vide et appuyez sur Entrée pour vous connecter.

Étape 4 : Importation de script de la base de données sur phpMyAdmin Une fois connecté à phpMyAdmin, vous pouvez importer le script de la base de données. Voici une description détaillée pour configurer une base de données MySQL en local avec WampServer.

Étape 5 : Déplacer le dossier du projet vers la racine La racine de votre serveur local WampServer se trouve dans l’emplacement où vous avez installé WampServer. Généralement c’est dans le Disque local (C) puis dans le dossier wamp64 puis dans le dossier www. C’est dans ce dernier dossier que vous allez coller le dossier du projet.

Étape 6 : Tester l’application en local Après avoir démarrer votre serveur local WampServer par exemple, rassurez-vous que tous les services soient lancés et que l’icône de WampServer sur la barre des tâches est en vert.
Pour tester l’application en local, à partir de votre navigateur web : sur la barre d’adresse de votre navigateur coller l'un des deux liens suivants : 
http://localhost/garage-v-parrot-tshauke-main/index.php  
Où 
http://127.0.0.1/garage-v-parrot-tshauke-main/index.php 
