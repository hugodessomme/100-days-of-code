<form action="update.php?id=<?php echo $data['id']; ?>" method="post">
	<fieldset>
		<legend>Modifier un article</legend>
		<div><input type="text" name="titre" value="<?php echo $data['titre']; ?>"></div>
		<div><textarea name="contenu" cols="30" rows="10"><?php echo $data['contenu'] ?></textarea></div>
		<input type="submit">
	</fieldset>
</form>