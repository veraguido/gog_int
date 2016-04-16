<?php
namespace gog;
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/15/16
 * Time: 7:48 PM
 */
class BasketManagerFullException extends \Exception
{
    public function __construct() {
        parent::__construct("BasketManager's storage is full, you shouldn't add new baskets to that storage.");
    }
}