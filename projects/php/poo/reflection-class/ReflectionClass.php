<?php

function autoload($class) {
  require $class . '.php';
}
spl_autoload_register('autoload');

$magicien = new Magicien(['nom' => 'vyk12', 'type' => 'magicien']);
$classMagicien = new ReflectionObject($magicien);
$interfaceMagicien = new ReflectionClass('iMagicien');

// Savoir si la classe possède un attribut
if ($classMagicien->hasProperty('magie')) {
  echo 'L\'attribut $magie existe';
} else {
  echo 'L\'attribut $magie n\'existe pas';
}

// Savoir si la classe possède une méthode
if ($classMagicien->hasMethod('lancerUnSort')) {
  echo 'La méthode lancerUnSort() existe';
} else {
  echo 'La méthode lancerUnSort() n\'existe pas';
}

// Savoir la classe possède une constante
if ($classMagicien->hasConstant('NOUVEAU')) {
  echo 'La constante NOUVEAU existe';
} else {
  echo 'La constante NOUVEAU n\'existe pas';
}

// Récupérer la valeur d'une constante / toutes les constantes
if ($classMagicien->hasConstant('CEST_MOI')) {
  echo 'La constante CEST_MOI existe et vaut : ' . $classMagicien->getConstant('CEST_MOI') . '<br/>';
  echo 'Autres constantes disponibles :';
  echo '<pre>' . print_r($classMagicien->getConstants(), true) . '</pre>';
} else {
  echo 'La constante NOUVEAU n\'existe pas';
}

// Récupérer la classe parente
if ($parent = $classMagicien->getParentClass()) {
  echo 'La classe Magicien a un parent nommé : ' . $parent->getName();
} else {
  echo 'La classe Magicien n\'a pas de parent';
}

// Vérifier si la classe passée en paramètre est la classe parente
if ($classMagicien->isSubclassOf('Personnage')) {
  echo 'La classe Magicien a pour parent la classe Personnage';
} else {
  echo 'La classe Magicien n\'a pas pour parent la classe Personnage';
}

// Savoir si la classe est abstraite
$classPersonnage = new ReflectionClass('Personnage');

if ($classPersonnage->isAbstract()) {
  echo 'La classe Personnage est abstraite';
} else {
  echo 'La classe Personnage n\'est pas abstraite';
}

// Savoir si la classe est finale
if ($classPersonnage->isFinal()) {
  echo 'La classe Personnage est finale';
} else {
  echo 'La classe Personnage n\'est pas finale';
}

// Savoir si la classe est instanciable
if ($classPersonnage->isInstantiable()) {
  echo 'La classe Personnage est instanciable';
} else {
  echo 'La classe Personnage n\'est pas instanciable';
}

// Savoir s'il s'agit bien d'une interface
if ($interfaceMagicien->isInterface()) {
  echo "iMagicien est bien une interface";
} else {
  echo "iMagicien n\'est pas une interface";
}

// Savoir si une classe implémente une interface
if ($classMagicien->implementsInterface('iMagicien')) {
  echo "La classe Magicien implémente l'interface iMagicien";
} else {
  echo "La classe Magicien n\'implémente pas l'interface iMagicien";
}

// Récupérer les interfaces implémentées
echo '<pre>' . print_r($classMagicien->getInterfaces(), true) . '</pre>';
echo '<pre>' . print_r($classMagicien->getInterfaceNames(), true) . '</pre>';