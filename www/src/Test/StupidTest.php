<?php
    
namespace src\Test;

/**
 * Stupid, idiotic test
 */
class StupidTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test is true is equal to true... of course it is, idiot!
     */
    public function testTrueisTrue()
    {
        $foo = true;
        $this->assertTrue($foo);
    }
}