<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;

// Persona ora modella SOLO l'identità anagrafica (chi è la persona),
// non l'autenticazione. Username e password vivono nelle sottoclassi
// che fanno davvero login (Cliente, Amministratore).
#[ORM\MappedSuperclass]
//Per l'ereditarietà usiamo l'approccio "MappedSuperclass" che è più semplice e adatto al nostro caso, 
//dato che non abbiamo bisogno di una tabella unica per tutte le persone, ma vogliamo che ogni tipo di persona (Cliente, Amministratore, Tatuatore) ne abbia una.

abstract class Persona 
{
    // Ciascuna tabella figlia (tatuatore, cliente, amministratore) genererà il proprio ID auto-incrementale
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected ?int $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    protected string $nome;

    #[ORM\Column(type: 'string', length: 100)]
    protected string $cognome;

    // Costruttore: solo i dati anagrafici comuni a tutte le persone
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
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setNome(string $nome): void 
    {
        $this->nome = $nome;
    }

    public function setCognome(string $cognome): void 
    {
        $this->cognome = $cognome;
    }
}
