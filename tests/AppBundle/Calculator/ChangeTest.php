<?php

namespace Tests\AppBundle\Calculator;

use AppBundle\Model\Change;
use PHPUnit\Framework\TestCase;

class ChangeTest extends TestCase
{



    public function test100() {
      $change = new Change;

      $change->bill10 = 10;
      $this->assertEquals(100, $change->getAmount());
    }


}
