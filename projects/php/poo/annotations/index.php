<?php

require 'addendum/annotations.php';
require 'MyAnnotations.php';
require 'Personnage.php';

$reflectedClass = new ReflectionAnnotatedClass('Personnage');

// Retourne la valeur d'une annotation
echo "La valeur de l'annotation <strong>Table</strong> est <strong>";
echo $reflectedClass->getAnnotation('Table')->value;
echo "</strong>";

// Retourne la valuer d'une annotation sous forme de tableau
echo "<pre>";
print_r($reflectedClass->getAnnotation('Type')->value);
echo "</pre>";

// Savoir si une classe possède une annotation
$ann = 'Table';

if ($reflectedClass->hasAnnotation($ann)) {
  echo "La classe possède une annotation <strong>" . $ann . "</strong> dont la valeur est <strong>";
  echo $reflectedClass->getAnnotation($ann)->value;
  echo "</strong>";
}

// Récupérer des attributs d'une classe
echo "<h3>Attributs</h3>";
echo "<p>" . $reflectedClass->getAnnotation('ClassInfos')->author . "<br/>";
echo $reflectedClass->getAnnotation('ClassInfos')->version . "</p>";

// Récupérer des annotations d'attributs et méthodes d'une classe
$reflectedAttr = new ReflectionAnnotatedProperty('Personnage', 'force');
$reflectedMethod = new ReflectionAnnotatedMethod('Personnage', 'deplacer');

echo "Infos concernant l'attribut :";
var_dump($reflectedAttr->getAnnotation('AttrInfos'));
echo "<br/>";

echo "Infos concernant les paramètres de la méthode :";
var_dump($reflectedMethod->getAllAnnotations('ParamInfo'));
echo "<br/>";

echo "Infos concernant la méthode :";
var_dump($reflectedMethod->getAnnotation('MethodInfos'));