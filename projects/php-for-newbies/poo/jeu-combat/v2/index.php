<?php
/**
 * On charge les classes dynamiquement
 */
function autoload($class)
{
	require $class.'.php';
}
spl_autoload_register('autoload');

/**
 * On initialise la session pour reprendre l'avancement du précédent personnage.
 * On propose également la déconnexion de la session
 */
session_start();

if (isset($_GET['deconnexion'])):
	session_destroy();
	header('Location: .');
	exit();
endif;

if (isset($_SESSION['perso'])):
	$perso = $_SESSION['perso'];
endif;

/**
 * On initialise le manager des personnages.
 */
$db = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Affiche une erreur lorsqu'un requête échoue
$manager = new PersonnagesManager($db);

/**
 * On crée un personnage en vérifiant les informations entrées par l'utilisateur
 */
if (isset($_POST['creer']) && isset($_POST['nom'])):
	switch($_POST['type']):
		case 'magicien':
			$perso = new Magicien(['nom' => $_POST['nom']]);
			break;
		case 'guerrier':
			$perso = new Guerrier(['nom' => $_POST['nom']]);
			break;
		default:
			$message = "Le type du personnage est invalide";
			break;
	endswitch;

	if (isset($perso)):
		if (!$perso->nomValide()):
			$message = "Le nom choisi est invalide !";
			unset($perso);

		elseif ($manager->exists($perso->getNom())):
			$message = "Le nom du personnage est déjà pris";
			unset($perso);

		else:
			$manager->add($perso);

		endif;
	endif;

/**
 * On utilise le personnage défini par l'utilisateur en vérifiant qu'il existe
 */
elseif (isset($_POST['utiliser']) && isset($_POST['nom'])):
	if ($manager->exists($_POST['nom'])): // Si le personnage existe
		$perso = $manager->get($_POST['nom']);

	else:
		$message = 'Ce personnage n\'existe pas !';

	endif;

/**
 * Si l'utilisateur a cliqué sur un personnage pour le frapper
 */
elseif (isset($_GET['frapper'])):
	if (!isset($perso)):
		$message = "Merci de créer un personnage ou de vous identifier";

	else:
		if (!$manager->exists((int) $_GET['frapper'])):
			$message = "Le personnage que vous voulez frapper n'existe pas !";

		else:
			$persoAFrapper = $manager->get((int) $_GET['frapper']);
			$erreur = $perso->frapper($persoAFrapper);

			switch($erreur):
				case Personnage::CEST_MOI:
					$message = "Mais.. Pourquoi voulez-vous vous frapper ?";
					break;

				case Personnage::PERSONNAGE_FRAPPE:
					$message = "Le personnage a bien été frappé";

					$manager->update($perso);
					$manager->update($persoAFrapper);
					break;

				case Personnage::PERSONNAGE_TUE:
					$message = "Vous avez tué ce personnage !";
					$manager->update($perso);
					$manager->delete($persoAFrapper);
					break;

				case Personnage::PERSONNAGE_ENDORMI:
					$message = "Vous êtes endormi, vous ne pouvez pas frapper de personnage";
					break;
			endswitch;

		endif;
	endif;

/**
 * Si on ensorcele un personnage
 */
