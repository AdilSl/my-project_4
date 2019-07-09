<?php

namespace App\DataFixtures;

use App\Entity\Couleur;
use App\Entity\Chaussure;
use App\Entity\Region;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ChaussurFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $chaussure = new Chaussure();
            $chaussure->setNom('chaussure '.$i);
            $chaussure->setDescription('description '.$i);
            $chaussure->setPrix(mt_rand(10, 100));
            $manager->persist($chaussure);
            $chaussure->addCouleur($this->getReference('couleur'.mt_rand(1, 5)));
            $chaussure->addCouleur($this->getReference('couleur'.mt_rand(6, 10)));
            $manager->flush();
        }

    }
    public function getDependencies()
    {
        return array(
            ColorFixtures::class
        );
    }
}
