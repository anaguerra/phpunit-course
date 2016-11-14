<?php 

Class example1Test extends \PHPUnit\Framework\TestCase 
{

    public $flag = "Not Affected";

    public function testSettingTheflagToAffected()
    {
        $this->flag = "Affected";
        $this->assertEquals( $this->flag, "Affected");
    }

    public function testGettingTheflag()
    {
        $this->assertEquals( $this->flag, "Affected");
    }
    
}
