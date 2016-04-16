<?php
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/16/16
 * Time: 12:14 AM
 */
namespace gog;


class BasketManagerTest extends \PHPUnit_Framework_TestCase
{

    public function testBasketManager(){
        $loadService = new LoadAppService();
        $loadService->init();

        $bm = BasketManager::getInstance();
        $regularBaskets = $bm->getRegularBaskets();

        $randomBasket = $regularBaskets[rand(0, count($regularBaskets)-1)];
        $this->assertLessThanOrEqual($randomBasket->getSize(), $randomBasket->getAmount());
    }

    /**
     * @expectedException gog\BasketManagerFullException
     */
    public function testExceptions(){
        $loadService = new LoadAppService();
        $loadService->init();

        $bm = BasketManager::getInstance();
        $basket = new RegularBasket(10, 4);
        $bm->addBasket($basket);
    }

}