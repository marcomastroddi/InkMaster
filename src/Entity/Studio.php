<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'studi')]
class Studio 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 150)]
    private string $nome;

    #[ORM\Column(type: 'string', length: 11, unique: true)]
    private string $partitaIva;

    #[ORM\Column(type: 'string', length: 255)]
    private string $posizione;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $descrizione = null;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private string $email;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $telefono = null;

    // 1. Relazione con Tatuatore (Uno studio ha molti tatuatori, 1 a molti)
    #[ORM\OneToMany(mappedBy: 'studio', targetEntity: Tatuatore::class)]
    private Collection $tatuatori;

    // 2. Relazione con Appuntamento (Uno studio ha molti appuntamenti, 1 a molti)
    #[ORM\OneToMany(mappedBy: 'studio', targetEntity: Appuntamento::class)]
    private Collection $appuntamenti;

    // 3. Relazione con Recensione (Uno studio ha molte recensioni, 1 a molti)
    #[ORM\OneToMany(mappedBy: 'studio', targetEntity: Recensione::class)]
    private Collection $recensioni;

    // 4. Relazione con Pubblicazione (Un studio ha molte pubblicazioni, 1 a molti)
    #[ORM\OneToMany(mappedBy: 'studio', targetEntity: Pubblicazione::class)]
    private Collection $pubblicazioni;

    // Costruttore
    public function __construct(
        string $nome, 
        string $partitaIva, 
        string $posizione, 
        string $email,
        ?string $descrizione = null,
        ?string $telefono = null
    ) {
        $this->nome = $nome;
        $this->partitaIva = $partitaIva;
        $this->posizione = $posizione;
        $this->email = $email;
        $this->descrizione = $descrizione;
        $this->telefono = $telefono;

        // Inizializzazione delle collezioni
        $this->tatuatori = new ArrayCollection();
        $this->appuntamenti = new ArrayCollection();
        $this->recensioni = new ArrayCollection();
        $this->pubblicazioni = new ArrayCollection();
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

    public function getPartitaIva(): string 
    {
        return $this->partitaIva;
    }

    public function getPosizione(): string 
    {
        return $this->posizione;
    }

    public function getDescrizione(): ?string 
    {
        return $this->descrizione;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getTelefono(): ?string 
    {
        return $this->telefono;
    }

    /**
     * @return Collection<int, Tatuatore>
     */
    public function getTatuatori(): Collection 
    {
        return $this->tatuatori;
    }

    /**
     * @return Collection<int, Appuntamento>
     */
    public function getAppuntamenti(): Collection 
    {
        return $this->appuntamenti;
    }

    /**
     * @return Collection<int, Recensione>
     */
    public function getRecensioni(): Collection 
    {
        return $this->recensioni;
    }

    /**
     * @return Collection<int, Pubblicazione>
     */
    public function getPubblicazioni(): Collection 
    {
        return $this->pubblicazioni;
    }

    // Metodi setter
    public function setNome(string $nome): void 
    {
        $this->nome = $nome;
    }

    public function setPartitaIva(string $partitaIva): void 
    {
        $this->partitaIva = $partitaIva;
    }

    public function setPosizione(string $posizione): void 
    {
        $this->posizione = $posizione;
    }

    public function setDescrizione(?string $descrizione): void 
    {
        $this->descrizione = $descrizione;
    }

    public function setEmail(string $email): void 
    {
        $this->email = $email;
    }

    public function setTelefono(?string $telefono): void 
    {
        $this->telefono = $telefono;
    }
}