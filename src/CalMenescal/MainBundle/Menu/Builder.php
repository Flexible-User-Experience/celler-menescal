<?php

namespace CalMenescal\MainBundle\Menu;

use Doctrine\ORM\EntityManager;
use Flux\PageBundle\Entity\Page;
use Flux\ProductBundle\Entity\Category;
use Flux\ProductBundle\Entity\Product;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

/**
 * Class Builder
 */
class Builder
{
    const STORE_URI = 'http://botiga.cellermenescal.com';

    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var AuthorizationChecker
     */
    private $ac;

    /**
     * @var TokenStorageInterface
     */
    private $ts;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * Methods
     */

    /**
     * @param FactoryInterface $factory
     * @param AuthorizationChecker $ac
     * @param TokenStorageInterface $ts
     * @param EntityManager $em
     */
    public function __construct(FactoryInterface $factory, AuthorizationChecker $ac, TokenStorageInterface $ts, EntityManager $em)
    {
        $this->factory = $factory;
        $this->ac      = $ac;
        $this->ts      = $ts;
        $this->em      = $em;
    }

    /**
     * @param RequestStack $requestStack
     *
     * @return ItemInterface
     */
    public function main_ca_Menu(RequestStack $requestStack)
    {
        $em = $this->em;
        $menu = $this->factory->createItem('root');
        $route = $requestStack->getCurrentRequest()->get('_route');
//        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('cal menescal', array('route' => 'calmenescal_ca'));
        $pagines = $em->getRepository('FluxPageBundle:Page')->getActiveItemsSortedByPositionWithStartCode('00A');
        /** @var Page $pagina */
        foreach ($pagines as $pagina) {
            $pagina->setLocale('ca'); //$em->refresh($pagina);
            $menu['cal menescal']->addChild($pagina->getTitle(), array(
                'route' => 'calmenescal_detail_ca',
                'routeParameters' => array('title' => $pagina->titleSlug())
            ));
        }
        $menu->addChild('vins', array('label' => 'els vins', 'route' => 'elsvins_ca'));
        $categories = $em->getRepository('FluxProductBundle:Category')->getActiveItemsSortedByPosition();
        /** @var Category $category */
        foreach ($categories as $category) {
            $category->setLocale('ca'); //$em->refresh($category);
            $menu['vins']->addChild($category->getId(), array(
                'label' => $category->getTitle(),
                'route' => 'elsvins_level1_ca',
                'routeParameters' => array('title' => $category->titleSlug())
            ));
            $vins = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsOfCategory($category);
            /** @var Product $vi */
            foreach ($vins as $vi) {
                $vi->setLocale('ca'); //$em->refresh($category);
                $menu['vins'][$category->getId()]->addChild($vi->getId(), array(
                    'label' => $vi->getName(),
                    'route' => 'elsvins_level2_ca',
                    'routeParameters' => array('title' => $category->titleSlug(), 'wine' => $vi->getSlug())
                ));
            }
        }
        $menu->addChild('activitats', array('label' => 'enoturisme', 'route' => 'activitats_ca'));
        $pagines = $em->getRepository('FluxProductBundle:ActivityCategory')->getActiveItemsSortedByPosition();
        /** @var Page $pagina */
        foreach ($pagines as $pagina) {
            $pagina->setLocale('ca'); //$em->refresh($pagina);
            $menu['activitats']->addChild($pagina->getTitle(), array(
                'route' => 'activitats_detail_ca',
                'routeParameters' => array('title' => $pagina->titleSlug())
            ));
        }
        $menu->addChild('contacte', array('route' => 'contacte_ca'));
        $menu->addChild('botiga', array('uri' => self::STORE_URI));

        return $menu;
    }

