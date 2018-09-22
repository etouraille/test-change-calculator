<?php

declare(strict_types=1);

namespace AppBundle\Registry;

use AppBundle\Calculator\Mk1Calculator;
use AppBundle\Calculator\Mk2Calculator;
use AppBundle\Calculator\CalculatorInterface;

class CalculatorRegistry implements CalculatorRegistryInterface
{

    private static $calculators = [];
    private static $instance = null;

    private function __construct() {
      self::$calculators = [
        'mk1' => new Mk1Calculator(),
        'mk2' => new MK2Calculator(),
      ];
    }

    public static function create() {
      if(!isset(self::$instance)) {
        self::$instance = new CalculatorRegistry();
      }
    }

    /**
     * @param string $model Indicates the model of automaton
     *
     * @return CalculatorInterface|null The calculator, or null if no CalculatorInterface supports that model
     */
     public function getCalculatorFor(string $model) : ?CalculatorInterface {
        self::create();
        return isset(self::$calculators[$model])?self::$calculators[$model]:null;

    }
}
