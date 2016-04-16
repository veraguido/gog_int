<?php
namespace gog;
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/15/16
 * Time: 11:22 PM
 */
class RegularBasketTest extends \PHPUnit_Framework_TestCase
{
    public function testPut() {

        $regularBasket = new RegularBasket(3, 2);

        $regularBasket->put(new Ball(1));
        $regularBasket->put(new Ball(2));

        $this->assertEquals(count($regularBasket->getBalls()), 2);

    }

    /**
     * @expectedException gog\BasketFullException
     */
    public function testException(){
        $regularBasket = new RegularBasket(3, 2);
        $regularBasket->put(new Ball(1));
        $regularBasket->put(new Ball(2));
        $regularBasket->put(new Ball(3));

    }
}