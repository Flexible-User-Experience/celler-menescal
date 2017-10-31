<?php

namespace CalMenescal\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InstruccionsController extends Controller
{
    public function creditsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => 'INS-1CR'));
        return $this->render('MainBundle:Instruccions:credits.html.twig', array(
            'pagina' => $pagina,
        ));
    }

    public function privacitatAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => 'INS-0PR'));
        return $this->render('MainBundle:Instruccions:privacitat.html.twig', array(
            'pagina' => $pagina,
        ));
    }
}
