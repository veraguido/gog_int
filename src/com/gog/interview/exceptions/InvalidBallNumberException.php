<?php
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/16/16
 * Time: 2:16 PM
 */

namespace gog;


class InvalidBallNumberException extends \Exception
{
    public function __construct() {
        parent::__construct("The ball number you entered is not valid, please check configuration file.");
    }
}