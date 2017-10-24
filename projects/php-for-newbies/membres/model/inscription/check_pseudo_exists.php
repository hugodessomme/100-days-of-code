<?php
function check_pseudo_exists($pseudo) {
	global $bdd;

	$query = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = :pseudo');
	$query->execute(array(
		'pseudo' => $pseudo
	));

	$result = $query->fetch();

	if ($pseudo == $result['pseudo']) {
		return true;
	} else {
		return false;
	}
}