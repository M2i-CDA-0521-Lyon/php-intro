<?php $pageName = 'Accueil' ?>
<?php include 'templates/header.php' ?>

<h1>Initiation au PHP</h1>
<p>Le langage PHP étend le langage HTML en lui ajoutant la possibilité <strong>d'exécuter des
        opérations</strong>, et de générer du code HTML résultant de ces opérations.</p>
<p>Par exemple, le code suivant permet d'afficher l'heure à laquelle la requête a été effectuée:</p>
<div class="code-container">
<?php 
$code = <<<'PHP'
<?php echo date("h:i:sa") ?>
PHP;
highlight_string($code); ?>
</div>
<div id="date" class="d-flex justify-content-center fw-bold">    
    <?php echo date("h:i:sa") ?>
</div>
<h2>La commande <code>echo</code></h2>
<p>Une commande essentielle du langage PHP est la commande <code>echo</code>, qui permet de générer du code
    HTML
    à l'intérieur d'un document. Toute portion d'une page qui a vocation à être variable, c'est-à-dire à
    changer
    en fonction de la requête envoyée par le client, doit utiliser <code>echo</code> d'une façon ou d'une
    autre,
    sinon aucun code HTML ne sera généré par PHP, et donc aucune modification n'apparaîtra dans la page.</p>
<p>Si l'on souhaite obtenir une portion de PHP qui ne fait rien d'autre à part un <code>echo</code>, on peut remplacer le marqueur <code>&lt;?php ?&gt;</code> par <code>&lt;?= ?&gt;</code>.
<h2>La commande <code>var_dump</code></h2>
<p>La commande <code>var_dump</code> est une commande utile aux développeurs, qui permet d'examiner le
    contenu
    d'une variable. Comme <code>echo</code>, elle génère une portion de code HTML afin que le résultat
    demandé
    puisse s'afficher dans le document HTML et être visible par le développeur lorsqu'il charge la page dans
    son
    navigateur. En revanche, <code>var_dump</code> est exclusivement destinée à tester son code, et n'a pas
    sa
    place dans du code en production. Elle est souvent accompagnée de la commande <code>die</code> qui
    permet
    d'arrèter prématurément le traitement de PHP, afin d'obtenir uniquement le résultat fourni par
    <code>var_dump</code> au lieu de la page complète.
</p>

<?php include 'templates/footer.php' ?>
