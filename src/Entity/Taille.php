<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TailleRepository")
 */
class Taille
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $taille;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Chaussure", inversedBy="tailles" )
     */
    private $chaussure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Region", inversedBy="tailles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(?int $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getChaussure(): ?Chaussure
    {
        return $this->chaussure;
    }

    public function setChaussure(?Chaussure $chaussure): self
    {
        $this->chaussure = $chaussure;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }
}
