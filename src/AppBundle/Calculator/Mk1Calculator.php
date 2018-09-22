<?php

namespace AppBundle\Calculator;

use AppBundle\Model\Change;

class Mk1Calculator extends Calculator implements CalculatorInterface {

  public function __construct() {
    parent::__construct(['bill10','bill5', 'coin2']);
  }

  public function getSupportedModel(): string {
    return 'mk1';
  }

}
