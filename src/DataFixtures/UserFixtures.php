<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('email');
        $user->setFullName('adilslassi');
        $user->setPassword(password_hash('adilslassi', PASSWORD_BCRYPT));
        $user->setUsername('adilslassi');
        $user->setRoles(["ROLE_USER"]);
        $manager->persist($user);
        $manager->flush();

    }
}
