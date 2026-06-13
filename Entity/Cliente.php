<?php
require_once 'Persona.php';

class Cliente extends Persona{
    private string $Username;
    private DateTime $Data_di_nascita;
    private string $Posizione;
    private ?string $Numero_di_telefono;
    private string $Email;

    public function __construct(string $Nome, string $Cognome, string $Password, string $Username, DateTime $Data_di_nascita, string $Posizione, ?string $Numero_di_telefono, string $Email) {
        parent::__construct($Nome, $Cognome, $Password);
        $this->Username = $Username;
        $this->Data_di_nascita = $Data_di_nascita;
        $this->Posizione = $Posizione;
        $this->Numero_di_telefono = $Numero_di_telefono;
        $this->Email = $Email;
    }

    // Getter
    public function getUsername(): string {
        return $this->Username;
    }
    public function getDataDiNascita(): DateTime {
        return $this->Data_di_nascita;
    }
    public function getPosizione(): string {
        return $this->Posizione;
    }
    public function getNumeroDiTelefono(): string {
        return $this->Numero_di_telefono;
    }
    public function getEmail(): string {
        return $this->Email;
    }

    // Setter
    public function setUsername(string $Username): void {
        $this->Username = $Username;
    }
    public function setDataDiNascita(DateTime $Data_di_nascita): void {
        $this->Data_di_nascita = $Data_di_nascita;
    }
    public function setPosizione(string $Posizione): void {
        $this->Posizione = $Posizione;
    }
    public function setNumeroDiTelefono(string $Numero_di_telefono): void {
        $this->Numero_di_telefono = $Numero_di_telefono;
    }
    public function setEmail(string $Email): void {
        $this->Email = $Email;
    }
}