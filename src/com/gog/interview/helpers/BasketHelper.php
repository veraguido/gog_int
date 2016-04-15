<?php
namespace gog;
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/14/16
 * Time: 9:52 PM
 */
class BasketHelper
{
    public static function buildRegularBasket($size, $minNumber, $maxNumber){

        $fill = rand(1, $size);
        $basket = new RegularBasket($size, $fill);

        while ($fill != 0) {
            $basket->put(self::getNewBall($minNumber, $maxNumber, $basket));
            $fill--;
        }

        return $basket;

    }


    public static function buildUserBasket($size, $minNumber, $maxNumber){

        $fill = rand(1, $size);
        $basket = new UserBasket($size, $fill);

        while ($fill != 0) {
            $basket->put(self::getNewBall($minNumber, $maxNumber, $basket));
            $fill--;
        }

        return $basket;

    }

    private static function getNewBall($minNumber, $maxNumber, Basket $basket) {

        $returnBall = new Ball(rand($minNumber, $maxNumber));
        if ($basket->isBallPresent($returnBall)) {
            $returnBall = self::getNewBall(rand($minNumber, $maxNumber), $maxNumber, $basket);
        }

        return $returnBall;
    }
}