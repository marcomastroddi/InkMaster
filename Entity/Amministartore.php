<?php
require_once 'Persona.php';

class Amministratore extends Persona {
    
    public function __construct(string $Nome, string $Cognome, string $Password) {
        parent::__construct($Nome, $Cognome, $Password);
    }
}
