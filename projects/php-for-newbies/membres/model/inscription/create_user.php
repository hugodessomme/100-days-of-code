<?php
function create_user($pseudo, $pass, $email) {
	global $bdd;

	$query = $bdd->prepare('
		INSERT INTO membres(pseudo, pass, email, date_inscription)
		VALUES (:pseudo, :pass, :email, CURDATE())
	');
	$query->execute(array(
		'pseudo' => $pseudo,
		'pass' => $pass,
		'email' => $email
	));
}