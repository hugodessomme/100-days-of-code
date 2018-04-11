<?php

class A {
  public function hello($arg1, $arg2, $arg3 = 1, $arg4 = 'Hello World!')
  {
    var_dump($arg1, $arg2, $arg3, $arg4);
  }
}

// Instanciation directe
$method = new ReflectionMethod('A', 'hello');

// Ou récupération d'une méthode d'une classe
$classA = new A;
$classRA = new ReflectionClass('A');
$method = $classRA->getMethod('hello');

// Savoir si une méthode est publique / protégée / privée
echo 'La méthode ' . $method->getName() . ' est ';
if ($method->isPublic()) {
  echo 'publique';
}
elseif ($method->isProtected()) {
  echo 'proétégée';
}
else {
  echo 'privée';
}

// Savoir su une méthode est statique / finale / abstraite
if ($method->isStatic()) {
  echo '(méthode statique)';
}
if ($method->isFinal()) {
  echo '(méthode finale)';
}
if ($method->isAbstract()) {
  echo '(méthode abstraite)';
}

// Savoir si la méthode est le constructeur / destructeur
if ($method->isConstructor()) {
  echo 'La méthode ' . $method->getName() . ' est le constructeur';
}
elseif ($method->isDestructor()) {
  echo 'La méthode ' . $method->getName() . ' est le destructeur';
}

// Appeler une méthode sur un objet
$method->invoke($classA, 'test', 'autre test');
$method->invokeArgs($classA, ['test', 'autre test']); // Idem mais on passe les arguments dans un tableau