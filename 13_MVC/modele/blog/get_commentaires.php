  <?php

function get_commentaires($offset, $limit) {
    // on récupère l'id du billet dont on veut afficher les commentaires
    $idBillet=$_GET['billet'];

    // Récupération de la base de données
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
    
    // Récupération du billet   
    $PDOstatement = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id=?');
    $PDOstatement->execute(array($idBillet));
    $billet = $PDOstatement->fetch(PDO::FETCH_ASSOC);
    return $billet ;

	$PDOstatement->closeCursor(); // Important : on libère le curseur pour la prochaine requête

	// Récupération des commentaires
	$reponse2 = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet=? ORDER BY date_creation DESC LIMIT :offset, :limit');
	$reponse2->execute(array($_GET['billet']));
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
    $commentaires = $req->fetchAll();

    return $commentaires;

}

			