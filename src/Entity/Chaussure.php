<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChaussureRepository")
 */
class Chaussure
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marques;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Taille", mappedBy="chaussure" ,cascade={"persist"})
     */
    private $tailles;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Couleur", inversedBy="Chaussure" ,cascade={"persist"})
     */
    private $couleurs;

    public function __construct()
    {
        $this->tailles = new ArrayCollection();
        $this->couleurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection|Taille[]
     */
    public function getTailles(): Collection
    {
        return $this->tailles;
    }

    public function addTaille(Taille $taille): self
    {
        if (!$this->tailles->contains($taille)) {
            $this->tailles[] = $taille;
            $taille->setChaussure($this);
        }

        return $this;
    }

    public function removeTaille(Taille $taille): self
    {
        if ($this->tailles->contains($taille)) {
            $this->tailles->removeElement($taille);
            // set the owning side to null (unless already changed)
            if ($taille->getChaussure() === $this) {
                $taille->setChaussure(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Couleur[]
     */
    public function getCouleurs(): Collection
    {
        return $this->couleurs;
    }

    public function addCouleur(Couleur $couleur): self
    {
        if (!$this->couleurs->contains($couleur)) {
            $this->couleurs[] = $couleur;
            $couleur->addChaussure($this);
        }

        return $this;
    }

    public function removeCouleur(Couleur $couleur): self
    {
        if ($this->couleurs->contains($couleur)) {
            $this->couleurs->removeElement($couleur);
            $couleur->removeChaussure($this);
        }

        return $this;
    }
}
