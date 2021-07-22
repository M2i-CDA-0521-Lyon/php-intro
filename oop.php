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

<h2>Notions essentielles</h2>
<h3>Classes et objets</h3>
<p>Une classe est un patron de construction qui définit une structure de données et un ensemble de comportements. Un objet est une concrétisation de cette classe, qui adopte la structure de données et qui est capable d'adopter les comportements définis par celle-ci.</p>

<details> 
<summary>Exemple</summary>
<div class='code-container'>
<?php 
$code = <<<'PHP'
<?php

// Ceci est une classe qui explique comment créer une personne
class Person
{
    // Prénom de la personne
    private string $firstName;
    // Nom de famille de la personne
    private string $lastName;

    // Crée une nouvelle personne
    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    // Renvoie le nom complet de la personne
    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}

// Ceci est un objet qui a toutes les propriétés définies dans la classe Person
$jeanPierre = new Person('Jean-Pierre', 'Martin');
// Cet objet peut adopter n'importe quel comportement défini dans la classe Person
$jeanPierre->getFullName();  // => "Jean-Pierre Martin"
PHP;
highlight_string($code); ?>
</div>
</details>

<h3>Instance</h3>
<p>Le terme d'instance définit la relation entre un objet, et la classe qui a permis de la construire. Dans l'exemple précédent, on peut dire que <code>$jeanPierre</code> est une instance de la classe <strong>Person</strong>. Instancier une classe signifie donc créer un objet à partir de cette classe.</p>
<p>En PHP, le mot-clé <code>instanceof</code> permet de tester si un objet est bien une instance, c'est-à-dire s'il a bien été créé à partir d'une classe donnée.</p>

<h3><code>$this</code></h3>
<p>Le mot-clé <code>$this</code> permet à un objet de faire référence à lui-même. Dans la mesure où une classe est un patron qui permet de construire une multitude d'objets, on doit écrire une seule fois un code qui sera utilisé par plusieurs objets différents. Le mot-clé <code>$this</code> agit donc comme une variable qui contiendrait en toutes circonstances l'objet actif.</p>

<h3>Méthodes</h3>
<p>On qualifie de "méthode" un comportement qu'un objet est capable d'adpoter. En PHP, une méthode prend simplement la forme d'une fonction encapsulée dans une classe. Les deux termes coexistent, car dans certains langages, il n'est par exemple pas possible d'écrire une fonction en-dehors d'une classe, tous les comportements sont donc des méthodes.</p>
<p>En PHP, on dira qu'une fonction est une méthode si elle est écrite dans une classe. En-dehors de ça, une méthode se comporte comme une fonction tout à fait classique.</p>

<h3>Constructeur</h3>
<p>Un constructeur est une méthode qui s'exécute automatiquement à la création de chaque objet. Il permet typiquement d'initialiser l'objet avec des données indispenasbles à son bon fonctionnement. Par exemple, la classe <strong>PDO</strong>, qui permet de gérer l'accès à la base de données, définit un constructeur dans lequel il faut obligatoirement passer une chaîne de caractères contenant le protocole, l'adresse du serveur ainsi que son port, et optionnellement un nom d'utilisateur et un mot de passe pour s'authentifier; en effet, sans ces informations, l'objet créé ne pourra en aucun cas réaliser sa fonctionnalité.</p>

<h3><code>static</code></h3>
<p>Le mot-clé <code>static</code> dénote une propriété ou une méthode qui appartient à la classe dans laquelle elle est écrite, et non à ses instances. Ainsi, au lieu que chaque instance ait sa propre copie de la propriété, ou une méthode qui se base sur ses propriétés, on aura affaire à une propriété unique et commune à toutes les instances de la classe, et à laquelle on pourra accéder directement à travers le nom de la classe, sans avoir besoin de l'instancier préalablement.</p>

<details> 
<summary>Exemple</summary>
<div class='code-container'>
<?php 
$code = <<<'PHP'
<?php

// Cette classe compte le nombre de fois où elle a été instanciée
class MyClass
{
    // Le nombre d'instances créées
    static private int $count = 0;

    // Crée un nouvel objet
    public __construct()
    {
        self::$count += 1;
    }

    // Récupère le nombre d'instances créées
    static public function getCount()
    {
        return self::$count;
    }
}

// Crée des objets et vérifie l'évolution de la propriété statique $count
MyClass::getCount();    // => 0
$object1 = new MyClass();
MyClass::getCount();    // => 1
$object2 = new MyClass();
MyClass::getCount();    // => 2
PHP;
highlight_string($code); ?>
</div>
</details>
