<?php

  $array = array('truc' => 'machin', 'chose' => 8, 9 => 'youpie');
  $serialized = serialize($array);

  // Exemple 1 : Ecriture dans un fichier
  // $fh = fopen('serialize.txt', 'a+');
  // fwrite($fh, $serialized);
  // fclose($fh);

  // Exemple 2 : Dans l'URL
  // header('Location: serialize-url.php?data='.urlencode($serialized));
  // exit;

  // Exemple 3 : SQL
  // mysql_query("INSERT INTO matable VALUES(NULL, 'serialize', '".mysql_real_escape_string($serialized)."')") or die(mysql_error());

