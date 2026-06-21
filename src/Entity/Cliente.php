<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'clienti')]
class Cliente extends Persona
{
    #[ORM\Column(type: 'string', length: 50, unique: true)]
    protected string $username;

    #[ORM\Column(type: 'string', length: 255)]
    protected string $password;

    #[ORM\Column(type: 'date')]
    private DateTime $dataNascita;

    #[ORM\Column(type: 'string', length: 180, unique: true)] //unique=true per evitare email duplicate
    private string $email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $posizione = null;

    // Relazione 1: Un cliente partecipa a molti appuntamenti (1 a molti)
    #[ORM\OneToMany(mappedBy: 'cliente', targetEntity: Appuntamento::class)]
    private Collection $appuntamenti;

    // Relazione 2: Un cliente effettua molte segnalazioni (1 a molti)
    #[ORM\OneToMany(mappedBy: 'cliente', targetEntity: Segnalazione::class)]
    private Collection $segnalazioni;


    
    // Costruttore
    public function __construct(
        string $nome, 
        string $cognome, 
        string $password, 
        string $username,
        DateTime $dataNascita, 
        string $email, 
        ?string $posizione = null
    ) {
        // Persona ora gestisce solo nome e cognome: username e password li teniamo qui
        parent::__construct($nome, $cognome);
        $this->username = $username;
        $this->password = $password;

        $this->dataNascita = $dataNascita;
        $this->email = $email;
        $this->posizione = $posizione;

        // Inizializzazione delle collezioni di Doctrine
        $this->appuntamenti = new ArrayCollection();
        $this->segnalazioni = new ArrayCollection();
    }

    // Metodi getter
    public function getDataNascita(): DateTime 
    {
        return $this->dataNascita;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getRuolo(): string
    {
        return 'cliente';
    }

    public function getPosizione(): ?string 
    {
        return $this->posizione;
    }

    /**
     * @return Collection<int, Appuntamento>
     */
    public function getAppuntamenti(): Collection 
    {
        return $this->appuntamenti;
    }

    /**
     * @return Collection<int, Segnalazione>
     */
    public function getSegnalazioni(): Collection 
    {
        return $this->segnalazioni;
    }
    
    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    // Metodi setter
    public function setDataNascita(DateTime $dataNascita): void 
    {
        $this->dataNascita = $dataNascita;
    }

    public function setEmail(string $email): void 
    {
        $this->email = $email;
    }

    public function setPosizione(?string $posizione): void
    {
        $this->posizione = $posizione;
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