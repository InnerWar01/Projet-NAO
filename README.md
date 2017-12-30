Pour une description détaillée voir ABITBOL_BOUNMA_CIOBANU_ProjetPANC.pdf
Dossiers:
	\assets: contient tout ce qui concerne la mise en page et les ressources 
		visuelles. Ce dossier contient les fichiers css, les images et les
		composantes bootstrap

	\google: contient toutes les ressources n�cessaires au bon fonctionnement 
		des blocs issus de blockly. Ceci est un composant open source de Google
		que nous avons r�utilis�.
	
	\training: contient tout ce qui est n�cessaire lors de l'ex�cution des blocs 
		fournis. Plus pr�cis�ment, il contient les pages exercice.php et 
		projets.php, le fichier client.php qui communique avec serveurPython.py
		ou serveurSimple.py (serveurPython si on a le robot, serveurSimple sinon)
		gr�ce � des sockets. Puis les fichiers relatifs au blocs affich�s, c'est
		� dire leur disposition dans la fen�tre, le code renvoy� par chaque bloc.

	\userBD: on y trouve tous les fichiers ayant un lien avec l'utilisateur et la 
		base de donn�es. � savoir, la page d'inscription, de connexion, les
		gestionnaires respectifs, la d�connexion puis la connexion � la base
		de donn�es

	\ : on y trouve les pages g�n�rales( exclues des pages relatives li�es aux 
		exercices) ainsi que les composantes communes � toutes les pages ( header,
		footer, navbar..)

Installation:
	Pour pouvoir ex�cuter le projet en local, il faut t�l�charger python 2.7 ainsi que 
	la composante mysql-connector de python qui permet l'acc�s � la base de donn�es et 
	finalement pouvoir lancer le serveur. 
Si le robot n'est pas � disposition, le serveur � executer est serveurSimple.py qui affichera les actions que le robot aurait d� faire ou le message d�erreur si l�exercice n�est pas effectu� correctement.
	Si le robot est � disposition il faut �galement t�l�charger NAOqi, qui permet de 
	faire communiquer le serveur python avec le robot.
Pour pouvoir visualiser le site, il faut un logiciel permettant de cr�er un serveur local de type wamp. La premi�re page � ouvrir est donc localhost/ProjetNAO/home.php
Il faudra veiller � ce que le mot de passe de connexion � la base de donn�es corresponde bien dans nos fichiers de code ainsi que dans votre base de donn�es locale.
Il vous faudra ensuite cr�er une base de donn�es appel�e �panc� puis importer le fichier panc.sql qui se trouve dans le zip. 
Pour ceci il faut modifier le mot de passe de connexion � la base de donn�es dans les fichiers suivants:
	\userBD\connBDD.php ligne 2
	serverPython ligne 171 - si vous utilisez un robot
		serverSimple ligne 99 - si vous n�utilisez pas de robot

ATTENTION: il est indispensable de lancer un des serveurs python pour que l'application fonctionne, sinon aucune action de l'utilisateur sera prise en compte. Le serveur doit �tre en double-cliquant sur l�ex�cutable (apr�s avoir t�l�charg� la bonne version de python)
		
		
