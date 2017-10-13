<?php
echo "---------------- PREMIERS PAS SUR PHP -------------------";

/////////////////////////
///// LES VARIABLES /////
/////////////////////////
echo "<br /><br />LES VARIABLES <br /><br />";

$age_du_visiteur = 17;
echo 'Le visiteur a ' . $age_du_visiteur . ' ans.';

//////////////////////////
///// LES CONDITIONS /////
//////////////////////////
echo "<br /><br />LES CONDITIONS <br /><br />";

$age = 8;
if ($age > 0 && $age <= 12) {
    echo "Salut gamin ! Bienvenue sur mon site !<br /><br />";
    $autorisation_entrer = "Oui";
} elseif ($age > 12) {
    echo "Ceci est un site pour enfants, vous êtes trop vieux pour pouvoir  entrer. Au revoir !<br />";
    $autorisation_entrer = "Non";
} elseif ($age = 0) {
	echo "Je n'ai pas bien compris ton âge. ";
	$autorisation_entrer = "Difficile à dire si tu ne nous donnes pas ton âge !";
};

echo "Avez-vous l'autorisation d'entrer ? La réponse est : " . $autorisation_entrer . "<br /><br />" ;


$note = 10;
switch ($note) // on indique sur quelle variable on travaille

{ 
    case 0: // dans le cas où $note vaut 0
        echo "Tu es vraiment un gros nul !!!";
    break;

    case 5: // dans le cas où $note vaut 5
        echo "Tu es très mauvais";
    break;

    case 7: // dans le cas où $note vaut 7
        echo "Tu es mauvais";
    break;

    case 10: // etc. etc.
        echo "Tu as pile poil la moyenne, c'est un peu juste…";
    break;

    case 12:
        echo "Tu es assez bon";
    break;

    case 16:
        echo "Tu te débrouilles très bien !";
    break;

    case 20:
        echo "Excellent travail, c'est parfait !";
    break;

    default:
        echo "Désolé, je n'ai pas de message à afficher pour cette note";
}


//////////////////////////
///// LES BOUCLES    /////
//////////////////////////
echo "<br /><br />LES BOUCLES <br /><br />";

$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');
echo " " . $prenoms[1] . "<br /><br />";

echo "<br />Et si l'on affichait tous les éléments d'un <b>array</b> ?<br />";
echo "<br />Permière façon de faire : une boucle <b>for</b> :<br />";
// Puis on fait une boucle pour tout afficher :
for ($numero = 0; $numero < 5; $numero++) {
    echo $prenoms[$numero] . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
}

$element = true;
echo "<br />Autre façon de faire : <b>foreach</b> ! Avec 'as element' :<br />";
// Autre façon de faire : foreach
foreach($prenoms as $element) {
    echo $element . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
}

$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille'
);

echo "<br />On peut aussi afficher la clé et la valeur dans un array avec <b>'as'</b> :<br />";
foreach($coordonnees as $cle => $element) {
    echo '[' . $cle . '] vaut ' . $element . '<br />';
};

echo "<br />Pour déboguer, on peut afficher rapidement le contenu d'un array avec la fonction <b>print_r(expression)</b> et la balise HTML [pre]. <br />";
echo '<pre>';
print_r($coordonnees);
echo '</pre>';


echo "<br />On peut aussi chercher si une clé fait partie d'un tableau avec <b>array_key_exists</b> :<br />";
if (array_key_exists('nom', $coordonnees)) {
    echo 'La clé "nom" se trouve dans les coordonnées !';
}
if (array_key_exists('pays', $coordonnees)){
    echo 'La clé "pays" se trouve dans les coordonnées !';
}

echo "<br /><br />On peut même chercher si une valeur fait partie d'un tableau avec <b>in_array</b> :<br />";
if (in_array('Dupont', $coordonnees)){
    echo 'La valeur "Dupont" se trouve dans les coordonnées !';
}
if (in_array('Durand', $coordonnees)){
    echo 'La valeur "Durand" se trouve dans les coordonnées !';
}


echo "<br /><br />Il est possible d'aller chercher la clé d'une valeur dans un tableau grâce à la fonction <b>array_search</b> :<br />";
$cle_de_dupont = array_search('Dupont', $coordonnees);
echo 'Dupont a pour clé [' . $cle_de_dupont . '].<br />';

echo "<br />S'il n'y a pas de clé précisée, dans le cas où il ne s'agit pas d'un array associatif par exemple, alors la clé correspond au numéro de la valeur dans le tableau, en d'autres termes sa position :<br />";
$fruits = array ('Banane', 'Pomme', 'Poire', 'Cerise', 'Fraise', 'Framboise');
$position = array_search('Fraise', $fruits);
echo 'Fraise se trouve en position ' . $position . '<br />';
$position = array_search('Banane', $fruits);
echo 'Banane se trouve en position ' . $position;

//////////////////////////
///// LES FONCTIONS  /////
//////////////////////////
echo "<br /><br />LES FONCTIONS <br /><br />";

echo "<b>strlen</b>: longueur d'une chaîne<br />";
$phrase = 'Bonjour tout le monde ! Je suis une phrase !';
$longueur = strlen($phrase);
echo 'La phrase ci-dessous comporte ' . $longueur . ' caractères :<br />' . $phrase;

echo "<br /><br /><b>str_replace</b>: rechercher et remplacer<br />";
$ma_variable = str_replace('b', 'p', 'bim bam boum'); 
echo $ma_variable;

echo "<br /><br /><b>strtolower</b>: écrire en minuscules<br />";
echo "<b>strtoupper</b>: écrire en majuscules<br />";

echo "<br /><b>date</b>: récupérer la date";
echo 
    "<br /> H : heure 
    <br /> i : minute 
    <br /> d : jour 
    <br /> m : mois 
    <br /> Y : année.";

// Enregistrons les informations de date dans des variables

$jour = date('d');
$mois = date('m');
$annee = date('Y');
$heure = date('H');
$minute = date('i');

// Maintenant on peut afficher ce qu'on a recueilli

echo '<br />Bonjour ! Nous sommes le ' . $jour . '/' . $mois . '/' . $annee . 'et il est ' . $heure. ' h ' . $minute;
 
 function VolumeCone($rayon, $hauteur) {
   $volume = $rayon * $rayon * 3.14 * $hauteur * (1/3); // calcul du volume
   return $volume; // indique la valeur à renvoyer, ici le volume
}

$volume = VolumeCone(3, 1);
echo '<br /><br />Le volume d\'un cône de rayon 3 et de hauteur 1 est de ' . $volume;       

?>