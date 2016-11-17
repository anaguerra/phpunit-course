<?php

Class example4Test extends \PHPUnit\Framework\TestCase 
{

    public static function setUpBeforeClass()
    {
        var_dump( __METHOD__ );
    }

    public function testOne()
    {
        var_dump( __METHOD__ );
    }
        
    public function testTwo()
    {
        var_dump( __METHOD__ );
    }

    public static function tearDownAfterClass()
    {
        var_dump( __METHOD__ );
    }
}
