<?php

namespace GlobeSoft\DamOSansaViitoruluiBundle\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContentControllerTest extends WebTestCase {

    public function testProjectTitleIsSet() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/home');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Dăm o Șansă Viitorului")')->count(),
            "I was expecting the title of the project to contain Dăm o Șansă Viitorului"
        );
    }

    public function testAllStaticPagesAreAccessible() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/home');

        $pagesToCheck = array(
            '/home' => 'Acasă',
            '/therapy' => 'Terapie',
            '/therapy/aba' => 'Terapie Aba',
            '/dissability' => 'Dizabilități',
            '/dissability/autism' => 'Autism',
            '/partners' => 'Parteneri',
            '/Contact' => 'Contact'
        );

        foreach ($pagesToCheck as $pageRoute => $expectedTitle) {
            $this->checkIfPageIsAccessible($client, $crawler, $pageRoute, $expectedTitle);
        }
    }

    protected function checkIfPageIsAccessible($client, $crawler, $nameOfPageToVisit, $assertionTitle) {
        $crawler = $client->request('GET', $nameOfPageToVisit);

        $this->assertGreaterThan(
            0,
            $crawler->filter('title:contains(' . $assertionTitle .')')->count(),
            "I was expecting the title of ${nameOfPageToVisit} to contain ${assertionTitle}"
        );
    }
}