    /**
     * @param RequestStack $requestStack
     *
     * @return ItemInterface
     */
    public function main_es_Menu(RequestStack $requestStack)
    {
        $em = $this->em;
        $menu = $this->factory->createItem('root');
        $route = $requestStack->getCurrentRequest()->get('_route');
//        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('cal menescal', array('route' => 'calmenescal_es'));
        $pagines = $em->getRepository('FluxPageBundle:Page')->getActiveItemsSortedByPositionWithStartCode('00A');
        /** @var Page $pagina */
        foreach ($pagines as $pagina) {
            $pagina->setLocale('es'); //$em->refresh($pagina);
            $menu['cal menescal']->addChild($pagina->getTitle(), array(
                'route' => 'calmenescal_detail_es',
                'routeParameters' => array('title' => $pagina->titleSlug())
            ));
        }
        $menu->addChild('vins', array('label' => 'los vinos', 'route' => 'elsvins_es'));
        $categories = $em->getRepository('FluxProductBundle:Category')->getActiveItemsSortedByPosition();
        /** @var Category $category */
        foreach ($categories as $category) {
            $category->setLocale('es'); //$em->refresh($category);
            $menu['vins']->addChild($category->getId(), array(
                'label' => $category->getTitle(),
                'route' => 'elsvins_level1_es',
                'routeParameters' => array('title' => $category->titleSlug())
            ));
            $vins = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsOfCategory($category);
            /** @var Product $vi */
            foreach ($vins as $vi) {
                $vi->setLocale('es'); //$em->refresh($category);
                $menu['vins'][$category->getId()]->addChild($vi->getId(), array(
                    'label' => $vi->getName(),
                    'route' => 'elsvins_level2_es',
                    'routeParameters' => array('title' => $category->titleSlug(), 'wine' => $vi->getSlug())
                ));
            }
        }
        $menu->addChild('activitats', array('label' => 'enoturismo', 'route' => 'activitats_es'));
        $pagines = $em->getRepository('FluxProductBundle:ActivityCategory')->getActiveItemsSortedByPosition();
        /** @var Page $pagina */
        foreach ($pagines as $pagina) {
            $pagina->setLocale('es'); //$em->refresh($pagina);
            $menu['activitats']->addChild($pagina->getTitle(), array(
                'route' => 'activitats_detail_es',
                'routeParameters' => array('title' => $pagina->titleSlug())
            ));
        }
        $menu->addChild('contacto', array('route' => 'contacte_es'));
        $menu->addChild('tienda', array('uri' => self::STORE_URI));

        return $menu;
    }

    /**
     * @param RequestStack $requestStack
     *
     * @return ItemInterface
     */
    public function main_en_Menu(RequestStack $requestStack)
    {
        $em = $this->em;
        $menu = $this->factory->createItem('root');
        $route = $requestStack->getCurrentRequest()->get('_route');
//        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('cal menescal', array('route' => 'calmenescal_en'));
        $pagines = $em->getRepository('FluxPageBundle:Page')->getActiveItemsSortedByPositionWithStartCode('00A');
        /** @var Page $pagina */
        foreach ($pagines as $pagina) {
            $pagina->setLocale('en'); //$em->refresh($pagina);
            $menu['cal menescal']->addChild($pagina->getTitle(), array(
                'route' => 'calmenescal_detail_en',
                'routeParameters' => array('title' => $pagina->titleSlug())
            ));
        }
        $menu->addChild('vins', array('label' => 'the wines', 'route' => 'elsvins_en'));
        $categories = $em->getRepository('FluxProductBundle:Category')->getActiveItemsSortedByPosition();
        /** @var Category $category */
        foreach ($categories as $category) {
            $category->setLocale('en'); //$em->refresh($category);
            $menu['vins']->addChild($category->getId(), array(
                'label' => $category->getTitle(),
                'route' => 'elsvins_level1_en',
                'routeParameters' => array('title' => $category->titleSlug())
            ));
            $vins = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsOfCategory($category);
            /** @var Product $vi */
            foreach ($vins as $vi) {
                $vi->setLocale('en'); //$em->refresh($category);
                $menu['vins'][$category->getId()]->addChild($vi->getId(), array(
                    'label' => $vi->getName(),
                    'route' => 'elsvins_level2_en',
                    'routeParameters' => array('title' => $category->titleSlug(), 'wine' => $vi->getSlug())
                ));
            }
        }
        $menu->addChild('activitats', array('label' => 'enotourism', 'route' => 'activitats_en'));
        $pagines = $em->getRepository('FluxProductBundle:ActivityCategory')->getActiveItemsSortedByPosition();
        /** @var Page $pagina */
        foreach ($pagines as $pagina) {
            $pagina->setLocale('en'); //$em->refresh($pagina);
            $menu['activitats']->addChild($pagina->getTitle(), array(
                'route' => 'activitats_detail_en',
                'routeParameters' => array('title' => $pagina->titleSlug())
            ));
        }
        $menu->addChild('contact', array('route' => 'contacte_en'));
        $menu->addChild('store', array('uri' => self::STORE_URI));

        return $menu;
    }
}
