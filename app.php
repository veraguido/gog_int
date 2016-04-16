<?php
require_once 'vendor/autoload.php';

use gog\BasketManager;
use gog\LoadAppService;
use gog\BasketHelper;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$errorMessage = null;

try {
    $loadAppService = new LoadAppService();
    $loadAppService->init();
    $bm = BasketManager::getInstance();

    //POINT B
    $userOnlyBaskets = $bm->getUserOnlyBaskets();

    //POINT C
    $userOnlyOneBallBaskets = $bm->findOnlyOneUserBallBaskets();
}catch (Exception $e){
    $errorMessage = $e->getMessage();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>gog.com interview</title>
</head>
<body>
    <?php if (isset($errorMessage)) {?>
    <b>Error message: <?= $errorMessage ?></b>
    <?php die; } ?>
    <p>
        Regular baskets amount: <?= count($bm->getRegularBaskets()) ?> <br />
        User baskets amount: <?= count($bm->getUserBaskets()) ?> <br />
        Basket indexes with only balls owned by the user: <?php BasketHelper::renderSpecificBaskets($userOnlyBaskets); ?> <br />
        Basket indexes with only ONE ball owned by the user: <?php BasketHelper::renderSpecificBaskets($userOnlyOneBallBaskets); ?> <br />
    </p>
    <div style="width: 100%">
        <h2>User baskets:</h2>
        <?php BasketHelper::renderUserBaskets() ?>
    </div>
    <div style="width:100%; ">

        <h2>Regular baskets:</h2>
        <?php BasketHelper::renderRegularBaskets() ?>
    </div>
</body>
</html>

