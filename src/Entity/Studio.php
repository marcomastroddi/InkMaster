<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use InkMaster\Enum\Citta;

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

    #[ORM\Column(type: 'string', length: 50, unique: true)]
    private string $username;

    #[ORM\Column(type: 'string', length: 255)]
    private string $password;

    #[ORM\Column(type: 'string', length: 11, unique: true)]
    private string $partitaIva;

    #[ORM\Column(type: 'string', enumType: Citta::class)]
    private Citta $posizione;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $descrizione = null;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private string $email;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $telefono = null;

    #[ORM\Column(type: 'json')]
    private array $orariApertura = [];

    #[ORM\Column(type: 'json')]
    private array $orariChiusura = [];

    // 1. Relazione con Tatuatore (Uno studio ha molti tatuatori, 1 a molti)
    #[ORM\OneToMany(mappedBy: 'studio', targetEntity: Tatuatore::class)]
    private Collection $tatuatori;

    // 2. Relazione con Appuntamento (Uno studio ha molti appuntamenti, 1 a molti)
    #[ORM\OneToMany(mappedBy: 'studio', targetEntity: Appuntamento::class)]
    private Collection $appuntamenti;

    // 3. Relazione con PubblicazioneTatuaggio (Un studio ha molte pubblicazioni, 1 a molti)
    #[ORM\OneToMany(mappedBy: 'studio', targetEntity: PubblicazioneTatuaggio::class)]
    private Collection $pubblicazioni;

    // Costruttore
    public function __construct(
        string $nome, 
        string $partitaIva, 
        Citta $posizione, 
        string $email,
        string $username,
        string $password,
        ?string $descrizione = null,
        ?string $telefono = null,
        array $orariApertura = [],
        array $orariChiusura = []
    ) {
        $this->nome = $nome;
        $this->partitaIva = $partitaIva;
        $this->posizione = $posizione;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->descrizione = $descrizione;
        $this->telefono = $telefono;
        $this->orariApertura = $orariApertura;
        $this->orariChiusura = $orariChiusura;

        // Inizializzazione delle collezioni
        $this->tatuatori = new ArrayCollection();
        $this->appuntamenti = new ArrayCollection();
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

    public function getPosizione(): Citta 
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

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getTelefono(): ?string 
    {
        return $this->telefono;
    }

    public function getOrariApertura(): array 
    {
        return $this->orariApertura;
    }

    public function getOrariChiusura(): array 
    {
        return $this->orariChiusura;
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
    
    /** @return Collection<int, PubblicazioneTatuaggio> */
    public function getPubblicazioni(): Collection
    {
        return $this->pubblicazioni;
    }

    public function getRuolo(): string
    {
        return 'studio';
    }

    // Metodi setter
    public function setNome(string $nome): void 
    {
        $this->nome = $nome;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setPartitaIva(string $partitaIva): void 
    {
        $this->partitaIva = $partitaIva;
    }

    public function setPosizione(Citta $posizione): void 
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

    public function setOrariApertura(array $orariApertura): void 
    {
        $this->orariApertura = $orariApertura;
    }

    public function setOrariChiusura(array $orariChiusura): void 
    {
        $this->orariChiusura = $orariChiusura;
    }
}