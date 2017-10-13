<pre>

<?php

print_r($_GET);
// elle contient les données envoyées en paramètres dans l'URL.
print_r($_POST);
// c'est une variable que vous connaissez et qui contient les informations qui viennent d'être envoyées par un formulaire.
print_r($_SERVER['REMOTE_ADDR']);
// Nous donne l'adresse IP du client qui a demandé à voir la page, ce qui peut être utile pour l'identifier.
print_r($_COOKIE);
// contient les valeurs des cookies enregistrés sur l'ordinateur du visiteur. Cela nous permet de stocker des informations sur l'ordinateur du visiteur pendant plusieurs mois, pour se souvenir de son nom par exemple.
print_r($_FILES);
//  elle contient la liste des fichiers qui ont été envoyés via le formulaire précédent.
?>

</pre>