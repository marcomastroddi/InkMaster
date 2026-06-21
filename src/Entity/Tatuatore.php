<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'tatuatori')]
class Tatuatore extends Persona 
{
    #[ORM\Column(type: 'date')]
    private DateTime $dataNascita;

    // Relazione 1: Il tatuatore lavora in un SOLO studio (Molti a uno)
    #[ORM\ManyToOne(targetEntity: Studio::class, inversedBy: 'tatuatori')]
    #[ORM\JoinColumn(name: 'studio_id', referencedColumnName: 'id', nullable: false)]
    private Studio $studio;

    // Relazione 2: Il tatuatore possiede uno o più stili
    #[ORM\ManyToMany(targetEntity: Stile::class, inversedBy: 'tatuatori')]
    #[ORM\JoinTable(name: 'tatuatori_stili')]
    private Collection $stili;


    // Costruttore — niente username/password: il tatuatore non fa login,
    // è un'entità di dominio che appartiene a uno studio.
    public function __construct(
        string $nome, 
        string $cognome, 
        DateTime $dataNascita, 
        Studio $studio
    ) {
        // Invochiamo il costruttore del padre (Persona): solo nome e cognome
        parent::__construct($nome, $cognome);
        
        $this->dataNascita = $dataNascita;
        $this->studio = $studio;
        
        // Inizializzazione obbligatoria della collezione degli stili
        $this->stili = new ArrayCollection();
    }

    // Metodi getter
    public function getDataNascita(): DateTime 
    {
        return $this->dataNascita;
    }

    public function getStudio(): Studio 
    {
        return $this->studio;
    }

    /**
     * @return Collection<int, Stile>
     */
    public function getStili(): Collection 
    {
        return $this->stili;
    }

    // Metodi setter
    public function setDataNascita(DateTime $dataNascita): void 
    {
        $this->dataNascita = $dataNascita;
    }

    public function setStudio(Studio $studio): void 
    {
        $this->studio = $studio;
    }

    // ==========================================
    //          METODI UTILI PER LA COLLEZIONE (messi da gemini, per adesso li ho lasciati)
    // ==========================================

    public function addStile(Stile $stile): void 
    {
        if (!$this->stili->contains($stile)) {
            $this->stili->add($stile);
        }
    }

    public function removeStile(Stile $stile): void 
    {
        $this->stili->removeElement($stile);
    }
}