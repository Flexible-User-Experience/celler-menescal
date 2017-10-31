<?php

namespace CalMenescal\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Flux\PageBundle\Entity\Page;
use Flux\PageBundle\Entity\Translation\PageTranslation;

/**
 * Class PagesAddOns.
 */
class PagesAddOns implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $page = new Page();
        $page->setCode('INS-0PR');
        $page->setTitle('Privacitat');
        $page->setText1("<p>En compliment del que estableix la Llei Orgànica 15/1999 de la legislació espanyola de 13 de desembre sobre la Protecció de Dades de Caràcter Personal (LOPD), i el seu corresponent R.D. 1720/2007, li comuniquem que les seves dades personals passaran a formar part d'un fitxer propietat de Celler Cal Menescal, degudament registrat a l'Agència Espanyola de Protecció de Dades amb l'única finalitat de poder oferir-li els nostres serveis.<br/></p>
<p>Per exercir el seu dret d'accés, rectificació, cancel·lació i oposició posi's en contacte amb nosaltres a través de l'adreça de correu electrònic <a href='mailto:info@cellermenescal.com'>info@cellermenescal.com</a><br/></p>
<p>Celler Cal Menescal es compromet explícitament a mantenir confidencials totes les dades rebudes a través d'aquesta pàgina web. Aquestes dades podran ser tractades amb finalitats comercials però en cap cas podran ser destinades a altres finalitats ni seran entregades a tercers.<br/></p>
<h4>Al Celler Cal Menescal no ens agrada el spam i contribuïm a eradicar-lo</h4>");
        $page->setImage1('privacitat.png');
        $page->setPosition(1);
        $page->setIsActive(true);

        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('Privacidad');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('text1');
        $translation->setContent("<p>En cumplimiento del que establece la Ley Orgánica 15/1999 de la legislación Española de 13 de diciembre sobre la Protección de Datos de Carácter Personal (LOPD), y su correspondiente R.D. 1720/2007, le comunicamos que sus datos personales pasarán a formar parte de un fichero propiedad de Celler Cal Menescal, debidamente registrado a la Agencia Española de Protección de Datos con la única finalidad de poder ofrecerle nuestros servicios.<br/></p>
<p>Para ejercer su derecho de acceso, rectificación, cancelación y oposición póngase en contacto con nosotros a través de la dirección de correo electrónico <a href='mailto:info@cellermenescal.com'>info@cellermenescal.com</a><br/></p>
<p>Celler Cal Menescal se compromete explícitamente a mantener confidenciales todos los datos recibidos a través de esta página web. Estos datos podrán ser tratados con fines comerciales pero en ningún caso podrán ser destinados a otros fines ni serán entregados a terceros.<br/></p>
<h4>En Celler Cal Menescal no nos gusta el spam y contribuimos a erradicarlo</h4>");
        $page->addTranslation($translation);

        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('Privacy');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent("<p>In compliance with the provisions of Law 15/1999 of the Spanish law of 13 December on the Protection of Personal Data (LOPD) and its corresponding RD 1720/2007, we inform you that your personal data will become part of a file owned Celler Cal Menescal, duly registered with the Spanish Agency for Data Protection with the sole purpose of being able to offer our services.<br/></p>
<p>To exercise your right of access, rectification, cancellation and opposition contact us via email <a href='mailto:info@cellermenescal.com'>info@cellermenescal.com</a><br/></p>
<p>Celler Cal Menescal explicitly agrees to keep confidential all information received through this website. These data may be processed for commercial purposes but in no case may be used for other purposes and will not be passed to third parties.<br/></p>
<h4>In Celler Cal Mensecal do not like spam and contribute to eradicate</h4>");
        $page->addTranslation($translation);

        $manager->persist($page);

        ////////////////

        $page = new Page();
        $page->setCode('INS-1CR');
        $page->setTitle('Crèdits');
        $page->setText1("<p>Aquesta pàgina ha estat desenvolupada per <a href='http://www.flux.cat/'>Flux</a> amb el framework PHP Symfony2.</p>
        <p>El disseny gràfic ha estat realitzat per <a href='http://marcosjurado.com/'>Marcos Jurado</a>.</p>
        <p>Les fotografies del les ampolles de vi s'han fet gràcies al treball d'<a href='http://www.adanprincep.com/'>Adan Príncep</a>.</p>
        <p>Tots els drets reservats. © Celler Cal Menescal.</p>");
        $page->setImage1('credits.png');
        $page->setPosition(2);
        $page->setIsActive(true);

        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('Créditos');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('text1');
        $translation->setContent("<p>Esta página ha sido desarrollada por <a href='http://www.flux.cat/'>Flux</a> con el framework PHP Symfony2.</p>
        <p>El diseño gráfico ha sido realitzado por <a href='http://marcosjurado.com/'>Marcos Jurado</a>.</p>
        <p>Las fotografías del las botellas de vino se han hecho gracias al trabajo de <a href='http://www.adanprincep.com/'>Adan Príncep</a>.</p>
        <p>Todos los derechos reservados. © Celler Cal Menescal.</p>");
        $page->addTranslation($translation);

        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('Credits');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent("<p>This page has been developed by <a href='http://www.flux.cat/'>Flux</a> with the Symfony2 PHP framework.</p>
        <p>The artwork was done by <a href='http://marcosjurado.com/'>Marcos Jurado</a>.</p>
        <p>Photographs of the wine bottles were made available by work of <a href='http://www.adanprincep.com/'>Adan Príncep</a>.</p>
        <p>All rights reserved. © Celler Cal Menescal.</p>");
        $page->addTranslation($translation);

        $manager->persist($page);

        $manager->flush();
    }
}
