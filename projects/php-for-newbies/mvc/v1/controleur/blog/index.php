<?php

// Récupère les 5 derniers billets (au modèle)
include_once('modele/blog/get_posts.php');
$posts = get_posts(0, 5);

// Traitement sur les données (ici, principalement pour sécuriser l'affichage)
foreach($posts as $key => $post) {
	$posts[$key]['titre'] = htmlspecialchars($post['titre']);
	$posts[$key]['contenu'] = nl2br(htmlspecialchars($post['contenu']));
}

// Affiche la vue
include_once('vue/blog/index.php');