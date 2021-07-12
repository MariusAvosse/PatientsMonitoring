<?php

namespace App\Entity;

use App\Repository\CapteursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CapteursRepository::class)
 */
class Capteurs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $temperatureAmbiante;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $humidite;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $mouvement;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $temperatureCorporelle;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $rythmeCardiaque;

    /**
     * @ORM\ManyToOne(targetEntity=Patients::class, inversedBy="idCapteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patients;


    public function getTemperatureAmbiante(): ?float
    {
        return $this->temperatureAmbiante;
    }

    public function setTemperatureAmbiante(?float $temperatureAmbiante): self
    {
        $this->temperatureAmbiante = $temperatureAmbiante;

        return $this;
    }

    public function getHumidite(): ?float
    {
        return $this->humidite;
    }

    public function setHumidite(?float $humidite): self
    {
        $this->humidite = $humidite;

        return $this;
    }

    public function getMouvement(): ?float
    {
        return $this->mouvement;
    }

    public function setMouvement(?float $mouvement): self
    {
        $this->mouvement = $mouvement;

        return $this;
    }

    public function getTemperatureCorporelle(): ?float
    {
        return $this->temperatureCorporelle;
    }

    public function setTemperatureCorporelle(?float $temperatureCorporelle): self
    {
        $this->temperatureCorporelle = $temperatureCorporelle;

        return $this;
    }

    public function getRythmeCardiaque(): ?float
    {
        return $this->rythmeCardiaque;
    }

    public function setRythmeCardiaque(?float $rythmeCardiaque): self
    {
        $this->rythmeCardiaque = $rythmeCardiaque;

        return $this;
    }

    public function getPatients(): ?Patients
    {
        return $this->patients;
    }

    public function setPatients(?Patients $patients): self
    {
        $this->patients = $patients;

        return $this;
    }

}
