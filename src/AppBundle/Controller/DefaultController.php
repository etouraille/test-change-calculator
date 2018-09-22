<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Registry\CalculatorRegistry as Registry;

class DefaultController extends Controller
{

  /**
   * @Route("/automaton/{model}/change/{value}", name="change_route")
   */
  public function change( $model, $value )
  {

    $calculator = Registry::getCalculatorFor($model);

    if(null === $calculator) {
      return new Response(null,404);
    }

    $change = $calculator->getChange((int) $value);
    if(null === $change ) {
      return new Response('',204);
    } else {
      dump(json_encode($change));
      return new Response(json_encode($change), 200);
    }
  }
}
