<?php

namespace CalMenescal\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\SwiftmailerBundle;
use CalMenescal\MainBundle\Form\ContactoType;

class ContacteController extends Controller
{
    public function contacteAction()
    {
        $logger = $this->get('logger');
        $formulario = $this->createForm(new ContactoType());
        if ($this->getRequest()->isMethod('POST')) {
            $logger->debug('[' . __CLASS__ . '/' . __METHOD__ . '] Request POST form');
            $formulario->bind($this->getRequest());
            if ($formulario->isValid()) {
                $logger->debug('[' . __CLASS__ . '/' . __METHOD__ . '] Valid form');
                $message = \Swift_Message::newInstance()
                    ->setSubject('Formulari de contacte pàgina web www.cellermenescal.com')
                    ->setFrom(array('info@cellermenescal.com' => 'Webrobot cellermenescal.com'))
                    ->setTo(array('info@cellermenescal.com' => 'Webrobot cellermenescal.com'))
                    ->setBody($this->renderView('MainBundle:Contacte:email.html.twig', array('formulario' => $formulario->getData()), 'text/html'))
                    ->setCharset('UTF-8')
                    ->setContentType('text/html')
                ;
                $this->get('mailer')->send($message);
                return $this->redirect($this->generateUrl('thankyou_'.$this->getRequest()->getLocale()));
            } else {
                $logger->debug('[' . __CLASS__ . '/' . __METHOD__ . '] ERROR: invalid form!');
            }
        } else {
            $logger->debug('[' . __CLASS__ . '/' . __METHOD__ . '] Request GET');
        }
        return $this->render('MainBundle:Contacte:contacte.html.twig', array(
            'formulario' => $formulario->createView()
        ));
    }

    public function thankyouAction()
    {
        return $this->render('MainBundle:Contacte:thankyou.html.twig');
    }
}
