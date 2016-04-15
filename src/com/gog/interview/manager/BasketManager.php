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

    public function addBasket(IBasket $basket, $isUserBasket = false){
        if($isUserBasket) {

            if(count($this->userBaskets) > 1)
                throw new Exception("only one user basket is allowed, please check your config file");

            array_push($this->userBaskets, $basket);
        } else {
            array_push($this->baskets, $basket);
        }
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

    public function findOnlyOneUserBallBasket(){
        return $this->getUserOnlyBaskets(1);
    }

    private function checkIfBallIsPresentInUserBasket($ball) {
        $returnValue = true;
        foreach ($this->userBaskets as $userBasket) {
            if ($userBasket->isBallPresent($ball)) {
                $returnValue = false;
                continue;
            }
        }
        return $returnValue;
    }
}