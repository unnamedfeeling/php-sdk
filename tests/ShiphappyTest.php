<?php
 
use Fetchr\Shiphappy\Shiphappy;
 
class ShiphappyTest extends PHPUnit_Framework_TestCase {
 
  public function testgetBulkStatus()
  {
    $shiphappy = new Shiphappy('apifulfilment', 'apifulfilment');
    $shiphappy->getBulkStatus( array('1606109430583', '1610199431176') );
  }
 
}