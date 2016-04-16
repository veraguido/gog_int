<?php
namespace gog;
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/15/16
 * Time: 9:42 PM
 */
class LoadAppService
{
    public function init(){
        //read config file
        $config = Config::getInstance();
        $minNumber = $config->numbers->min;
        $maxNumber = $config->numbers->max;

        // REGULAR BASKETS
        $regularBaskets = $config->regular_baskets->amount;
        $regularMaxSize = $config->regular_baskets->size;

        //USER BASKETS
        $userBaskets = $config->user_baskets->amount;
        $userMaxSize = $config->user_baskets->size;

        for($i = 0; $i<$regularBaskets; $i++) {
            $regularBasket = BasketHelper::buildRegularBasket($regularMaxSize, $minNumber, $maxNumber);
            $regularBasket->setIndex($i);
            BasketManager::getInstance()->addBasket($regularBasket);
        }

        for($k = 0; $k<$userBaskets; $k++) {
            $userBasket = BasketHelper::buildUserBasket($userMaxSize, $minNumber, $maxNumber);
            $userBasket->setIndex($k);
            BasketManager::getInstance()->addBasket($userBasket, true);
        }
    }
}