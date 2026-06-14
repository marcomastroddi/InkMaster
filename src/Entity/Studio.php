<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "studio")]
class Studio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $nome;

    #[ORM\Column(type: "string", length: 255)]
    private string $indirizzo;

    #[ORM\Column(type: "string", length: 100)]
    private string $città;

    #[ORM\Column(type: "string", length: 20)]
    private string $telefono;

    #[ORM\Column(type: "string", length: 255)]
    private string $email;

    #[ORM\Column(type: "text")]
    private string $descrizione;

    #[ORM\Column(type: "string", length: 34)]
    private string $iban;

    #[ORM\Column(type: "json")]
    private array $orari_apertura;

    #[ORM\Column(type: "json")]
    private array $orari_chiusura;

    public function __construct(?int $id, string $nome, string $indirizzo, string $città, string $telefono, string $email, string $descrizione, string $iban, array $orari_apertura, array $orari_chiusura)
    {
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
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function getIndirizzo(): string
    {
        return $this->indirizzo;
    }
    public function getCittà(): string
    {
        return $this->città;
    }
    public function getTelefono(): string
    {
        return $this->telefono;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getDescrizione(): string
    {
        return $this->descrizione;
    }
    public function getIban(): string
    {
        return $this->iban;
    }
    public function getOrariApertura(): array
    {
        return $this->orari_apertura;
    }
    public function getOrariChiusura(): array
    {
        return $this->orari_chiusura;
    }

    // Setter
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
    public function setIndirizzo(string $indirizzo): void
    {
        $this->indirizzo = $indirizzo;
    }
    public function setCittà(string $città): void
    {
        $this->città = $città;
    }
    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setDescrizione(string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }
    public function setIban(string $iban): void
    {
        $this->iban = $iban;
    }
    public function setOrariApertura(array $orari_apertura): void
    {
        $this->orari_apertura = $orari_apertura;
    }
    public function setOrariChiusura(array $orari_chiusura): void
    {
        $this->orari_chiusura = $orari_chiusura;
    }
}