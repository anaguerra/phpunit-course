<?php

namespace Class1\Tests;

use Class1\Person;
use Class1\Repairment;
use Class1\Car;


Class class1Test extends \PHPUnit_Framework_TestCase
{

    /**
     * First of all we are going to test that we as person can exist 
     */
    public function testPersonExists()
    {
        $person = new Person();
        if ( $person instanceof Person ){
            return $this->assertTrue( true );
          
        }
        $this->assertTrue( false );
    }

    /**
     *  
     */
    public function testRepairmentClassExists()
    {
        $repairment = new Repairment();
        if ( $repairment instanceof Repairment ){
            return $this->assertTrue( true );
          
        }
        $this->assertTrue( false );
    }

    /**
     *  
     */
    public function testCarClassExists()
    {
        $car = new Car();
        if ( $car instanceof Car ){
            return $this->assertTrue( true );
          
        }
        $this->assertTrue( false );
    }

    /**
     * @depends testRepairmentClassExists 
     */
    public function testMethodPullOutTyreExistsOnRepairment()
    {
        $repairment = new Repairment();
        if ( in_array( 'pullOutTyre', get_class_methods( $repairment ) ) ){
            return $this->assertTrue( true );
        }
        $this->assertTrue( false );        
    }

    /**
     * @depends testMethodPullOutTyreExistsOnRepairment
     */
    public function testPullOutTyreTakesCarsOnly()
    {
        $reflection = new \ReflectionClass( 'Class1\Repairment' );
        $reflectionMethod = $reflection->getMethod( 'pullOutTyre' );
        $parameters = $reflectionMethod->getParameters();
        
        if( $parameters[0]->getClass()->name === 'Class1\Car' ){
            return $this->assertTrue( true );
        }
        $this->assertTrue( false );
       
    } 
} 
