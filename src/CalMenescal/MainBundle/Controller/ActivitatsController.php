<?php

namespace CalMenescal\MainBundle\Controller;

use Flux\PageBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ActivitatsController.
 */
class ActivitatsController extends Controller
{
    /**
     * @return Response
     */
    public function activitatsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagines = $em->getRepository('FluxProductBundle:ActivityCategory')->getActiveItemsSortedByPosition();

        return $this->render('MainBundle:Activitats:activitats.html.twig', array(
            'pagines' => $pagines,
        ));
    }

    /**
     * @param string $title
     *
     * @return Response
     */
    public function detallAction($title)
    {
        $em = $this->getDoctrine()->getManager();
        $pagines = $em->getRepository('FluxProductBundle:ActivityCategory')->getActiveItemsSortedByPosition();
        $paginaSeleccionada = null;

        /** @var Page $pagina */
        foreach ($pagines as $pagina) {
            if ($pagina->titleSlug() == $title) {
                $paginaSeleccionada = $pagina;

                break;
            }
        }

        $activitats = $em->getRepository('FluxProductBundle:Activity')->getSortedActiveItemsOfCategory($paginaSeleccionada);
        $currentLocale = $paginaSeleccionada->getLocale();
        $paginaSeleccionada->setLocale('ca');
        $em->refresh($paginaSeleccionada);
        $slugTitleCA = $paginaSeleccionada->titleSlug();
        $paginaSeleccionada->setLocale('es');
        $em->refresh($paginaSeleccionada);
        $slugTitleES = $paginaSeleccionada->titleSlug();
        $paginaSeleccionada->setLocale('en');
        $em->refresh($paginaSeleccionada);
        $slugTitleEN = $paginaSeleccionada->titleSlug();
        $paginaSeleccionada->setLocale($currentLocale);
        $em->refresh($paginaSeleccionada);

        return $this->render('MainBundle:Activitats:detall.html.twig', array(
            'paginaSeleccionada' => $paginaSeleccionada,
            'slugTitleCA' => $slugTitleCA,
            'slugTitleES' => $slugTitleES,
            'slugTitleEN' => $slugTitleEN,
            'activitats' => $activitats,
        ));
    }
}
