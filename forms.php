<?php include 'templates/header.php' ?>

<h1>Formulaires</h1>
<p>Un formulaire permet à l'utilisateur d'envoyer des données à PHP. Mais, comme PHP se trouve côté serveur, et que le navigateur n'y a donc pas accès, il est impératif d'envoyer des données à travers une requête HTTP.</p>

<h2>Méthodes HTTP</h2>
<p>Chaque requête contient une destination, c'est-à-dire une adresse qui pointe vers la ressource à laquelle le client souhaite accéder. Mais chaque requête contient également un verbe, que l'on appelle <strong>méthode HTTP</strong>. Il en existe un certain nombre, mais les deux qui vont nous préoccuper lors du développement d'une application monolithique en PHP sont les méthodes GET et POST.</p>
<h3>Méthode GET</h3>
<p>La méthode GET permet de qualifier des requêtes dont l'intention est de récupérer des données (typiquement, une page web). Une requête GET ne peut pas avoir de corps (body), il est donc a priori impossible d'envoyer des données. S'il est nécessaire de préciser certains paramètres afin d'obtenir l'information désirée, alors ces paramètres seront ajoutés à la fin de l'URL (on les appelle alors query parameters). PHP récupère ces paramètres et les range dans le tableau associatif $_GET.</p>
<h3>Méthode POST</h3>
<p>La méthode POST permet de qualifier des requêtes dont l'intention est d'envoyer des données qui ont vocation à transformer l'état de l'application. Les données envoyées, le cas échéant, se trouvent dans le corps (body) de la requête et ne sont donc pas visibles, contrairement aux query parameters. Un autre cas d'usage des requêtes POST, lorsqu'on ne souhaite pas forcément transformer l'état de l'application, consiste donc à transférer des données au serveur de manière plus sécurisée qu'avec une requête GET (par exemple, dans le cas d'une authentification. PHP récupère ces paramètres et les range dans le tableau associatif $_POST.</p>

<h2>Exemples</h2>
<h3>Formulaire de recherche</h3>
<div class="code-container">
<?php 
$code = <<<'PHP'
<?php if (isset($_GET['search'])): ?>
<div class="alert alert-info">Vous avez recherché: <?= $_GET['search'] ?></div>    
<?php endif; ?>
PHP;
highlight_string($code); ?>
</div>
<?php if (isset($_GET['search'])): ?>
<div class="alert alert-info">Vous avez recherché: <?= $_GET['search'] ?></div>    
<?php endif; ?>
<form class="mt-4 mb-4">
    <div class="mb-3">
        <input name="search" class="form-control" type="text" placeholder="Entre vos termes de recherche" />
    </div>
    <button class="btn btn-primary" type="submit">Envoyer</button>
</form>

<h3>Formulaire d'authentification</h3>
<div class="code-container">
<?php 
$code = <<<'PHP'
<?php
// actions/authentication.php
if ($_POST['username'] === 'test' && $_POST['password'] === 'test') {
    echo 'Authentification réussie.';
} else {
    echo 'Authentification échouée.';
}
PHP;
highlight_string($code); ?>
</div>
<form class="mt-4 mb-4" method="post" action="actions/authenticate.php">
    <div class="mb-3">
        <label for="username">Nom d'utilisateur</label>
        <input name="username" class="form-control" type="text" placeholder="Nom d'utilisateur" />
    </div>
    <div class="mb-3">
        <label for="password">Mot de passe</label>
        <input name="password" class="form-control" type="password" placeholder="Mot de passe" />
    </div>
    <button class="btn btn-primary" type="submit">Envoyer</button>
</form>

<?php include 'templates/footer.php' ?>