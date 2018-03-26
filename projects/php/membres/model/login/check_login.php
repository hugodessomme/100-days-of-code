<?php
function check_login($pseudo, $pass) {
	global $bdd;

	$query = $bdd->prepare('
		SELECT id FROM membres
		WHERE pseudo = :pseudo AND pass = :pass
	');
	$query->execute(array(
		'pseudo' => $pseudo,
		'pass' => $pass
	));

	$result = $query->fetch();

	if($result) {
		return true;
	} else {
		return false;
	}
}