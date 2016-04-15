<?php
namespace gog;

/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/14/16
 * Time: 7:26 PM
 */
interface IBasket
{
    public function put(Ball $ball);
    public function getUserBallsAmount();

}