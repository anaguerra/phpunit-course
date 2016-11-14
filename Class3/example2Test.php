<?php 

Class example2Test extends \PHPUnit\Framework\TestCase 
{

    public $flag = "Not Affected";

    public function setUp()
    {
        $this->flag = "Affected";
    }


    public function testSettingTheflagToAffected()
    {
        $this->assertEquals( $this->flag, "Affected");
    }

    public function testGettingTheflag()
    {
        $this->assertEquals( $this->flag, "Affected");
    }
    
}
