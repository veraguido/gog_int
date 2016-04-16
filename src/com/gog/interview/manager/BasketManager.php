<?php

namespace gog;
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/14/16
 * Time: 7:40 PM
 */
class BasketManager
{
    private static $instance;
    private $baskets = array();
    private $userBaskets= array();

    protected function __construct() {
        //since is a singleton this cannot be called
    }

    public static function getInstance() {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    public function addBasket(Basket $basket, $isUserBasket = false){
        if($isUserBasket) {
            if(count($this->userBaskets) >= Config::getInstance()->user_baskets->amount)
                throw new BasketManagerFullException();

            array_push($this->userBaskets, $basket);
        } else {
            if (count($this->baskets) >= Config::getInstance()->regular_baskets->amount)
                throw new BasketManagerFullException();

            array_push($this->baskets, $basket);
        }
    }

    public function getRegularBaskets(){
        return $this->baskets;
    }

    public function getUSerBaskets(){
        return $this->userBaskets;
    }

    public function getUserOnlyBaskets($concreteCount = null) {
        $returnBaskets = array();

        foreach ($this->baskets as $basket) {
            $ballCount = 0;
            foreach($basket->getBalls() as $ball){
                if ($this->checkIfBallIsPresentInUserBasket($ball)) {
                    $ballCount++;
                }
            }

            $countToCompare = $basket->getAmount();
            if($concreteCount != null) {
                $countToCompare = $concreteCount;
            }

            if ($ballCount == $countToCompare) {
                $returnBaskets[] = $basket;
            }
        }
        return $returnBaskets;
    }

    public function findOnlyOneUserBallBaskets(){
        return $this->getUserOnlyBaskets(1);
    }

    private function checkIfBallIsPresentInUserBasket($ball) {
        $returnValue = false;
        foreach ($this->userBaskets as $userBasket) {
            if ($userBasket->isBallPresent($ball)) {
                $returnValue = true;
                break;
            }
        }
        return $returnValue;
    }
}