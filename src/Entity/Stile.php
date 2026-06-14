<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "stile")]
class Stile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $nome;

    #[ORM\Column(type: "text")]
    private string $descrizione;

    public function __construct(?int $id, string $nome, string $descrizione)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descrizione = $descrizione;
    }

    // Getter
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNome(): string
    {
        return $this->nome;
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
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
    public function setDescrizione(string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }
}