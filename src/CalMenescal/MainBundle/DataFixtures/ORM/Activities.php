<?php

namespace CalMenescal\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Flux\ProductBundle\Entity\ActivityCategory;
use Flux\ProductBundle\Entity\Translation\ActivityCategoryTranslation;
use Flux\ProductBundle\Entity\Activity;

/**
 * Class Activities.
 */
class Activities implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $ac = new ActivityCategory();
        $ac->setCode('00B-001');
        $ac->setTitle('Visites');
        $ac->setSummary('Podeu visitar el nostre celler i també les nostres vinyes.');
        $ac->setImage1('visites.png');
        $ac->setPosition(1);
        $ac->setIsActive(true);

        $translation = new ActivityCategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('Visitas');
        $ac->addTranslation($translation);
        $translation = new ActivityCategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('Puede visitar nuestra bodega y también nuestros viñedos.');
        $ac->addTranslation($translation);

        $translation = new ActivityCategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('Visits');
        $ac->addTranslation($translation);
        $translation = new ActivityCategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('You can also visit our winery and our vineyards.');
        $ac->addTranslation($translation);

        $manager->persist($ac);

        $activitat = new Activity();
        $activitat->setCategory($ac);
        $activitat->setCode('VIS-001');
        $activitat->setTitle('Títol activitat 1');
        $activitat->setDescription("Text llarg de descripció sobre l'activitat 1");
        $activitat->setConditions("Text llarg de condicions sobre l'activitat 1");
        $activitat->setIsPermanent(true);
        $activitat->setPosition(1);
        $activitat->setIsActive(true);

        $manager->persist($activitat);

        $activitat = new Activity();
        $activitat->setCategory($ac);
        $activitat->setCode('VIS-002');
        $activitat->setTitle('Títol activitat 2');
        $activitat->setDescription("Text llarg de descripció sobre l'activitat 2");
        $activitat->setConditions("Text llarg de condicions sobre l'activitat 2");
        $activitat->setIsPermanent(true);
        $activitat->setPosition(2);
        $activitat->setIsActive(true);

        $manager->persist($activitat);

        ////////////////

        $ac = new ActivityCategory();
        $ac->setCode('00B-002');
        $ac->setTitle('Tast de vins');
        $ac->setSummary('Vols tastar els nostres vins?');
        $ac->setImage1('tastdevins.png');
        $ac->setPosition(2);
        $ac->setIsActive(true);

        $translation = new ActivityCategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('Cata de vinos');
        $ac->addTranslation($translation);
        $translation = new ActivityCategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('¿Quieres probar nuestros vinos?');
        $ac->addTranslation($translation);

        $translation = new ActivityCategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('Wine tasting');
        $ac->addTranslation($translation);
        $translation = new ActivityCategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('Want to try our wines?');
        $ac->addTranslation($translation);

        $manager->persist($ac);

        $activitat = new Activity();
        $activitat->setCategory($ac);
        $activitat->setCode('TAS-001');
        $activitat->setTitle('Títol activitat 3');
        $activitat->setDescription("Text llarg de descripció sobre l'activitat 3");
        $activitat->setConditions("Text llarg de condicions sobre l'activitat 3");
        $activitat->setIsPermanent(true);
        $activitat->setPosition(1);
        $activitat->setIsActive(true);

        $manager->persist($activitat);

        ////////////////

        $ac = new ActivityCategory();
        $ac->setCode('00B-003');
        $ac->setTitle('La verema');
        $ac->setSummary('Viu de primera ma la collita del raïm.');
        $ac->setImage1('laverema.png');
        $ac->setPosition(3);
        $ac->setIsActive(true);

        $translation = new ActivityCategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('La vendimia');
        $ac->addTranslation($translation);
        $translation = new ActivityCategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('Vive de primera mano la cosecha de la uva.');
        $ac->addTranslation($translation);

        $translation = new ActivityCategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('Vintage');
        $ac->addTranslation($translation);
        $translation = new ActivityCategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('Experience firsthand the grape harvest.');
        $ac->addTranslation($translation);

        $manager->persist($ac);

        $manager->flush();
    }
}
