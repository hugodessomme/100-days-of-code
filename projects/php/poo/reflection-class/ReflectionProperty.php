<?php

function autoload($class) {
  require $class . '.php';
}
spl_autoload_register('autoload');

$attributAtout = new ReflectionProperty('Magicien', 'atout');
$classMagicien = new ReflectionClass('Magicien');
$magicien = new Magicien(['nom' => 'vyk12', 'type' => 'magicien']);

// Récupérer un attribut
$classMagicien->getProperty('atout');

// Récupérer tous les attributs
echo '<pre>' . print_r($classMagicien->getProperties(), true) . '</pre>';

// Récupérer le nom et la valeur des attributs
foreach ($classMagicien->getProperties() as $attribut) {
  $attribut->setAccessible(true);
  echo '<pre>' . $attribut->getName() . '=>' . $attribut->getValue($magicien) . '</pre>';
}

// Savoir si un attribut est public / protégé / privé / statique
foreach ($classMagicien->getProperties() as $attribut) {
  echo $attribut->getName() . '=> est ';

  if ($attribut->isPublic()) {
    echo 'public<br/>';
  }
  elseif ($attribut->isProtected()) {
    echo 'protégé<br/>';
  }
  else {
    echo 'privé<br/>';
  }

  if ($attribut->isStatic()) {
    echo '(attribut statique)';
  }
}

class StaticClass {
  public static $attr1 = 'Hello';
  public static $attr2 = 'World';
}
$classStatic = new ReflectionClass('StaticClass');

// Comme un attribut statique n'est pas un attribut d'une instance mais d'une classe,
// on peut faire comme ça :
// echo $maClasse->getSaticPropertyValue('attr');
// $maClasse->setSaticPropertyValue('attr', 'Hello World!');

// Récupérer tous les attributs statiques
foreach ($classStatic->getStaticProperties() as $attr) {
  echo $attr;
}