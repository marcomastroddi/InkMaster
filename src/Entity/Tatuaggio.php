<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'tatuaggi')]
class Tatuaggio 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'decimal', precision: 7, scale: 2)]
    private float $costo; // Usiamo decimal nel DB per i prezzi, mappato come float in PHP

    #[ORM\Column(type: 'string', length: 100)]
    private string $posizione; // Posizione sul corpo (esempio: "Avambraccio")

    #[ORM\Column(type: 'string', length: 50)]
    private string $grandezza; // Es. "10x10 cm", "Piccolo", "Schiena intera" ecc...

    // Relazione 1: Un tatuaggio ha uno o più stili (Molti a Molti)
    #[ORM\ManyToMany(targetEntity: Stile::class, inversedBy: 'tatuaggi')]
    #[ORM\JoinTable(name: 'tatuaggi_stili')]
    private Collection $stili;

    
    // Costruttore
    public function __construct(float $costo, string $posizione, string $grandezza) 
    {
        $this->costo = $costo;
        $this->posizione = $posizione;
        $this->grandezza = $grandezza;
        
        // Inizializzazione obbligatoria della collezione degli stili
        $this->stili = new ArrayCollection();
    }

    // Metodi getter
    public function getId(): ?int 
    {
        return $this->id;
    }

    public function getCosto(): float 
    {
        return $this->costo;
    }

    public function getPosizione(): string 
    {
        return $this->posizione;
    }

    public function getGrandezza(): string 
    {
        return $this->grandezza;
    }

    /**
     * @return Collection<int, Stile>
     */
    public function getStili(): Collection 
    {
        return $this->stili;
    }

    // Metodi setter
    public function setCosto(float $costo): void 
    {
        $this->costo = $costo;
    }

    public function setPosizione(string $posizione): void 
    {
        $this->posizione = $posizione;
    }

    public function setGrandezza(string $grandezza): void 
    {
        $this->grandezza = $grandezza;
    }

    // ==========================================
    //          METODI UTILI PER LA COLLEZIONE (aggiunti da gemini)
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