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

    public static function renderUserBaskets(){
        $regularBasketIndex = 0;

        foreach(BasketManager::getInstance()->getUserBaskets() as $basket) {
            echo " <h3> USER BASKET #: " . $regularBasketIndex . "</h3>" . "\n";
            self::renderBasket($basket);
            $regularBasketIndex++;
        }
    }

    public static function renderRegularBaskets(){
        $regularBasketIndex = 0;

        foreach(BasketManager::getInstance()->getRegularBaskets() as $basket) {
            echo " <h3> REGULAR BASKET #: " . $regularBasketIndex . "</h3>" . "\n";
            self::renderBasket($basket);
            $regularBasketIndex++;
        }
    }

    public static function renderBasket(Basket $basket) {
        echo "Balls <br />";
        foreach($basket->getBalls() as $ball) {
            echo " # " . $ball->getNumber();
        }
    }

    private static function getNewBall($minNumber, $maxNumber, Basket $basket) {

        $returnBall = new Ball(rand($minNumber, $maxNumber));
        if ($basket->isBallPresent($returnBall)) {
            $returnBall = self::getNewBall(rand($minNumber, $maxNumber), $maxNumber, $basket);
        }

        return $returnBall;
    }

}