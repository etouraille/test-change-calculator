<?php

namespace AppBundle\Calculator;

use AppBundle\Model\Change;

class Calculator {

  // param is an array of removed dividentes.
  public function __construct( Array $params ) {
    $this->params = $params;
  }

  public function getChange(int $amount): ? Change {

    $params = $this->unsetUnavailableChange();
    $reste = $amount;
    $change = new Change;
    foreach( $params as $changeAttribut => $denominateur ) {
      $change->$changeAttribut = (int) floor( $reste / $denominateur );
      $reste = $reste % $denominateur;
    }
    return $change->getAmount() == $amount ? $change : null;
  }

  private function unsetUnavailableChange() {
    $params = Change::params;
    foreach($this->params as $elem ) {
      unset($params[$elem]);
    }
    return $params;
    //return array_diff_key(Change::params, array_flip($this->params));
  }
}
