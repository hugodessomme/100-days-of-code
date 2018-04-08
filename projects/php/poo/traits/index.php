<?php

// Définition d'un trait
trait HTMLFormater {
  // Méthode de trait
  public function formatHTML($text)
  {
    return '<p>Date : ' . date('d/m/Y') . '</p>' . "\n" .
           '<p>' . nl2br($text) . '</p>';
  }

  // Méthode identique dans 2 traits
  public function duplicate()
  {
    return "Bingo !";
  }
}

trait TextFormater {
  // Méthode de trait
  public function formatText($text)
  {
    return 'Date : ' . date('d/m/Y') . "\n" . $text;
  }

  // Méthode identique dans 2 traits
  public function duplicate()
  {
    return "Perdu...";
  }
}

trait Attribut {
  protected $hello = "Hello!";

  public function showAttr()
  {
    echo $this->hello;
  }
}

class Writer {
  // Inclusion du trait ce qui permet son utilisation dans la méthode
  use TextFormater;

  public function write($text)
  {
    file_put_contents('fichier.txt', $this->formatText($text));
  }
}

class Mailer {
  // Inclusions multiples de traits avec ajout d'une priorité en cas de méthodes dupliquées
  use HTMLFormater, TextFormater
  {
    HTMLFormater::duplicate insteadof TextFormater;
  }

  public function send($text)
  {
    mail('test@test.com', 'Test avec les traits', $this->formatHTML($text));
  }

  public function LoserOrWinner()
  {
    echo $this->duplicate();
  }
}

class WithAttribut {
  use Attribut;
}

$w = new Writer;
$w->write('Hello World!');

$m = new Mailer;
$m->LoserOrWinner();

$wa = new WithAttribut;
$wa->showAttr();

/*
/!\ IMPORTANT /!\

Une méthode définie dans une classe a plus de poids qu'un trait.
@link https://openclassrooms.com/courses/programmez-en-oriente-objet-en-php/les-traits-2#/id/r-1670622

Un trait a plus de poids qu'une méthode définie dans une classe mère.
@link https://openclassrooms.com/courses/programmez-en-oriente-objet-en-php/les-traits-2#/id/r-1670625

Si un attribut est défini dans un trait, alors une classe ne peut pas définir d'attribut possédant
le même nom.
@link https://openclassrooms.com/courses/programmez-en-oriente-objet-en-php/les-traits-2#/id/r-1670640

Un trait peut utiliser un autre trait.
@link https://openclassrooms.com/courses/programmez-en-oriente-objet-en-php/les-traits-2#/id/r-1670644

On peut changer la visibilité et le nom des méthodes d'un trait.
@link https://openclassrooms.com/courses/programmez-en-oriente-objet-en-php/les-traits-2#/id/r-1670648

On peut définir des méthodes abstraites dans les traits.
@link https://openclassrooms.com/courses/programmez-en-oriente-objet-en-php/les-traits-2#/id/r-1670653
*/