<?php
namespace gog;
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/14/16
 * Time: 7:33 PM
 */

class RegularBasket extends Basket implements IBasket
{
    private $size;

    public function __construct($size, $amount) {
        parent::__construct($size, $amount);
    }

    public function put(Ball $ball)
    {
        array_push($this->balls, $ball);
    }

    /*public function isBallPresent(Ball $ball)
    {
        $returnValue = false;
        foreach ($this->balls as $addedBall) {
            if ($addedBall->getNumber() == $ball->getNumber()){
                $returnValue = true;
                break;
            }
        }

        return $returnValue;
    }*/

    public function getUserBallsAmount()
    {
        return count($this->balls);
    }

    public function getSize()
    {
        return $this->size;
    }
}