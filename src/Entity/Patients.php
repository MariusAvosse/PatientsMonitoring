<?php

namespace App\Entity;

use App\Repository\PatientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientsRepository::class)
 */
class Patients
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=medecin::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idMedecin;

    /**
     * @ORM\OneToOne(targetEntity=lits::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idLit;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenoms;

    /**
     * @ORM\Column(type="integer")
     */
    private $numLit;

    /**
     * @ORM\OneToMany(targetEntity=capteurs::class, mappedBy="patients")
     */
    private $idCapteurs;

    public function __construct()
    {
        $this->idCapteurs = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMedecin(): ?medecin
    {
        return $this->idMedecin;
    }

    public function setIdMedecin(?medecin $idMedecin): self
    {
        $this->idMedecin = $idMedecin;

        return $this;
    }

    public function getIdLit(): ?lits
    {
        return $this->idLit;
    }

    public function setIdLit(lits $idLit): self
    {
        $this->idLit = $idLit;

        return $this;
    }


    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenoms(): ?string
    {
        return $this->prenoms;
    }

    public function setPrenoms(string $prenoms): self
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    public function getNumLit(): ?int
    {
        return $this->numLit;
    }

    public function setNumLit(int $numLit): self
    {
        $this->numLit = $numLit;

        return $this;
    }

    /**
     * @return Collection|capteurs[]
     */
    public function getIdCapteurs(): Collection
    {
        return $this->idCapteurs;
    }

    public function addIdCapteur(capteurs $idCapteur): self
    {
        if (!$this->idCapteurs->contains($idCapteur)) {
            $this->idCapteurs[] = $idCapteur;
            $idCapteur->setPatients($this);
        }

        return $this;
    }

    public function removeIdCapteur(capteurs $idCapteur): self
    {
        if ($this->idCapteurs->removeElement($idCapteur)) {
            // set the owning side to null (unless already changed)
            if ($idCapteur->getPatients() === $this) {
                $idCapteur->setPatients(null);
            }
        }

        return $this;
    }

}
