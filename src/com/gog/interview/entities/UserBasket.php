<?php
namespace gog;
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/14/16
 * Time: 7:34 PM
 */
class UserBasket extends Basket
{

    public function put(Ball $ball)
    {
        if ($this->checkForFill())
            throw new BasketFullException(get_class($this));

        array_push($this->balls, $ball);
    }
}