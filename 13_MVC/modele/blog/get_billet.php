<?php

function get_billet() {
    // on récupère l'id du billet dont on veut afficher les commentaires
    $idBillet=$_GET['billet'];

    // Récupération de la base de données
    global $bdd;
    
    // Récupération du billet   
    $PDOstatement = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id=?');
    $PDOstatement->execute(array($idBillet));
    $billet = $PDOstatement->fetch(PDO::FETCH_ASSOC);
    return $billet ;
}