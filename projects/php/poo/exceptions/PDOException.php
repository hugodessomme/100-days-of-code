<?php

try {
  $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'admin');
  echo "Connexion réussie !";
}
catch (PDOException $e) {
  echo "La connexion a échoué<br/>";
  echo "Informations : [" . $e->getCode() ."] " . $e->getMessage();
}