<?php include 'templates/header.php' ?>

<h1>Programmation orientée objet</h1>
<p>Le paradigme de <strong>programmation procédurale</strong> met en relation des données (représentées par des <strong>variables</strong>) avec des comportements (représentés par des fonctions). Cette approche présente un certain nombre d'inconvénients, notamment en ce qui concerne l'indépendance du code et sa maintenabilité. La <strong>programmation orientée objet</strong> (POO) tente de pallier ces défauts en proposant de rassembler les données et les comportements qui les traitent au même endroit.</p>
<p>Considérez l'exemple ci-dessous, dans lequel on cherche à savoir quelle carte l'emporte dans un jeu de plis.</p>
<details> 
<summary>Programmation procédurale</summary>

<div class='code-container'>
<?php 
$code = <<<'PHP'
<?php

// Permet de déterminer si la carte 1 bat la carte 2
// Renvoie vrai si la carte 1 est plus forte que la 2, faux si la carte 1 est moins forte ou égale à la carte 2
function cardBeats(int $card1Value, int $card2Value) {
    return $card1Value > $card2value;
}

// La première carte est un 3 de coeur
$card1 = ['value' => 3, 'color' => 'hearts'];
// La deuxième carte est un 7 de pique
$card2 = ['value' => 7, 'color' => 'spades'];

cardBeats($card1['value'], $card2['value']);    // => false
cardBeats($card2['value'], $card1['value']);    // => true
PHP;
highlight_string($code); ?>
</div>

</details>

<details> 
<summary>Programmation orientée objet</summary>

<div class='code-container'>
<?php 
$code = <<<'PHP'
<?php

// Représente une carte
class Card
{
    // Valeur de la carte
    public int $value;
    // Couleur de la carte
    public string $color;

    // Permet de créer une nouvelle carte en précisant sa valeur et sa couleur
    public function __construct(int $value, string $color)
    {
        $this->value = $value;
        $this->color = $color;
    }

    // Permet de déterminer si cette carte bat l'autre carte passée en paramètre
    // Renvoie vrai si cette carte est plus forte que l'autre, faux si cette carte est moins forte ou égale à l'autre
    public function beats(Card $otherCard): bool
    {
        return $this->value > $otherCard->value;
    }
}

// La première carte est un 3 de coeur
$card1 = new Card(3, 'hearts');
// La deuxième carte est un 7 de pique
$card2 = new Card(7, 'spades');

$card1->beats($card2);    // => false
$card2->beats($card1);    // => true
PHP;
highlight_string($code); ?>
</div>

</details>

<p>Le code en version POO, bien qu'en apparence plus complexe, simplifie la manipulation des données, car les donneés (les valeurs des cartes) sont couplées avec les méthodes (savoir si une carte est plus forte qu'une autre). On a en quelque sorte &quot;appris&quot; à chaque carte comment se comporter sur la base de sa propre valeur. Dès lors, tout processus qui a accès à la valeur de la carte a, de fait, également accès aux comportements associés.</p>
<p>En outre, le fait d'avoir créé une classe <strong>Card</strong> permet de valider la structure des objets générés à partir de cette classe. Ainsi, dans la méthode <strong>beats</strong>, on peut passer comme paramètre un objet <strong>Card</strong> directement, au lieu de passer uniquement sa valeur. Cela permet de s'assurer que l'objet auquel on cherche à comparer une carte est bien, lui aussi, une carte; alors que dans la version procédurale, on se contente de donner des nombres, il est donc plus difficile de tracer l'origine de ces nombres.</p>
