<?php
namespace gog;
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/14/16
 * Time: 7:34 PM
 */
class UserBasket extends Basket implements IBasket
{

    public function put(Ball $ball)
    {
        if ($this->checkForFill())
            throw new Exception("UserBasket is fill, you shouldn't try to add a new ball.");

        array_push($this->balls, $ball);
    }

    public function getUserBallsAmount()
    {
        return count($this->balls);
    }
}