<?php
namespace gog;
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/14/16
 * Time: 7:33 PM
 */

use BasketFullException;

class RegularBasket extends Basket
{
    private $size;

    public function __construct($size, $amount) {
        parent::__construct($size, $amount);
    }

    public function put(Ball $ball)
    {
        if ($this->checkForFill())
            throw new BasketFullException(get_class($this));

        array_push($this->balls, $ball);
    }

    public function getSize()
    {
        return $this->size;
    }
}