<?php

namespace CalMenescal\MainBundle\DataFixtures\ORM;

use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class Users.
 */
class Users implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $us = new User();
        $us
            ->setUsername('dummy')
            ->setPlainPassword('dummy')
            ->setEmail('dummy@dummy.com')
            ->setEnabled(true)
            ->setSuperAdmin(true)
        ;

        $manager->persist($us);

        $manager->flush();
    }
}
