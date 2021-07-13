<?php $age = 15 ?>
<?php $shoppingList = ['Bananes', 'Cerises', 'Frites', 'Chocolat', 'Papier toilette'] ?>

<?php $pageName = 'Structures de contrôle' ?>
<?php include 'templates/header.php' ?>

<h1>Les structures de contrôle</h1>
<p>Les structures de contrôle permettent de contrôler la manière dont le code s'exécute.</p>

<h2 class="mt-4">Conditions</h2>
<p>Les conditions permettent de faire une sorte qu'une portion de code ne s'exécute que dans certaines situations.</p>
<div class="code-container">
<?php 
$code = <<<'PHP'
<?php
if (condition) {
    // Code à exécuter si la condition est vraie
} else {
    // Code à exécuter si la condition est fausse
}
PHP;
highlight_string($code); ?>
</div>

<p>En PHP, il est également possible de soumettre des blocs entiers de code HTML à une condition.</p>
<div class="code-container">
<?php
$code = <<<'PHP'
<?php if (condition): ?>
    <p>Ce paragraphe s'affichera uniquement si la condition est vraie</p>
<?php else: ?>
    <p>Ce paragraphe s'affichera uniquement si la condition est fausse</p>
<?php endif; ?>
PHP;
highlight_string($code); ?>
</div>

<h3>Exemple</h3>
<div class="alert alert-info">Aprés avoir défini <code>$age = <?php echo $age ?></code> :</div>

<h4>
    Affiche l'âge fourni
</h4>
<div class="code-container">
<?php 
$code = <<<'PHP'
<?php
<p>Vous avez <?php echo $age ?> ans.</p>
PHP;
highlight_string($code); ?>
</div>
<p>Vous avez <?php echo $age ?> ans.</p>

<h4>
    Affiche un message déterminant si l'âge fourni correspond à une personne majeure ou mineure
</h4>

<div class="code-container">
<?php 
$code = <<<'PHP'
<?php
<p>
    Vous êtes
    <?php
        if ($age >= 18) {
            echo 'majeur';
        } else {
            echo 'mineur';
        }
    ?>.
</p>
PHP;
highlight_string($code); ?>
</div>

<p>Vous êtes
    <?php
        // Écrit "majeur" si l'âge est supérieur ou égal à 18, sinon écrit "mineur"
        if ($age >= 18) {
            echo 'majeur';
        } else {
            echo 'mineur';
        }
    ?>.</p>

<h4>Affiche un formulaire d'autorisation parentale pour les personnes mineures</h4>
<div class="code-container">
<?php 
$code = <<<'PHP'
<?php if ($age < 18): ?>
    <form class="card">
        <div class="card-body">
            <div>Avez-vous l'autorisation de vos parents?</div>
            <div class="d-flex">
                <button class="btn btn-primary">Oui</button>
                <button class="btn btn-secondary">Non</button>
            </div>
        </div>
    </form>
<?php else: ?>
    <div>Vous n'avez pas besoin d'une autorisation parentale!</div>
<?php endif; ?>
PHP;
highlight_string($code); ?>
</div>

<?php if ($age < 18): ?>
<!-- Ce formulaire s'affichera uniquement si l'âge est strictement inférieur à 18 -->
<form class="card">
    <div class="card-body">
        <div>Avez-vous l'autorisation de vos parents?</div>
        <div class="d-flex">
            <button class="btn btn-primary">Oui</button>
            <button class="btn btn-secondary">Non</button>
        </div>
    </div>
</form>
<?php else: ?>
<div>Vous n'avez pas besoin d'une autorisation parentale!</div>
<?php endif; ?>

<h2 class="mt-4">Boucles</h2>
<p>Les boucles permettant de répéter une suite d'actions plusieurs fois. Comme pour les conditions, il est possible d'utiliser une syntaxe permettant d'englober toute une portion de code HTML dans le fonctionne/ent d'une boucle.</p>

<h3>La commande <code>for</code></h3>
<p>La commande <code>for</code> permet de créer une boucle comprenant un itérateur, c'est-à-dire un nombre variant d'une valeur de départ à une valeur d'arrivée.</p>
<div class="code-container">
<?php 
$code = <<<'PHP'
<p>
    Liste des nombres de 0 à 9:
    <?php
        for ($i = 0; $i < 10; $i += 1) {
            echo $i . ', ';
        }
    ?>
</p>
PHP;
highlight_string($code); ?>
</div>
<p>
    Liste des nombres de 0 à 9:
    <?php
        for ($i = 0; $i < 10; $i += 1) {
            echo $i . ', ';
        }
    ?>
</p>

<h3>La commande <code>foreach</code></h3>
<p>La commande <code>foreach</code> permet de parcourir un tableau. Dans ce cas, il faut spécifier un tableau, et un nom de variable permettant de contenir temporairement chaque élément du tableau successivement (comme un itérateur permet de savoir à quel point de la boucle on est dans une boucle classique).</p>
<div class="alert alert-info">Aprés avoir défini <code>$age = <?php var_export($shoppingList) ?></code> :</div>
<div class="code-container">
<?php 
$code = <<<'PHP'
<h4>Liste de courses</h4>
<ul class="list-group">
    <?php foreach ($shoppingList as $listItem): ?>
    <li class="list-group-item"><?php echo $listItem ?></li>
    <?php endforeach; ?>
</ul>
PHP;
highlight_string($code); ?>
</div>
<h4>Liste de courses</h4>
<ul class="list-group">
    <!-- Génère un élément de liste pour chaque texte contenu dans la liste de courses -->
    <?php foreach ($shoppingList as $listItem): ?>
    <li class="list-group-item"><?php echo $listItem ?></li>
    <?php endforeach; ?>
</ul>

<?php include 'templates/footer.php' ?>