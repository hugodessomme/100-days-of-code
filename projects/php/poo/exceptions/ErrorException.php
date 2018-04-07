<?php

class MonException extends ErrorException {
  public function __toString()
  {
    switch ($this->severity) {
      case E_USER_ERROR: // Erreur fatale
        $type = 'Erreur fatale';
        break;

      case E_WARNING: // Si PHP émet une alerte
      case E_USER_WARNING: // Si l'utilisateur émet une alerte
        $type = 'Attention';
        break;

      case E_NOTICE: // Si PHP émet une notice
      case E_USER_NOTICE: // Si l'utilisateur émet une notice
        $type = 'Note';
        break;

      default:
        $type = 'Erreur inconnue';
        break;
    }

    return '<strong>' . $type . '</strong> : [' . $this->code . '] ' . $this->message . '<br/><strong>' . $this->file . '</strong> à la ligne <strong>' . $this->line . '</strong>';
  }
}

function error2exception($code, $message, $file, $line) {
  throw new MonException($message, 0, $code, $file, $line);
}

function customException($e) {
  echo 'Ligne ' . $e->getLine() . ' dans ' . $e->getFile() . '<br/><strong>Exception lancée : ' . $e->getMessage();
}

set_error_handler('error2exception');
set_exception_handler('customException');