<?php $titre = 'Mon Blog'; ?>

<?php ob_start(); ?>
<?php foreach ($billets as $billet): ?>
    <article>
        <header>
            <h1 class="titreBillet">
                <a href="index.php?action=billet&amp;<?= "id=".$billet['id'] ?>">
                    <?= $billet['titre'] ?>
                </a>
            </h1>
            <time><?= $billet['date'] ?></time>
        </header>
        <p><?= $billet['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
