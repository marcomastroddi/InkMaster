<?php
class Persona{
    protected string $Nome;
    protected string $Cognome;
    protected string $Password;

    public function __construct(string $Nome, string $Cognome, string $Password) {
        $this->Nome = $Nome;
        $this->Cognome = $Cognome;
        $this->Password = $Password;
    }
    
    // Getter
    public function getNome(): string {
        return $this->Nome;
    }
    public function getCognome(): string {
        return $this->Cognome;
    }
    public function getPassword(): string {
        return $this->Password;
    }

    // Setter
    public function setNome(string $Nome): void {
        $this->Nome = $Nome;
    }
    public function setCognome(string $Cognome): void {
        $this->Cognome = $Cognome;
    }
    public function setPassword(string $Password): void {
        $this->Password = $Password;
    }
}
