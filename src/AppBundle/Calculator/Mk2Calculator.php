<?php

namespace AppBundle\Calculator;

use AppBundle\Model\Change;

class Mk2Calculator implements CalculatorInterface {

  public function getSupportedModel(): string {
    return 'mk2';
  }

  /**
   * @param int $amount The amount of money to turn into change
   *
   * @return Change|null The change, or null if the operation is impossible
   */
  public function getChange(int $amount): ? Change {
    $params = Change::params;
    unset($params['coin1']);

    $reste = $amount;
    $change = new Change;
    foreach( $params as $changeAttribut => $denominateur ) {
      $change->$changeAttribut = (int) floor( $reste / $denominateur );
      $reste = $reste % $denominateur;
    }
    return $change->getAmount() == $amount ? $change : null;
  }
}
