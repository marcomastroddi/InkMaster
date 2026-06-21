<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'amministratori')]
class Amministratore extends Persona
{
    #[ORM\Column(type: 'string', length: 50, unique: true)]
    protected string $username;

    #[ORM\Column(type: 'string', length: 255)]
    protected string $password;

    // Costruttore
    public function __construct(string $nome, string $cognome, string $password, string $username)
    {
        // Persona ora gestisce solo nome e cognome: username e password li teniamo qui
        parent::__construct($nome, $cognome);
        $this->username = $username;
        $this->password = $password;
    }

    public function getRuolo(): string
    {
        return 'amministratore';
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
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
