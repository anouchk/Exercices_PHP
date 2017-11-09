  <?php

function get_commentaires($offset, $limit) {
    // Récupération de la base de données
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;

	// Récupération des commentaires
	$reponse2 = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet=? ORDER BY date_commentaires_fr DESC LIMIT :offset, :limit');
	$reponse2->execute(array($_GET['billet']));
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
    $commentaires = $req->fetchAll();

    return $commentaires;

}


			