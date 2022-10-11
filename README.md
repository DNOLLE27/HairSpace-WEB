# <p align="center">HairSpace-WEB</p>

<p align="center">Site web pour le salon de coiffure de M. Hair nommé SpaceHair à Paris.</p>

<p align="center"><img width="250" height="200" src="https://zupimages.net/up/22/41/2vk2.png"></p>

## <p align="center">Prérequis :</p>

<p align="center">Dans un premier temps, il faut installer Composer et Symfony sur l'ordinateur/serveur qui va accueillir le projet.</p>

- Installation de Composer :

Il faut télécharger et lancer l'installateur via le site de [Composer](https://getcomposer.org/download/) et suivre les étapes d'installation.
<br/><br/>
- Installation de Symfony :

Pour installer Synfony, il faut dans un premier temps installer SCOOP sur PowerShell (Windows) :
```
Set-ExecutionPolicy RemoteSigned -Scope CurrentUser # Optional: Needed to run a remote script the first time
irm get.scoop.sh | iex
```

Puis installer Symfony via SCOOP sur PowerShell :
```
scoop install symfony-cli
```

</br>

<p align="center">Une fois les prérequis installés, il faut venir installer le projet sur le serveur Web :</p>

**<center><u>ATTENTION :</u> Le serveur web dois contenir la version PHP 8.1.0 ou plus !</center>**

<br/>Il faut venir télécharger le projet de la branche "[master](https://github.com/DNOLLE27/HairSpace-WEB/tree/master)" et venir l'extraire dans le serveur web. Après cela, il faut utiliser un editeur de code type [Visual Studio Code](https://code.visualstudio.com/download) et ouvrir le dossier du projet dans celui-ci (Fichier > Ouvrir le dossier).

<br/>

Une fois le dossier du projet ouvert dans l'éditeur de code, il faut installer tout les prérequis nécessaire au projet en ouvrant un terminal (dans Visual Studio : Terminal > Nouveau Terminal) et en tappant la commande suivante :
```
composer install
```

Si des erreurs sont car de nouvelles versions sont disponnibles pour les prérequis du projet :
```
composer update
```

</br>

<p align="center">Enfin, il faut venir installer la base de donnée dans MySQL :</p>

Il faut venir créer dans MySQL, une base de données qui se nommera "bdd_hairspace" :
<p align="left"><img width="700" height="400" src="https://zupimages.net/up/22/41/y61l.png"></p>

<br/>

Dans le terminal de l'éditeur de code, il faut saisir la commande suivant pour importer la structure de la base de données :
```
php bin/console doctrine:migrations:migrate
```

<br/>

Une fois que toutes les étapes précédentes ont été réalisé, il ne manque plus qu'à lancer le serveur Symfony avec la commande suivante :
```
symfony serve:start
```
## <p align="center">Auteurs :</p>
<p align="center">NOLLE Damien - Chef de projet et développeur.</p>
<p align="center">ZABETH Romain - Développeur.</p>

<br/>

*<p align="center">Nous sommes tous les trois des étudiant en BTS SIO (SLAM) à l'établissement Saint-Adjutor, à Vernon.</p>*

<p align="center"><img width="350" height="100" src="https://www.stadjutor.com/wp-content/uploads/2021/01/logo-stadjutor.png"></p>

<br/>

<p align="center">M. Tiffen HAIR - Directeur du salon de coiffure (Hair Space).</p>

*<p align="center">Qui nous a commandé le projet et permit sa réalisation.</p>*
<br/>
***<p align="center">TOUT LES DROITS DU PROJET REVIENNENT À HAIRSPACE Inc. !</p>***

## <p align="center">Déploiement :</p>

<p align="center">Il suffit de déployer le projet sur un serveur Web contenant MySQL ainsi que PHP en version 8.1.0. Pour le dévellopement en local, nous avons utilisé WAMP Server.</p>

<p align="center"><img width="150" height="150" src="https://upload.wikimedia.org/wikipedia/commons/f/f8/WampServer-logo.png"></p>

*<p align="center">Logo de WAMP Server.</p>*