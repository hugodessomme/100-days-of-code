<?php
function get_posts($offset, $limit) {
	global $bdd;
	$offset = (int) $offset;
	$limit = (int) $limit;

	$query = $bdd->prepare('
		SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr
		FROM blog_post
		ORDER BY date_creation DESC
		LIMIT :offset, :limit
	');
	$query->bindParam(':offset', $offset, PDO::PARAM_INT);
	$query->bindParam(':limit', $limit, PDO::PARAM_INT);
	$query->execute();

	$posts = $query->fetchAll();

	return $posts;
}