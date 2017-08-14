<?php

include_once('model/inscription/get_pseudos.php');
$pseudos = get_pseudos();

// Affiche la vue
include_once('view/inscription/index.php');