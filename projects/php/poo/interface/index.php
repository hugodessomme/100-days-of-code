<?php

class Me implements SeekableIterator {
  private $position = 0;
  private $tableau = ['1er élément', '2ème élément', '3ème élément'];

  /* Retourne l'élément courant du tableau */
  public function current()
  {
    return $this->tableau[$this->position];
  }

  /* Retourne la clé actuelle (idem à la position dans notre cas) */
  public function key()
  {
    return $this->position;
  }

  /* Déplace le curseur vers l'élément suivant */
  public function next()
  {
    $this->position++;
  }

  /* Remet la position du curseur à 0 */
  public function rewind()
  {
    $this->position = 0;
  }

  /* Permet de tester si la position actuelle est valide */
  public function valid()
  {
    return isset($this->tableau[$this->position]);
  }

  /* Déplace le curseur interne */
  public function seek($position)
  {
    $initialPosition = $this->position;
    $this->position = $position;

    if (!$this->valid())
    {
      trigger_error('La position spécifiée n\'est pas valide', E_USER_WARNING);
      $this->position = $initialPosition;
    }
  }
}

$a = new Me;

foreach ($a as $key => $value) {
  echo $key . " => " . $value . "<br/>";
}

$a->seek(1);
echo $a->current();