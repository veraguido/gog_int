<?php
namespace gog;
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/15/16
 * Time: 7:47 PM
 */
class BasketFullException extends \Exception
{
    public function __construct($className){
        parent::__construct("The ". $className. " is full, you shouldn't try to add new balls to it");
    }
}