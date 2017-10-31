<?php

namespace CalMenescal\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class FrontendControllerTest.
 */
class FrontendControllerTest extends WebTestCase
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
        $client = static::createClient();
        $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    /**
     * Urls provider.
     *
     * @return array
     */
    public function provideUrls()
    {
        return array(
            array('/'),
            array('/ca'),
            array('/es'),
            array('/en'),
            array('/ca/inici'),
            array('/es/inicio'),
            array('/en/home'),
            array('/ca/inici/el-celler'),
            array('/ca/inici/les-vinyes'),
            array('/ca/inici/la-terra-alta'),
            array('/ca/inici/la-historia'),
            array('/ca/inici/la-casa-museu'),
            array('/ca/els-vins'),
            array('/es/los-vinos'),
            array('/en/the-wines'),
            array('/ca/vi/negres/vall-del-pou'),
            array('/ca/vi/negres/mas-del-menescal'),
            array('/ca/vi/negres/avus'),
            array('/ca/vi/blancs/vall-del-pou'),
            array('/ca/vi/blancs/mas-del-menescal'),
            array('/ca/vi/blancs/avus'),
            array('/ca/vi/dolcos/mistela'),
            array('/ca/vi/dolcos/avus'),
            array('/ca/vi/vermuts/vermut'),
            array('/ca/vi/rancis/merce-de-menescal'),
            array('/ca/vi/balsamics/balsam-de-vinagre'),
            array('/ca/enoturisme'),
            array('/es/enoturismo'),
            array('/en/enotourism'),
            array('/ca/enoturisme/visites'),
            array('/ca/enoturisme/tast-de-vins'),
            array('/ca/enoturisme/la-verema'),
            array('/ca/contacte'),
            array('/es/contacto'),
            array('/en/contact'),
            array('/ca/contacte/gracies'),
            array('/es/contacto/gracias'),
            array('/en/contact/thank-you'),
            array('/ca/credits'),
            array('/es/creditos'),
            array('/en/credits'),
            array('/ca/privacitat'),
            array('/es/privacidad'),
            array('/en/privacy'),
            array('/sitemap'),
        );
    }
}
