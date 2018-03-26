<?php

class MagicalMethods
{
  private $tableau = [];
  private $attrPrive;

  public function __get($name)
  {
    if (isset($this->tableau[$name]))
    {
      return $this->tableau[$name];
    }
  }

  public function __set($name, $value)
  {
    $this->tableau[$name] = $value;
  }

  public function __isset($name)
  {
    return isset($this->tableau[$name]);
  }

  public function __unset($name)
  {
    if (isset($this->tableau[$name]))
    {
      unset($this->tableau[$name]);
    }
  }

  public function __call($method, $arguments)
  {
    echo nl2br("La méthode " . $method . "a été appelée mais n'existe pas ! Avec ces arguments : <strong>" . implode(', ', $arguments) . "</strong> \n");
  }

  public static function __callStatic($method, $arguments)
  {
    echo nl2br("La méthode statique " . $method . "a été appelée mais n'existe pas ! Avec ces arguments : <strong>" . implode(', ', $arguments) . "</strong> \n");
  }

  public function displayTableau()
  {
    echo "<pre>" . print_r($this->tableau, true) . "</pre>";
  }
}

$obj = new MagicalMethods;

/* __set */
$obj->attribut = 'Simple test';
$obj->attrPrive = 'Autres simple test';

/* __get */
echo $obj->attribut;
echo $obj->unknownAttr;

$obj->displayTableau();

/* __isset */
if (isset($obj->attribut))
{
  echo nl2br("L'attribut 'attribut' existe !");
}
else
{
  echo nl2br("L'attribut 'attribut' n'existe pas...\n");
}

/* __unset */
unset($obj->attribut); // L'attribut est supprimé

/* __call */
$obj->noMethod(123, "hey");

/* __callStatic */
MagicalMethods::noStaticMethod(123, "hey");