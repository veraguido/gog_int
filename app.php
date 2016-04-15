<?php
require_once 'vendor/autoload.php';

use gog\BasketManager;
use gog\BasketHelper;

/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/14/16
 * Time: 7:21 PM
 */


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//read config file
$config = parse_ini_file('config.ini', true);

$minNumber = $config['numbers']['min'];
$maxNumber = $config['numbers']['max'];


//initialize app

// REGULAR BASKETS
$regularBaskets = (int) $config['regular_baskets']['amount'];
$regularMaxSize = $config['regular_baskets']['size'];

for($i = 0; $i<$regularBaskets; $i++) {
    $regularBasket = BasketHelper::buildRegularBasket($regularMaxSize, $minNumber, $maxNumber);
    BasketManager::getInstance()->addBasket($regularBasket);
}

//USER BASKETS
$userBaskets = (int) $config['user_baskets']['amount'];
$userMaxSize = $config['user_baskets']['size'];

for($k = 0; $k<$userBaskets; $k++) {
    $userBasket = BasketHelper::buildUserBasket($userMaxSize, $minNumber, $maxNumber);
    BasketManager::getInstance()->addBasket($userBasket, true);
}

$userOnlyBaskets = BasketManager::getInstance()->getUserOnlyBaskets();
var_dump(count($userOnlyBaskets));

$userOnlyOneBallBaskets = BasketManager::getInstance()->findOnlyOneUserBallBasket();
var_dump(count($userOnlyOneBallBaskets));



