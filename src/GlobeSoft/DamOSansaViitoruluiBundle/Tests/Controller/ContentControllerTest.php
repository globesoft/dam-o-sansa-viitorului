<?php

namespace GlobeSoft\DamOSansaViitoruluiBundle\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContentControllerTest extends WebTestCase {

    public function testProjectTitleIsSet() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/home');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Dăm O Șansă Viitorului")')->count()
        );
    }
}