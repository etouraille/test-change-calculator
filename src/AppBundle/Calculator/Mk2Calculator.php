<?php

namespace AppBundle\Calculator;

use AppBundle\Model\Change;

class Mk2Calculator extends Calculator implements CalculatorInterface {

  public function __construct() {
    parent::__construct( ['coin1']);
  }

  public function getSupportedModel(): string {
    return 'mk2';
  }
}
