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
    private $index;

    protected $balls = array();

    public function __construct($size, $amountToFill) {
        $this->size = $size;
        $this->amountToFill = $amountToFill;
    }

    /**
     * @param Ball $ball
     * @return void or exception
     */
    abstract function put(Ball $ball);

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

    public function getIndex() {
        return $this->index;
    }

    public function setIndex($index) {
        $this->index = $index;
    }

}