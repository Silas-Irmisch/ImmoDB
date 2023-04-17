<?php

namespace App\Entity;

use App\Repository\ImmobilieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImmobilieRepository::class)]
class Immobilie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Titel = null;

    #[ORM\Column(length: 255)]
    private ?string $Beschreibung = null;

    #[ORM\Column(length: 255)]
    private ?string $Ort = null;

    #[ORM\Column(length: 5)]
    private ?string $PLZ = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitel(): ?string
    {
        return $this->Titel;
    }

    public function setTitel(string $Titel): self
    {
        $this->Titel = $Titel;

        return $this;
    }

    public function getBeschreibung(): ?string
    {
        return $this->Beschreibung;
    }

    public function setBeschreibung(string $Beschreibung): self
    {
        $this->Beschreibung = $Beschreibung;

        return $this;
    }

    public function getOrt(): ?string
    {
        return $this->Ort;
    }

    public function setOrt(string $Ort): self
    {
        $this->Ort = $Ort;

        return $this;
    }

    public function getPLZ(): ?string
    {
        return $this->PLZ;
    }

    public function setPLZ(string $PLZ): self
    {
        $this->PLZ = $PLZ;

        return $this;
    }
}
