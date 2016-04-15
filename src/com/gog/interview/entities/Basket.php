<?php
namespace gog;
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/14/16
 * Time: 7:38 PM
 */
abstract class Basket
{
    private $size;
    private $amountToFill;

    protected $balls = array();

    public function __construct($size, $amountToFill) {
        $this->size = $size;
        $this->amountToFill = $amountToFill;
    }

    public function getAmount(){
        return $this->amountToFill;
    }


    public function getSize(){
        return $this->size;
    }

    public function isBallPresent(Ball $ball) {
        $returnValue = false;
        foreach ($this->balls as $addedBall) {
            if ($addedBall->getNumber() == $ball->getNumber()){

                $returnValue = true;
                break;
            }
        }

        return $returnValue;
    }

    public function checkForFill(){
        return count($this->balls) == $this->amountToFill;
    }

    public function getBalls() {
        return $this->balls;
    }

}