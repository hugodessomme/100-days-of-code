<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="vue/blog/style.css" rel="stylesheet" />
</head>
<body>
    <h1>Mon super blog !</h1>
    <p>Derniers billets du blog :</p>

    <?php foreach($posts as $post) { ?>
        <div class="news">
            <h3><?php echo $post['titre']; ?> <em>le <?php echo $post['date_creation_fr']; ?></em></h3>
            <p>
                <?php echo $post['contenu']; ?><br>
                <em><a href="commentaires.php?billet=<?php echo $billet['id']; ?>">Commentaires</a></em>
            </p>
        </div>
    <?php } ?>
</body>
</html>