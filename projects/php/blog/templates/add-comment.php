<form action="comments_insert.php" method="post">
	<fieldset>
		<legend>Ajouter un commentaire</legend>
		<div><input type="text" name="auteur" placeholder="auteur"></div>
		<div><textarea name="commentaire" placeholder="commentaire"></textarea></div>
		<input type="hidden" name="id_post" value="<?php echo $_GET['id']; ?>">
		<input type="submit">
	</fieldset>
</form>