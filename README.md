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

<p align="center"><img width="120" height="120" src="https://upload.wikimedia.org/wikipedia/commons/f/f8/WampServer-logo.png"></p>

*<p align="center">Logo de WAMP Server.</p>*

## <p align="center">Fonctionnalités :</p>

- Système d'authentification avec couple identifiant/mot de passe et des droits (Admin/Utilisateur). Si il n'y a pas de compte administrateur dans la base de données, le premier compte que l'on pourra inscrire sera un compte admin, sinon se serra un compte utilisateur.

- Une page des prestations où l'adminsitrateur pourra ajouter, supprimer ou modifier les prestations qui est proposé dans le salon de coiffure HairSpace.

- Une page de présentation qui donne des informations sur le salon de coiffure et que l'administrateur peut modifier.

- Une page de contact qui permet à l'utilisateur de saisir ses informations personnelles (prénom, nom, adresse e-mail et numéro de téléphone) et un message qui sera enregistrer dans la base de données.

- Une page d'avis ou les personnes ayant un compte et qui sont connectés peuvent laisser un commentaire sinon l'utilisateur sera invité à créer un compte. L'administrateur peut supprimer un ou plusieurs commentaires qui sont enregistrés en base de données.

- Une page d'accueil classique qui donne quelques informations sur le salon et qui explique comment naviguer sur le site Web.

## <p align="center">Technologies :</p>

<center><table>
    <tr>
        <td><center><a href="https://symfony.com/">Symfony</a></center></td>
        <td><center><a href="https://twig.symfony.com/">Twig</a></center></td>
        <td><center><a href="https://www.mysql.com/fr/">MySQL</a></center></td>
        <td><center><a href="https://www.php.net/">PHP</a></center></td>
        <td><center><a href="https://fr.wikipedia.org/wiki/Hypertext_Markup_Language">HTML</a></center></td>
        <td><center><a href="https://fr.wikipedia.org/wiki/Feuilles_de_style_en_cascade">CSS</a></center></td>
    </tr>
    <tr>
        <td><p align="center"><img width="120" height="110" src="https://github.com/symfony.png"></p></td>
        <td><p align="center"><img width="90" height="120" src="https://camo.githubusercontent.com/a601d4e360b1d58e2abc0d68901a2fbabfa6708452b5f14eceaf18deb5665e6b/68747470733a2f2f7777772e64727570616c2e6f72672f66696c65732f7374796c65732f677269642d332f7075626c69632f70726f6a6563742d696d616765732f747769675f312e706e673f69746f6b3d4e46563764624531"></p></td>
        <td><p align="center"><img width="180" height="110" src="https://upload.wikimedia.org/wikipedia/fr/thumb/6/62/MySQL.svg/1200px-MySQL.svg.png"></p></td>
        <td><p align="center"><img width="180" height="100" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1200px-PHP-logo.svg.png"></p></td>
        <td><p align="center"><img width="120" height="120" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/langfr-1024px-HTML5_logo_and_wordmark.svg.png"></p></td>
        <td><p align="center"><img width="90" height="120" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/langfr-800px-CSS3_logo_and_wordmark.svg.png"></p></td>
    </tr>
</table></center>

## <p align="center">Merci !</p>

***Merci beaucoup à M. Tiffen HAIR de nous avoir fait confiance tout au long du projet et merci à l'établissement Saint-Adjutor de nous avoir enseigné tout ce qui a permis la réalisation de celui-ci !***
<br/><br/>
**<p align="right">Version de HairSpace-WEB :** 1.0</p>