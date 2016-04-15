<?php
namespace gog;
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/14/16
 * Time: 7:28 PM
 */
class Ball
{
    private $number;


    public function __construct($number) {
        $this->number = $number;
    }

    public function getNumber(){
        return $this->number;
    }
}