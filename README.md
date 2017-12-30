Dossiers:
	\assets: contient tout ce qui concerne la mise en page et les ressources 
		visuelles. Ce dossier contient les fichiers css, les images et les
		composantes bootstrap

	\google: contient toutes les ressources nécessaires au bon fonctionnement 
		des blocs issus de blockly. Ceci est un composant open source de Google
		que nous avons réutilisé.
	
	\training: contient tout ce qui est nécessaire lors de l'exécution des blocs 
		fournis. Plus précisément, il contient les pages exercice.php et 
		projets.php, le fichier client.php qui communique avec serveurPython.py
		ou serveurSimple.py (serveurPython si on a le robot, serveurSimple sinon)
		grâce à des sockets. Puis les fichiers relatifs au blocs affichés, c'est
		à dire leur disposition dans la fenêtre, le code renvoyé par chaque bloc.

	\userBD: on y trouve tous les fichiers ayant un lien avec l'utilisateur et la 
		base de données. À savoir, la page d'inscription, de connexion, les
		gestionnaires respectifs, la déconnexion puis la connexion à la base
		de données

	\ : on y trouve les pages générales( exclues des pages relatives liées aux 
		exercices) ainsi que les composantes communes à toutes les pages ( header,
		footer, navbar..)

Installation:
	Pour pouvoir exécuter le projet en local, il faut télécharger python 2.7 ainsi que 
	la composante mysql-connector de python qui permet l'accès à la base de données et 
	finalement pouvoir lancer le serveur. 
Si le robot n'est pas à disposition, le serveur à executer est serveurSimple.py qui affichera les actions que le robot aurait dû faire ou le message d’erreur si l’exercice n’est pas effectué correctement.
	Si le robot est à disposition il faut également télécharger NAOqi, qui permet de 
	faire communiquer le serveur python avec le robot.
Pour pouvoir visualiser le site, il faut un logiciel permettant de créer un serveur local de type wamp. La première page à ouvrir est donc localhost/ProjetNAO/home.php
Il faudra veiller à ce que le mot de passe de connexion à la base de données corresponde bien dans nos fichiers de code ainsi que dans votre base de données locale.
Il vous faudra ensuite créer une base de données appelée ‘panc’ puis importer le fichier panc.sql qui se trouve dans le zip. 
Pour ceci il faut modifier le mot de passe de connexion à la base de données dans les fichiers suivants:
	\userBD\connBDD.php ligne 2
	serverPython ligne 171 - si vous utilisez un robot
		serverSimple ligne 99 - si vous n’utilisez pas de robot

ATTENTION: il est indispensable de lancer un des serveurs python pour que l'application fonctionne, sinon aucune action de l'utilisateur sera prise en compte. Le serveur doit être en double-cliquant sur l’exécutable (après avoir téléchargé la bonne version de python)
		
		
