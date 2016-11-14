<?php 


Class example3Test extends \PHPUnit\Framework\TestCase 
{

    public function testCanCreateDir()
    {
        $dir = mkdir( dirname( __FILE__ ).'/newDirectory' );
        $this->assertTrue( $dir );
    }

    public function testCanCreateDirWithPermissions()
    {
        $dir = mkdir( dirname( __FILE__ ).'/newDirectory', 0775 );
        $this->assertTrue( $dir );
    }
}
