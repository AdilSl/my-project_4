<?php
namespace App\DataFixtures;

use App\Entity\Colaborateur;
use App\Entity\Tache;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TacheColaborateurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $tache = new Tache();
            $tache->setTitre('titre ' . $i);
            $manager->persist($tache);
            $this->setReference('tache ' . $i,$tache);
            $manager->flush();
        }

        for ($i = 0; $i < 5; $i++) {
            $colaborateur = new Colaborateur();
            $colaborateur->setNom('colaborateur ' . $i);
            $colaborateur->setFonction('developpeur ' . $i);
            $manager->persist($colaborateur);
            $colaborateur->addTach($this->getReference('tache ' . $i));
            $manager->flush();
        }
    }

}