elseif (isset($_GET['ensorceler'])):
	if (!isset($perso)):
		$message = "Merci de créer un personnage ou de vous identifier";

	else:
		if ($perso->getType() !== 'magicien'):
			$message = "Seuls les magiciens peuvent ensorceler des personnages !";

		else:
			if (!$manager->exists((int) $_GET['ensorceler'])):
				$message = "Le personnage que vous voulez frapper n'existe pas !";

			else:
				$persoAEnsorceler = $manager->get((int) $_GET['ensorceler']);
				$erreur = $perso->lancerUnSort($persoAEnsorceler);

				switch($erreur):
					case Personnage::CEST_MOI:
					$message = "Mais.. Pourquoi voulez-vous vous ensorceler ?";
					break;

					case Personnage::PERSONNAGE_ENSORCELE:
						$message = "Le personnage a bien été ensorcelé";

						$manager->update($perso);
						$manager->update($persoAEnsorceler);
						break;

					case Personnage::PAS_DE_MAGIE:
						$message = "Vous n'avez pas de magie";
						break;

					case Personnage::PERSONNAGE_ENDORMI:
						$message = "Vous êtes endormi, vous ne pouvez pas frapper de personnage";
						break;
				endswitch;

			endif;
		endif;
	endif;
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TP : Jeu de combat</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
</head>
<body>
	<div style="max-width: 800px; margin: 30px auto;">
		<?php
			/**
			 * On affiche le nombre de personnages créés
			 */
		?>
		<p>Nombre de personnages créés : <?= $manager->count(); ?></p>

		<?php
			/**
			 * S'il y a une erreur, on l'affiche
			 */
		?>
		<?php if (isset($message)) { echo '<p>' . $message . '</p>'; } ?>

		<?php
			/**
			 * Si on utilise un personnage nouveau ou pas, on affiche ses informations
			 */
		?>
		<?php if (isset($perso)): ?>
			<p><a href="?deconnexion=1">Déconnexion</a></p>
			<fieldset>
				<legend>Mes informations</legend>
				<p>
					Type : <?= ucfirst($perso->getType()) ?><br />
					Nom : <?= htmlspecialchars($perso->getNom()) ?><br />
					Dégâts : <?= $perso->getDegats() ?><br />

					<?php
						switch($perso->getType()):
							case 'magicien':
								echo "Magie : ";
								break;

							case 'guerrier':
								echo "Protection : ";
								break;
						endswitch;

						echo $perso->getAtout();
					?>
				</p>
		    </fieldset>

		    <br><br><br>

		    <fieldset>
		    	<legend>Qui frapper ?</legend>
		    	<p>
		    		<?php
		    			$personnages = $manager->getList($perso->getNom());

		    			if (empty($personnages)):
		    				echo "Il n'y a personne à frapper";
	    				else:
	    					if ($perso->estEndormi()):
    							echo "Un magicien vous a endormi ! Vous allez vous réveiller dans " . $perso->reveil();
							else:
		    					foreach($personnages AS $personnage):
		    						echo '<p>';
	    							echo '<a href="?frapper=' . $personnage->getId() . '">';
	    							echo htmlspecialchars($personnage->getNom());
	    							echo '</a> (dégâts : ' . $personnage->getDegats() . ')';

	    							if ($perso->getType() == 'magicien'):
	    								echo ' | <a href="?ensorceler='.$personnage->getId().'">';
	    								echo 'Lancer un sort';
	    								echo '</a>';
	    							endif;
	    							echo '</p>';
		    					endforeach;
	    					endif;
	    				endif;

		    		?>
		    	</p>

		<?php
			/**
			 * Sinon, on affiche le formulaire de création / choix de personnage
			 */
		?>
		<?php else: ?>
			<form action="" method="post" class="pure-form pure-form-aligned">
				<fieldset>
					<legend>Création d'un personnage</legend>

					<div class="pure-control-group">
						<label for="nom">Nom</label>
						<input type="text" id="nom" name="nom" maxlength="50">
					</div>

					<div class="pure-control-group">
						<label for="type">Type</label>
						<select name="type">
							<option value="magicien">Magicien</option>
							<option value="guerrier">Guerrier</option>
						</select>
					</div>

					<div class="pure-controls">
						<button type="submit" name="creer" class="pure-button pure-button-primary">
							Créer
						</button>

						<button type="submit" name="utiliser" class="pure-button pure-button-primary">
							Utiliser
						</button>
					</div>
				</fieldset>
			</form>

		<?php endif; ?>
	</div>
</body>
</html>

<?php
	/**
	 * Si on a crée un personnage, on le stocke dans une variable de session pour économiser une requête SQL
	 */
	if (isset($perso)):
		$_SESSION['perso'] = $perso;
	endif;
?>