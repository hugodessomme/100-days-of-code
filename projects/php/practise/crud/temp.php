<?php

function autoload($class) {
  require $class . '.php';
}
spl_autoload_register('autoload');

$db = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
$manager = new TaskManager($db);