<?php

class MonException extends ErrorException {
  public function __construct($message, $code = 0)
  {
    parent::__construct($message, $code);
  }

  public function __toString()
  {
    return $this->message;
  }
}

function addition($a, $b) {
  if (!is_numeric($a) || !is_numeric($b))
  {
    throw new InvalidArgumentException('Les deux paramètres doivent être des nombres');
  }

  if (func_num_args() > 2)
  {
    throw new Exception('Pas plus de 2 paramètres pour la fonction');
  }

  return $a + $b;
}

try {
  echo addition(12, 3) . '<br/>';
  echo addition(4, 'coucou');
}
catch(MonException $e) {
  echo '[MonException] : ' .$e;
}
catch(InvalidArgumentException $e) {
  echo '[Exception] : ' . $e->getMessage();
}
echo "Fin du script";