<?php

namespace App\DataFixtures;

use App\Entity\Couleur;
use App\Entity\Chaussure;
use App\Entity\Region;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ColorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i <= 10; $i++) {
            $couleur = new Couleur();
            $couleur->setCouleur('couleur '.$i);
            $this->addReference('couleur'.$i, $couleur);

            $manager->persist($couleur);
        }
        $manager->flush();

    }
}
