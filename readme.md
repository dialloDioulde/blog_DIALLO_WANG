<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>
<div>Projet réalisé entièrement par DIALLO Mamadou & WANG Biyun </div>

<div>
    Ce projet s'inscrit dans le cadre de notre master 1 Informatique à l'Université Grenoble Alpes. Dans ce projet nous avons utilisés de l'Ajax, du Bootstrap  en plus de Laravel.
</div>

### Installation
1. Allez dans la terminale, utilisez la commande ci-dessous dans un bon répertoire  
**git clone https://github.com/dialloDioulde/blog_DIALLO_WANG.git**
2. Trouvez le fichier **.env**, modifiez **DB_DATABASE** en votre propre chemin  
exemple: DB_DATABASE=/Users/Biyun/M1_WIC/S2/Projet/laravel/blog_DIALLO_WANG/database/database.sqlite
3. Allez dans le répertoire blog_DIALLO_WANG et tapez la commande dans la terminale  
**php artisan serve**
4. Copiez le lien sorti dans votre navigateur
5. Vous allez voir notre blog laravel

### Fonctionnalité

**3 - Identification / Authentification qui protège l'accès à l’administration**  
Pour tester:  
mail: admin@admin.fr  
mot de pass: password  
Et vous auriez l'accès à l'administration du blog.
Il vous permet de regarder la liste des utilisateurs, voir ou modifier le profil, se déconnecter en cliquant le menu nommé **admin** en haut à droite.

**2 - CRUD des articles**  
Cliquez sur le menu **Admin-Articles** en haut, vous allez voir tous les articles,  
et vous avez le droit de les modifier ou les supprimer en cliquant EDITER ou SUPPRIMER.  
Vous pouvez aussi ajouter un nouveau post en cliquant AJOUTER UN POST en haut à droite.

**1 - Gestion des commentaires**  
Cliquez sur le menu **Home** en haut, vous allez voir les articles publiés.  
Les noms d'articles vous redirecte à la page de cet article, vous allez voir les commendaires  
sur cet article et vous pouvez aussi créer votre commentaire pour cet article.  
Si vous avez déjà créé un commentaire, vous avez la possibilité de le modifier ou le supprimer.  

**4 - Ajout de rôles utilisateurs**
Pour tester:  
mail: user@user.fr  
mot de pass: password  
1. Vous devez d'abord créer un compte dans https://mailtrap.io .
2. Accéder dans votre compte du mailtrap, cliquez sur "Demo Inbox", dans le champ "SMTP Settings",  
choisissez **Laravel** pour Integrations.
3. Copiez **MAIL_USERNAME** et **MAIL_PASSWORD** dans le fichier **.env** 
4. Trouvez le fichier "blog_DIALLO_WANG/app/Http/Controllers/ContactController.php", et modifiez 
"Mail::to('syviass@outlook.com')->send(new ContactMail($contact));" au votre mail (compte du mailtrap).
5. Se connecter par le compte du test.
**Cet étape est pour vérifier l'adresse mail**
Il vous permet de voir ou modifier le profil, se déconnecter en cliquant le menu nommé **user** en haut à droite.  
Cliquez sur le menu **Home** en haut, vous allez voir les articles publiés.  
Vous pouvez regarder les articles publiés en cliquant les noms d'articles ou créer un poste en cliquant **Créer un post**.

**5 - Ajout de fichiers média pour les articles**  
Vous pouvez ajouter un image pour votre post quand vous créez ou modifiez un poste.

**6 - Identification avec Google, Facebook et Github en utilisant Socialite**
Vous pouvez tester les identifications par Google, Facebook et Github en utilisant vos propres Id App et Clé secret. 
Il faut juste aller dans App/config/service.php pour remplacer nos identifiants par les vôtre. Et il faut également dans App/config/app.php pour ajouter les references socialite pour pouvoir faire fonctionner ces identifications. 
Voici un lien qui pourra vous guider dans l'obtention de votre identifiant Google. 
https://appdividend.com/2018/04/11/laravel-google-login-tutorial/
Pour les deux restantes, la procédure est similaire à peu près. 

Si vous n'utilisez pas notre dossier Vendor il faudra commenter la ligne suivante :
throw new InvalidStateException;

Dans la function user() du fichier :

Vendor/Laravel/Socialite/Src/Two/AbstractProvider.php

Pour que l'identification marche. 


## Difficulté
Nous avons utilisé Ajax avant, mais on a eu problème quand on veux ajouter un image pour un article, donc on reviens le bootstrap.
