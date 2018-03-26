<div class="post">
	<h3><?php echo htmlspecialchars($data['titre']) ?> le <?php echo $data['date_creation'] ?></h3>
	<p><?php echo nl2br(htmlspecialchars($data['contenu'])); ?></p>
	<a href="comments.php?id=<?php echo $data['id']?>">Commentaires</a>
</div>
