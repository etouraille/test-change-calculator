<?php

declare(strict_types=1);

namespace AppBundle\Model;

class Change
{
    /**
     * @var int
     */
    public $bill10 = 0;

    /**
     * @var int
     */
    public $bill5 = 0;

    /**
     * @var int
     */
    public $coin2 = 0;

    /**
     * @var int
     */
    public $coin1 = 0;

    const params = [
      'bill10' => 10,
      'bill5'  => 5,
      'coin2'  => 2,
      'coin1'  => 1,
    ];

    public function getAmount() {
      $ret = 0;
      foreach( self::params as $key => $value ) {
        $ret+= $this->$key * $value;
      }
      return $ret;
    }
}
