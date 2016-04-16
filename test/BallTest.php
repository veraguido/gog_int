<?php
/**
 * Created by PhpStorm.
 * User: guido
 * Date: 4/16/16
 * Time: 2:21 PM
 */

namespace gog;


class BallTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException gog\InvalidBallNumberException
     */
    public function testThrowInvalidBallNumberException(){
        $ball = new Ball(123123123);
    }
}