<?php
function chargerClasse($classe)
{
	require $classe . '.php';
}
spl_autoload_register('chargerClasse');

$perso = new Personnage([
	'nom' => 'Victor',
	'forcePerso' => 5,
	'degats' => 0,
	'niveau' => 1,
	'experience' => 2
]);
$perso2 = new Personnage([
	'nom' => 'Hugo',
	'forcePerso' => 20,
	'degats' => 15,
	'niveau' => 10,
	'experience' => 30
]);

$db = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
$manager = new PersonnagesManager($db);

$manager->add($perso2);
