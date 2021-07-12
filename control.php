<?php $age = 20 ?>
<?php $shoppingList = ['Bananes', 'Cerises', 'Frites', 'Chocolat', 'Papier toilette'] ?>

<?php $pageName = 'Structures de contrôle' ?>
<?php include 'templates/header.php' ?>

<h1>Les structures de contrôle</h1>
<p></p>

<h2>Conditions</h2>
<p>Vous avez <?php echo $age ?> ans.</p>
<p>Vous êtes
    <?php
        // Écrit "majeur" si l'âge est supérieur ou égal à 18, sinon écrit "mineur"
        if ($age >= 18) {
            echo 'majeur';
        } else {
            echo 'mineur';
        }
    ?>.</p>

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

<h2>Boucles</h2>
<p>Liste des nombres de 0 à 9:
    <?php
        for ($i = 0; $i < 10; $i += 1) {
            echo $i . ', ';
        }
    ?>
</p>

<div>Liste de courses</div>
<ul class="list-group">
    <!-- Génère un élément de liste pour chaque texte contenu dans la liste de courses -->
    <?php foreach ($shoppingList as $listItem): ?>
    <li class="list-group-item"><?php echo $listItem ?></li>
    <?php endforeach; ?>
</ul>

<?php include 'templates/footer.php' ?>