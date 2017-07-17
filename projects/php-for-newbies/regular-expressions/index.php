<?php
	if( isset($_POST['data']) ) {
		$tel = htmlspecialchars($_POST['data']['tel']);
		$email = htmlspecialchars($_POST['data']['email']);

		// Autorise le format avec espace / tirets / collés sur le numéro de téléphone
		if( preg_match('#^0[1-68]([-. ]?[0-9]{2}){4}$#', $tel) ) {
			echo "<p>Téléphone correct</p>";
		} else {
			echo "<p>Téléphone incorrect</p>";
		}

		// Autorise le format avec espace / tirets / collés sur le numéro de téléphone
		if( preg_match('#[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $email) ) {
			echo "<p>Email correct</p>";
		} else {
			echo "<p>Email incorrect</p>";
		}
	}
?>

<form action="index.php" method="post">
	<div>
		<label for="tel">Téléphone</label>
		<input type="text" name="data[tel]" id="tel">
	</div>
	<div>
		<label for="email">Email</label>
		<input type="text" name="data[email]" id="email">
	</div>
	<input type="submit">
</form>

<?php
	// Exemple d'utilisation au sein d'une requête SQL
	// SELECT nom FROM visiteurs WHERE ip REGEXP '^84\.254(\.[0-9]{1,3}){2}$'
	// Sélectionne les IP préfixées par 84.254 et se temrinent par 2 autres nombres de 1 à 3 chiffres
?>

<?php

	if( isset($_POST['text']) ) {
		$text = stripslashes($_POST['text']); // On enlève les slashs qui se seraient ajoutés automatiquement
    	$text = htmlspecialchars($text); // On rend inoffensives les balises HTML que le visiteur a pu rentrer
    	$text = nl2br($text); // On crée des <br /> pour conserver les retours à la ligne

		$text = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $text);
		$text = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $text);
		$text = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#isU', '<span style="color:$1;">$2</span>', $text);
		$text = preg_replace('#http://[0-9a-z._/-]+#i', '<a href="$0">$0</a>', $text);

		echo $text . '<br><hr>';

	}
?>

<form method="post">
	<?php
		// Exemple
		// Je suis un gros [b]Zéro[/b], et pourtant j'ai [i]tout appris[/i] sur http://www.siteduzero.com<br />
    	// Je vous [b][color=green]recommande[/color][/b] d'aller sur ce site, vous pourrez apprendre à faire ça [i][color=purple]vous aussi[/color][/i] !
	?>
	<p>
	    <label for="text">Votre message ?</label><br />
	    <textarea id="text" name="text" cols="50" rows="8"></textarea><br />
	    <input type="submit" value="Montre-moi toute la puissance des regex" />
	</p>
</form>
