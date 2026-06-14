<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "tatuaggio")]
class Tatuaggio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "decimal", precision: 8, scale: 2)]
    private float $costo;

    #[ORM\Column(type: "string", length: 100)]
    private string $posizione;

    #[ORM\Column(type: "string", length: 50)]
    private string $grandezza;

    public function __construct(?int $id, float $costo, string $posizione, string $grandezza)
    {
        $this->id = $id;
        $this->costo = $costo;
        $this->posizione = $posizione;
        $this->grandezza = $grandezza;
    }

    // Getter
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getCosto(): float
    {
        return $this->costo;
    }
    public function getPosizione(): string
    {
        return $this->posizione;
    }
    public function getGrandezza(): string
    {
        return $this->grandezza;
    }

    // Setter
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function setCosto(float $costo): void
    {
        $this->costo = $costo;
    }
    public function setPosizione(string $posizione): void
    {
        $this->posizione = $posizione;
    }
    public function setGrandezza(string $grandezza): void
    {
        $this->grandezza = $grandezza;
    }
}