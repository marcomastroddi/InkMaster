<?php
require_once 'Persona.php';

class Tatuatore extends Persona{
    private DateTime $Data_di_nascita;

    public function __construct(string $Nome, string $Cognome, string $Password, DateTime $Data_di_nascita) {
        parent::__construct($Nome, $Cognome, $Password);
        $this->Data_di_nascita = $Data_di_nascita;
    }

    // Getter
    public function getDataDiNascita(): DateTime {
        return $this->Data_di_nascita;
    }

    // Setter
    public function setDataDiNascita(DateTime $Data_di_nascita): void {
        $this->Data_di_nascita = $Data_di_nascita;
    }
}
