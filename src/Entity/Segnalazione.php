<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "segnalazione")]
class Segnalazione
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "string", length: 150)]
    private string $motivo;

    #[ORM\Column(type: "text")]
    private string $descrizione;

    #[ORM\Column(type: "date")]
    private string $data;

    #[ORM\Column(type: "string", length: 20)]
    private string $stato;

    public function __construct(?int $id, string $motivo, string $descrizione, string $data, string $stato)
    {
        $this->id = $id;
        $this->motivo = $motivo;
        $this->descrizione = $descrizione;
        $this->data = $data;
        $this->stato = $stato;
    }

    // Getter
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getMotivo(): string
    {
        return $this->motivo;
    }
    public function getDescrizione(): string
    {
        return $this->descrizione;
    }
    public function getData(): string
    {
        return $this->data;
    }
    public function getStato(): string
    {
        return $this->stato;
    }

    // Setter
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function setMotivo(string $motivo): void
    {
        $this->motivo = $motivo;
    }
    public function setDescrizione(string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }
    public function setData(string $data): void
    {
        $this->data = $data;
    }
    public function setStato(string $stato): void
    {
        $this->stato = $stato;
    }
}