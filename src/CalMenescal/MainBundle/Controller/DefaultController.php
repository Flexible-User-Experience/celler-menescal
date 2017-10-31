<?php

namespace CalMenescal\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CalMenescal\MainBundle\Menu\Builder;
use Knp\Menu\FactoryInterface;
use Knp\Menu\MenuFactory;

class DefaultController extends Controller
{
    public function homeAction()
    {
        return $this->render('MainBundle:Default:home.html.twig');
    }

    public function sitemapAction()
    {
        $logger = $this->get('logger');
        $em = $this->getDoctrine()->getManager();

        $urls = array();

        // TODO get Menu Builder
        /*$builder = new Builder();
        $menuCAitems = $builder->main_ca_Menu(new MenuFactory(), array());
        foreach ($menuCAitems as $item) {
            $logger->debug('[' . __CLASS__ . '/' . __METHOD__ . '] item : ' . $item);
        }*/

        $hostname = $this->getRequest()->getHost();
        array_push($urls, array('loc' => $this->get('router')->generate('inicial'), 'changefreq' => 'weekly', 'priority' => '1.0'));

        ///////////////// CA
        array_push($urls, array('loc' => $this->get('router')->generate('calmenescal_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxPageBundle:Page')->getActiveItemsSortedByPositionWithStartCode('00A') as $item) {
            $item->setLocale('ca'); $em->refresh($item);
            array_push($urls, array('loc' => $this->get('router')->generate('calmenescal_detail_ca',
                array('_locale' => 'ca', 'title' => $item->titleSlug())), 'changefreq' => 'weekly', 'priority' => '0.3'));
        }
        array_push($urls, array('loc' => $this->get('router')->generate('elsvins_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxProductBundle:Category')->getActiveItemsSortedByPosition() as $tipus) {
            $tipus->setLocale('ca'); $em->refresh($tipus);
            array_push($urls, array('loc' => $this->get('router')->generate('elsvins_level1_ca',
                array('_locale' => 'ca', 'title' => $tipus->titleSlug())), 'changefreq' => 'weekly', 'priority' => '0.3'));
            foreach ($em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsOfCategory($tipus) as $vi) {
                $vi->setLocale('ca'); $em->refresh($vi);
                array_push($urls, array('loc' => $this->get('router')->generate('elsvins_level2_ca',
                    array('_locale' => 'ca', 'title' => $tipus->titleSlug(), 'wine' => $vi->getSlug())), 'changefreq' => 'weekly', 'priority' => '0.2'));
            }
        }
        array_push($urls, array('loc' => $this->get('router')->generate('activitats_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxProductBundle:ActivityCategory')->getActiveItemsSortedByPosition() as $categoria) {
            $categoria->setLocale('ca'); $em->refresh($categoria);
            array_push($urls, array('loc' => $this->get('router')->generate('activitats_detail_ca', array('_locale' => 'ca', 'title' => $categoria->titleSlug())), 'changefreq' => 'weekly', 'priority' => '0.3'));
        }
        array_push($urls, array('loc' => $this->get('router')->generate('contacte_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('credits_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('privacitat_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));




        ///////////////// ES
        array_push($urls, array('loc' => $this->get('router')->generate('calmenescal_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxPageBundle:Page')->getActiveItemsSortedByPositionWithStartCode('00A') as $item) {
            $item->setLocale('es'); $em->refresh($item);
            array_push($urls, array('loc' => $this->get('router')->generate('calmenescal_detail_es',
                array('_locale' => 'es', 'title' => $item->titleSlug())), 'changefreq' => 'weekly', 'priority' => '0.3'));
        }
        array_push($urls, array('loc' => $this->get('router')->generate('elsvins_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxProductBundle:Category')->getActiveItemsSortedByPosition() as $tipus) {
            $tipus->setLocale('es'); $em->refresh($tipus);
            array_push($urls, array('loc' => $this->get('router')->generate('elsvins_level1_es',
                array('_locale' => 'es', 'title' => $tipus->titleSlug())), 'changefreq' => 'weekly', 'priority' => '0.3'));
            foreach ($em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsOfCategory($tipus) as $vi) {
                $vi->setLocale('es'); $em->refresh($vi);
                array_push($urls, array('loc' => $this->get('router')->generate('elsvins_level2_es',
                    array('_locale' => 'es', 'title' => $tipus->titleSlug(), 'wine' => $vi->getSlug())), 'changefreq' => 'weekly', 'priority' => '0.2'));
            }
        }
        array_push($urls, array('loc' => $this->get('router')->generate('activitats_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxProductBundle:ActivityCategory')->getActiveItemsSortedByPosition() as $categoria) {
            $categoria->setLocale('es'); $em->refresh($categoria);
            array_push($urls, array('loc' => $this->get('router')->generate('activitats_detail_es', array('_locale' => 'es', 'title' => $categoria->titleSlug())), 'changefreq' => 'weekly', 'priority' => '0.3'));
        }
        array_push($urls, array('loc' => $this->get('router')->generate('contacte_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('credits_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('privacitat_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));




        ///////////////// EN
        array_push($urls, array('loc' => $this->get('router')->generate('calmenescal_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxPageBundle:Page')->getActiveItemsSortedByPositionWithStartCode('00A') as $item) {
            $item->setLocale('en'); $em->refresh($item);
            array_push($urls, array('loc' => $this->get('router')->generate('calmenescal_detail_en',
                array('_locale' => 'en', 'title' => $item->titleSlug())), 'changefreq' => 'weekly', 'priority' => '0.3'));
        }
        array_push($urls, array('loc' => $this->get('router')->generate('elsvins_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxProductBundle:Category')->getActiveItemsSortedByPosition() as $tipus) {
            $tipus->setLocale('en'); $em->refresh($tipus);
            array_push($urls, array('loc' => $this->get('router')->generate('elsvins_level1_en',
                array('_locale' => 'en', 'title' => $tipus->titleSlug())), 'changefreq' => 'weekly', 'priority' => '0.3'));
            foreach ($em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsOfCategory($tipus) as $vi) {
                $vi->setLocale('en'); $em->refresh($vi);
                array_push($urls, array('loc' => $this->get('router')->generate('elsvins_level2_en',
                    array('_locale' => 'en', 'title' => $tipus->titleSlug(), 'wine' => $vi->getSlug())), 'changefreq' => 'weekly', 'priority' => '0.2'));
            }
        }
        array_push($urls, array('loc' => $this->get('router')->generate('activitats_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxProductBundle:ActivityCategory')->getActiveItemsSortedByPosition() as $categoria) {
            $categoria->setLocale('en'); $em->refresh($categoria);
            array_push($urls, array('loc' => $this->get('router')->generate('activitats_detail_en', array('_locale' => 'en', 'title' => $categoria->titleSlug())), 'changefreq' => 'weekly', 'priority' => '0.3'));
        }
        array_push($urls, array('loc' => $this->get('router')->generate('contacte_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('credits_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('privacitat_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));

        return $this->render('MainBundle:Global:sitemap.xml.twig', array(
            'urls' => $urls,
            'hostname' => $hostname,
        ));
    }
}
