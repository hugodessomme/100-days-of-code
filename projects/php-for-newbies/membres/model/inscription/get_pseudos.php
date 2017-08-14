<?php
function get_pseudos() {
	global $bdd;

	$query = $bdd->prepare('SELECT pseudo FROM membres');
	$query->execute();

	$pseudos = $query->fetchAll();

	return $pseudos;
}