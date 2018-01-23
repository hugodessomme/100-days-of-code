<?php

// Renvoie la liste de tous les billets, triés par identifiant décroissant
function getBillets() {
	$bdd = getBdd();

	$output = $bdd->query('
	    SELECT BIL_ID AS id, BIL_DATE AS date, BIL_TITRE AS titre, BIL_CONTENU AS contenu
	    FROM T_BILLET
	    ORDER BY BIL_ID DESC
	');

	return $output;
}

// Connexion à la BDD
function getBdd() {
	$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	return $bdd;
}

// Renvoie les informations sur un billet
function getBillet($idBillet) {
	$bdd = getBdd();

	$output = $bdd->prepare('
		SELECT BIL_ID AS id, BIL_DATE AS date, BIL_TITRE AS titre, BIL_CONTENU AS contenu FROM T_BILLET
		WHERE BIL_ID = ?
	');
	$output->execute(array($idBillet));

	if ($output->rowCount() == 1)
		return $output->fetch(); // Accès à la première ligne de résultat
	else
		throw new Exception("Aucun billet ne correspond à l'identifiant '".$idBillet."'");
}

// Renvoie la liste des commentaires associés à un billet
function getCommentaires($idBillet) {
	$bdd = getBdd();

	$output = $bdd->prepare('
		SELECT COM_ID AS id, COM_DATE AS date, COM_AUTEUR AS auteur, COM_CONTENU AS contenu FROM T_COMMENTAIRE
		WHERE BIL_ID = ?
	');
	$output->execute(array($idBillet));

	return $output;
}