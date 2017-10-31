<?php

namespace CalMenescal\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Client;

/**
 * Class BackendControllerTest.
 */
class BackendControllerTest extends WebTestCase
{
    /**
     * Test page is successful.
     *
     * @param string $url
     *
     * @dataProvider provideUrls
     */
    public function testPagesAreSuccessful($url)
    {
        $client = $this->getAdminClient();
        $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    /**
     * Get admin client.
     *
     * @return Client
     */
    private function getAdminClient()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin/login');
        $form = $crawler->selectButton('Entra')->form(
            array(
                '_username' => 'dummy',
                '_password' => 'dummy',
            )
        );
        $client->submit($form);

        return $client;
    }

    /**
     * Urls provider.
     *
     * @return array
     */
    public function provideUrls()
    {
        return array(
            array('/admin/dashboard'),
            array('/admin/page/list'),
            array('/admin/page/create'),
            array('/admin/page/1/edit'),
            array('/admin/wine/list'),
            array('/admin/wine/create'),
            array('/admin/wine/1/edit'),
            array('/admin/wine/category/list'),
            array('/admin/wine/category/create'),
            array('/admin/wine/category/1/edit'),
            array('/admin/activity/list'),
            array('/admin/activity/create'),
            array('/admin/activity/1/edit'),
            array('/admin/activity/category/list'),
            array('/admin/activity/category/create'),
            array('/admin/activity/category/1/edit'),
        );
    }
}
