<?php
class Studio {
    private ?int $id;
    private string $nome;
    private string $indirizzo;
    private string $città;
    private string $telefono;
    private string $email;
    private string $descrizione;
    private string $iban;
    //consigliati dall'editor, per metterli in un array per poterli gestire meglio
    private array $orari_apertura;
    private array $orari_chiusura;

    public function __construct(?int $id, string $nome, string $indirizzo, string $città, string $telefono, string $email, string $descrizione, string $iban, array $orari_apertura, array $orari_chiusura) {
        $this->id = $id;
        $this->nome = $nome;
        $this->indirizzo = $indirizzo;
        $this->città = $città;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->descrizione = $descrizione;
        $this->iban = $iban;
        $this->orari_apertura = $orari_apertura;
        $this->orari_chiusura = $orari_chiusura;
    }

    // Getter
    public function getId(): ?int {
        return $this->id;
    }
    public function getNome(): string {
        return $this->nome;
    }
    public function getIndirizzo(): string {
        return $this->indirizzo;
    }
    public function getCittà(): string {
        return $this->città;
    }
    public function getTelefono(): string {
        return $this->telefono;
    }
    public function getEmail(): string {
        return $this->email;
    }
    public function getDescrizione(): string {
        return $this->descrizione;
    }
    public function getIban(): string {
        return $this->iban;
    }
    public function getOrariApertura(): array {
        return $this->orari_apertura;
    }
    public function getOrariChiusura(): array {
        return $this->orari_chiusura;
    }

    // Setter
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function setNome(string $nome): void {
        $this->nome = $nome;
    }
    public function setIndirizzo(string $indirizzo): void {
        $this->indirizzo = $indirizzo;
    }
    public function setCittà(string $città): void {
        $this->città = $città;
    }
    public function setTelefono(string $telefono): void {
        $this->telefono = $telefono;
    }
    public function setEmail(string $email): void {
        $this->email = $email;
    }
    public function setDescrizione(string $descrizione): void {
        $this->descrizione = $descrizione;
    }
    public function setIban(string $iban): void {
        $this->iban = $iban;
    }
    public function setOrariApertura(array $orari_apertura): void {
        $this->orari_apertura = $orari_apertura;
    }
    public function setOrariChiusura(array $orari_chiusura): void {
        $this->orari_chiusura = $orari_chiusura;
    }
}