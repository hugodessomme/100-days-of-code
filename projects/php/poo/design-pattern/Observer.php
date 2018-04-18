<?php

class Observee implements SplSubject {
  protected $observers = []; // Tableau de tous les objets nous observant
  protected $nom; // Dès que cet attribut change, on notifie les classes observatrices

  public function attach(SplObserver $observer)
  {
    $this->observers[] = $observer;
  }

  public function detach(SplObserver $observer)
  {
    if (is_int($key = array_search($observer, $this->observers, true)))
    {
      unset($this->observers[$key]);
    }
  }

  public function notify()
  {
    foreach ($this->observers as $observer)
    {
      $observer->update($this);
    }
  }

  public function getNom()
  {
    return $this->nom;
  }

  public function setNom($nom)
  {
    $this->nom = $nom;
    $this->notify();
  }
}

class Observer1 implements SplObserver {
  public function update(SplSubject $obj)
  {
    echo 'Observer1 a été notifié ! Nouvelle valeur de l\'attribut <strong>nom</strong> : ' . $obj->getNom();
  }
}

class Observer2 implements SplObserver {
  public function update(SplSubject $obj)
  {
    echo 'Observer2 a été notifié ! Nouvelle valeur de l\'attribut <strong>nom</strong> : ' . $obj->getNom();
  }
}

$o = new Observee;
$o->attach(new Observer1); // Ajout d'un observateur
$o->attach(new Observer2); // Ajout d'un autre observateur
$o->setNom('Victor'); // On modifie le nom pour voir si les classes observatrices sont bien notifiées