<?php

namespace Acme\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserManageControllerTest extends WebTestCase
{
	public function testIndex()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/admin/createuser');

		$this->assertTrue($crawler->filter('html:contains("tr")')->count() > 0);
	}
}
