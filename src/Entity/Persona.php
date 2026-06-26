<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
abstract class Persona 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected ?int $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    protected string $nome;

    #[ORM\Column(type: 'string', length: 100)]
    protected string $cognome;

    // Costruttore
    public function __construct(string $nome, string $cognome) 
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
    }

    // Metodi getter
    public function getId(): ?int 
    {
        return $this->id;
    }

    public function getNome(): string 
    {
        return $this->nome;
    }

    public function getCognome(): string 
    {
        return $this->cognome;
    }

    // Metodi setter
    public function setNome(string $nome): void 
    {
        $this->nome = $nome;
    }

    public function setCognome(string $cognome): void 
    {
        $this->cognome = $cognome;
    }
}