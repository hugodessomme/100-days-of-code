<?php
	// Open the file
	/**
	 * r : Lecture seule
	 * r+ : Lecture et écriture
	 * a : Lecture seule, si le fichier n'existe pas alors le crée
	 * a+ : Lecture et écriture, si le fichier n'existe pas alors le crée (il faut que le dosseir soit en 777)
	 */
	$counter = fopen('counter.txt', 'r+');

	$view = fgets($counter); // Récupère la valeur de la 1ère ligne
	$view += 1;
	fseek($counter, 0); // Retourne en début de fichier et écrase la denrière valeur
	fputs($counter, $view); // Ecrit dans le fichier

	// Close the file
	fclose($counter);

	echo "Statistics: " . $view;
?>