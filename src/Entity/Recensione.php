<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "recensione")]
class Recensione
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "integer")]
    private int $voto;

    #[ORM\Column(type: "date")]
    private string $data;

    #[ORM\Column(type: "text")]
    private string $descrizione;

    public function __construct(?int $id, int $voto, string $data, string $descrizione)
    {
        $this->id = $id;
        $this->voto = $voto;
        $this->data = $data;
        $this->descrizione = $descrizione;
    }

    // Getter
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getVoto(): int
    {
        return $this->voto;
    }
    public function getData(): string
    {
        return $this->data;
    }
    public function getDescrizione(): string
    {
        return $this->descrizione;
    }

    // Setter
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function setVoto(int $voto): void
    {
        $this->voto = $voto;
    }
    public function setData(string $data): void
    {
        $this->data = $data;
    }
    public function setDescrizione(string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }
}