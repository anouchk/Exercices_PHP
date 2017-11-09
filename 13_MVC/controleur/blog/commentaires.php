<?php 
 
// On demande les 10 derniers commentaires (modèle) 
include_once('modele/blog/get_commentaires.php'); 
include_once('modele/blog/get_billet.php'); 
$commentaires = get_commentaires(0, 10); 
$billet = get_billet();
 
// On effectue du traitement sur les données (contrôleur) 
// Ici, on doit surtout sécuriser l'affichage 
echo "<pre>";
var_dump($commentaires);
foreach($commentaires as $cle => $commentaire) 
{ 
	// var_dump($commentaire);
    $commentaires[$cle]['titre'] = htmlspecialchars($commentaire['titre']); 
    $commentaires[$cle]['contenu'] = nl2br(htmlspecialchars($commentaire['contenu'])); 
} 
	
// On affiche la page (vue) 
include_once('vue/blog/commentaires.php'); 
