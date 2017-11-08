<?php
function chargerClasse($classe)
{
	require $classe . '.php';
}
spl_autoload_register('chargerClasse');

$db = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');

$query = $db->query('SELECT * FROM personnages');
while($data = $query->fetch(PDO::FETCH_ASSOC)) {
	$perso = new Personnage($data);

	echo $perso->getNom() . '<br>';
}
