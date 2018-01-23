<?php

function autoload($class) {
	require $class.'.php';
}
spl_autoload_register('autoload');

session_start();

if (isset($_GET['deconnexion'])) {
	session_destroy();
	header('Location: .');
	exit();
}

if (isset($_SESSION['perso'])) {
	$perso = $_SESSION['perso'];
}

$db = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$manager = new PersonnagesManager($db);

/**
 * Création d'un personnage
 */
if (isset($_POST['creer']) && isset($_POST['name'])) {
	$perso = new Personnage(['nom' => $_POST['name']]);

	if (!$perso->nomValide()) {
		$message = "Le nom est invalide";
		unset($perso);
	}
	elseif ($manager->exists($perso->getNom())) {
		$message = "Le nom est déjà utilisé";
		unset($perso);
	}
	else {
		$manager->add($perso);
	}
}

elseif (isset($_POST['utiliser']) && isset($_POST['name'])) {
	if ($manager->exists($_POST['name'])) {
		$perso = $manager->get($_POST['name']);
	}
	else {
		$message = "Ce personnage n'existe pas";
	}
}

elseif (isset($_GET['frapper'])) {
	if (!isset($perso)) {
		$message = "Merci de créer un personnage ou de vous identifier";
	}
	else {
		if (!$manager->exists((int) $_GET['frapper'])) {
			$message = 'Le personnage que vous voulez frapper n\'existe pas';
		}
		else {
			$persoAFrapper = $manager->get((int) $_GET['frapper']);

			$output = $perso->frapper($persoAFrapper);

			switch($output) {
				case Personnage::CEST_MOI :
					$message = 'Pourquoi voulez-vous vous frapper ?';
					break;

				case Personnage::PERSONNAGE_FRAPPE :
					$message = 'Le personnage a bien été frappé';
					$perso->gagnerExperience();
					$manager->update($perso);
					$manager->update($persoAFrapper);
					break;

				case Personnage::PERSONNAGE_TUE :
					$message = 'Vous avez tué ce personnage';
					$perso->gagnerPuissance();
					$manager->update($perso);
					$manager->delete($persoAFrapper);
					break;
			}
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Jeu de combat - Practise</title>
</head>
<body>

<?php if (isset($message)): ?>
	<?= '<p>' . $message . '</p>'; ?>
<?php endif; ?>

<?php if (isset($perso)): ?>
	<?php $personnages = $manager->getList($perso->getNom()); ?>

	<p><a href="?deconnexion=1">Déconnexion</a></p>
	<fieldset>
		<legend>Mes informations</legend>
		<p>Nom : <?= htmlspecialchars($perso->getNom()); ?></p>
		<p>Dégâts : <?= $perso->getDegats(); ?></p>
		<p>Expérience : <?= $perso->getExperience(); ?></p>
		<p>Niveau : <?= $perso->getNiveau(); ?></p>
		<p>Puissance : <?= $perso->getPuissance(); ?></p>
	</fieldset>

	<ul>
		<?php foreach($personnages as $personnage) { ?>
			<li>
				<a href="?frapper=<?= $personnage->getId(); ?>">
					<?= $personnage->getNom(); ?>
				</a>
				(dégâts : <?= $personnage->getDegats(); ?>)
			</li>
		<?php } ?>
	</ul>

<?php else: ?>
	<form action="" method="post">
		<input type="text" name="name" placeholder="Nom du personnage">
		<input type="submit" value="Créer" name="creer">
		<input type="submit" value="Utiliser" name="utiliser">
	</form>
<?php endif; ?>
</body>
</html>
<?php
if (isset($perso)) {
	$_SESSION['perso'] = $perso;
}
?>