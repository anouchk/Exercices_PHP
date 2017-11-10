  <?php

function get_commentaires($offset, $limit, $idBillet) {
    // on récupère l'id du billet dont on veut afficher les commentaires
    $idBillet=$_GET['billet'];

    // Récupération de la base de données
    global $bdd;

    // fourchette du nombre de messages à afficher
    $offset = (int) $offset;
    $limit = (int) $limit;

	// Récupération des commentaires
	$reponse = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet=? ORDER BY date_commentaire_fr DESC LIMIT :offset, :limit');
	$reponse->execute(array($idBillet));
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
    $commentaires = $req->fetchAll();

    return $commentaires;

}


			