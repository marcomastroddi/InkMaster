<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;

//Per l'ereditarietà usiamo l'approccio "MappedSuperclass" che è più semplice e adatto al nostro caso, 
//dato che non abbiamo bisogno di una tabella unica per tutte le persone, ma vogliamo che ogni tipo di persona (Cliente, Amministratore, Tatuatore) ne abbia una.
#[ORM\MappedSuperclass]
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

    #[ORM\Column(type: 'string', length: 50, unique: true)]
    protected string $username;

    #[ORM\Column(type: 'string', length: 255)]
    protected string $password;

    // Costruttore
    public function __construct(string $nome, string $cognome, string $password, string $username) 
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->username = $username;
        $this->password = $password;
        
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

    public function getUsername(): string 
    {
        return $this->username;
    }

    public function getPassword(): string 
    {
        return $this->password;
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

    public function setUsername(string $username): void 
    {
        $this->username = $username;
    }

    public function setPassword(string $password): void 
    {
        $this->password = $password;
    }
}
