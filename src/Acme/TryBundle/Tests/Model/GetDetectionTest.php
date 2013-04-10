<?php
namespace Acme\TryBundle\Tests\Model;

use Acme\TryBundle\Model\GetDetection;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
	public function testHtmlget()
	{
		$test = new GetDetection("http://localhost/data/hanyi1/TQI.html");
		
		$data = $test->count();
// 		$data = str_replace(array("/r/n", "/r", "/n"), "", $data);
//		$data= str_replace(PHP_EOL, '', $data);
		
		$this->assertEquals(816,$data);

	}
}