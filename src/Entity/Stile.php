<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'stili')]
class Stile 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100, unique: true)]
    private string $nome;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $descrizione = null;

    // Relazione 1: Un tatuatore può avere più stili (Molti a Molti)
    #[ORM\ManyToMany(targetEntity: Tatuatore::class, mappedBy: 'stili')]
    private Collection $tatuatori;

    // Relazione 2 (Inversa): I tatuaggi caratterizzati da questo stile
    // Nota: 'stili' è il nome dell'attributo dentro la classe Tatuaggio
    #[ORM\ManyToMany(targetEntity: Tatuaggio::class, mappedBy: 'stili')]
    private Collection $tatuaggi;


    // Costruttore
    public function __construct(string $nome, ?string $descrizione = null) 
    {
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        
        // Inizializzazione obbligatoria delle collezioni per le relazioni ManyToMany
        $this->tatuatori = new ArrayCollection();
        $this->tatuaggi = new ArrayCollection();
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

    public function getDescrizione(): ?string 
    {
        return $this->descrizione;
    }

    /**
     * @return Collection<int, Tatuatore>
     */
    public function getTatuatori(): Collection 
    {
        return $this->tatuatori;
    }

    /**
     * @return Collection<int, Tatuaggio>
     */
    public function getTatuaggi(): Collection 
    {
        return $this->tatuaggi;
    }

    // Metodi setter
    public function setNome(string $nome): void 
    {
        $this->nome = $nome;
    }

    public function setDescrizione(?string $descrizione): void 
    {
        $this->descrizione = $descrizione;
    }
}