<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'amministratori')]
class Amministratore extends Persona 
{
    // Non ci sono attributi aggiuntivi rispetto a Persona

    // Costruttore
    public function __construct(string $nome, string $cognome, string $password) 
    {
        // Richiama il costruttore della MappedSuperclass Persona
        parent::__construct($nome, $cognome, $password);
    }

    // Non sono necessari Getter e Setter aggiuntivi perché 
    // eredita ed utilizza direttamente quelli di Persona
}
