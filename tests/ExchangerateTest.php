<?php 
/**
*  Corresponding Class to test Exchangerate class.
*
*
*  @author Ricardo Madrigal <soporte@d3catalyst.com>
*/
class ExchangerateTest extends PHPUnit_Framework_TestCase{
	
  /**
  * Just check if the YourClass has no syntax error. 
  *
  */
  public function testIsThereAnySyntaxError(){
  	$var = new D3catalyst\Exchangerate\Exchangerate;
  	$this->assertTrue(is_object($var));
  	unset($var);
  }
  
  
  /**
  * Check if the Exchange Rate can retrieve currency info.
  *
  */
  public function testgetExchangeCurrency(){
  	$var = new D3catalyst\Exchangerate\Exchangerate;
    $var->setCurrency('USD','MXN');
  	$this->assertTrue(is_numeric($var->getExchangeValue()));
  	unset($var);
  }
  
}