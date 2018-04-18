<?php

class DBFactory {
  public static function load($sgdbr)
  {
    $classe = 'SGDBR_' . $sgdbr;

    if (file_exists($path = $classe . '.class.php'))
    {
      require $path;
      return new $classe;
    }
    else {
      throw new RuntimeException('La classe <strong>' . $classe . '</strong> n\'a pu être trouve !');
    }
  }
}

try {
  $mysql = DBFactory::load('MySQL');
}
catch (RuntimeException $e) {
  echo $e->getMessage();
}

// Par exemple, on pourrait vouloir centraliser les différentes connexions à des SGBDR différents
// On regroupera alors ces actions dans une classe Factory
class PDOFactory {
  public static function getMysqlConnexion()
  {
    $db = new PDO('mysql:host=localhost;dbname=tests', 'root', ''),
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
  }

  public static function getPgsqlConnexion()
  {
    $db = new PDO('pgsql:host=localhost;dbname=tests', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
  }
}