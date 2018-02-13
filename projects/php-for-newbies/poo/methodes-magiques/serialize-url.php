<?php

  $arrayOrNot = unserialize(urldecode($_GET['data']));
  echo "<pre>";
  print_r($arrayOrNot);
  echo "</pre>";