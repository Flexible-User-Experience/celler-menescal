<?php

namespace CalMenescal\MainBundle\Controller;

use Flux\ProductBundle\Entity\Category;
use Flux\ProductBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class VinsController.
 */
class VinsController extends Controller
{
    /**
     * @return Response
     */
    public function vinsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('FluxProductBundle:Category')->getActiveItemsSortedByPosition();

        return $this->render('MainBundle:Vins:vins.html.twig', array(
            'categories' => $categories,
        ));
    }

    /**
     * @param string $title
     *
     * @return RedirectResponse|Response
     */
    public function level1Action($title)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('FluxProductBundle:Category')->getActiveItemsSortedByPosition();
        $categoriaSeleccionada = null;
        /** @var Category $categoria */
        foreach ($categories as $categoria) {
            if ($categoria->titleSlug() == $title) {
                $categoriaSeleccionada = $categoria;
                break;
            }
        }
        if (!is_null($categoriaSeleccionada)) {
            /** @var Category $categoriaSeleccionada */
            $wines = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsFromCategoryCode($categoriaSeleccionada->getCode());
            if (count($wines) > 0) {
                /** @var Product $firstWine */
                $firstWine = $wines[0];

                return $this->redirect($this->generateUrl('elsvins_level2_'.$this->getRequest()->getLocale(), array(
                            'title' => $categoriaSeleccionada->titleSlug(),
                            'wine' => $firstWine->getSlug(),
                        )));
            }
        }
        $currentLocale = $categoriaSeleccionada->getLocale();
        $categoriaSeleccionada->setLocale('ca');
        $em->refresh($categoriaSeleccionada);
        $slugTitleCA = $categoriaSeleccionada->titleSlug();
        $categoriaSeleccionada->setLocale('es');
        $em->refresh($categoriaSeleccionada);
        $slugTitleES = $categoriaSeleccionada->titleSlug();
        $categoriaSeleccionada->setLocale('en');
        $em->refresh($categoriaSeleccionada);
        $slugTitleEN = $categoriaSeleccionada->titleSlug();
        $categoriaSeleccionada->setLocale($currentLocale);
        $em->refresh($categoriaSeleccionada);

        return $this->render('MainBundle:Vins:level1.html.twig', array(
            'categoriaSeleccionada' => $categoriaSeleccionada,
            'slugTitleCA' => $slugTitleCA,
            'slugTitleES' => $slugTitleES,
            'slugTitleEN' => $slugTitleEN,
        ));
    }

    /**
     * @param string $title
     * @param string $wine
     *
     * @return Response
     */
    public function level2Action($title, $wine)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('FluxProductBundle:Category')->getActiveItemsSortedByPosition();
        $categoriaSeleccionada = null;
        /** @var Category $categoria */
        foreach ($categories as $categoria) {
            if ($categoria->titleSlug() == $title) {
                $categoriaSeleccionada = $categoria;
                break;
            }
        }
        $vins = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsOfCategory($categoriaSeleccionada);
        $viSeleccionat = null;
        /** @var Product $vi */
        foreach ($vins as $vi) {
            if ($vi->getSlug() == $wine) {
                $viSeleccionat = $vi;
                break;
            }
        }
        $currentLocale = $categoriaSeleccionada->getLocale();
        $categoriaSeleccionada->setLocale('ca');
        $viSeleccionat->setLocale('ca');
        $em->refresh($categoriaSeleccionada);
        $slugTitleCA = $categoriaSeleccionada->titleSlug();
        $slugWineCA = $viSeleccionat->getSlug();
        $categoriaSeleccionada->setLocale('es');
        $viSeleccionat->setLocale('es');
        $em->refresh($categoriaSeleccionada);
        $slugTitleES = $categoriaSeleccionada->titleSlug();
        $slugWineES = $viSeleccionat->getSlug();
        $categoriaSeleccionada->setLocale('en');
        $viSeleccionat->setLocale('en');
        $em->refresh($categoriaSeleccionada);
        $slugTitleEN = $categoriaSeleccionada->titleSlug();
        $slugWineEN = $viSeleccionat->getSlug();
        $categoriaSeleccionada->setLocale($currentLocale);
        $em->refresh($categoriaSeleccionada);

        return $this->render('MainBundle:Vins:level2.html.twig', array(
            'categoriaSeleccionada' => $categoriaSeleccionada,
            'viSeleccionat' => $viSeleccionat,
            'slugTitleCA' => $slugTitleCA,
            'slugTitleES' => $slugTitleES,
            'slugTitleEN' => $slugTitleEN,
            'slugWineCA' => $slugWineCA,
            'slugWineES' => $slugWineES,
            'slugWineEN' => $slugWineEN,
        ));
    }
}
