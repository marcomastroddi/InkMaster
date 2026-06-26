<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'pubblicazioni')]
class PubblicazioneTatuaggio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 150)]
    private string $titolo;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $descrizione = null;

    #[ORM\Column(type: 'date')]
    private DateTime $data;

    #[ORM\Column(type: 'time')]
    private DateTime $ora;

    #[ORM\Column(type: 'string', length: 255, nullable: false, name: 'percorsoImmagine')]
    private string $percorsoImmagine;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $posizione = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $grandezza = null;

    #[ORM\Column(type: 'decimal', precision: 7, scale: 2, nullable: true)]
    private ?float $costo = null;

    // Relazione 1: La pubblicazione appartiene a uno specifico studio (Molti a uno)
    #[ORM\ManyToOne(targetEntity: Studio::class, inversedBy: 'pubblicazioni')]
    #[ORM\JoinColumn(name: 'studio_id', referencedColumnName: 'id', nullable: false)]
    private Studio $studio;

    // Relazione 2: Gli stili del tatuaggio (Molti a Molti, owning side)
    #[ORM\ManyToMany(targetEntity: Stile::class, inversedBy: 'pubblicazioni')]
    #[ORM\JoinTable(name: 'pubblicazioni_stili')]
    private Collection $stili;

    public function __construct(
        string $titolo,
        DateTime $data,
        DateTime $ora,
        Studio $studio,
        string $percorsoImmagine,
        ?string $descrizione = null,
        ?string $posizione = null,
        ?string $grandezza = null,
        ?float $costo = null
    ) {
        $this->titolo          = $titolo;
        $this->data            = $data;
        $this->ora             = $ora;
        $this->studio          = $studio;
        $this->percorsoImmagine = $percorsoImmagine;
        $this->descrizione     = $descrizione;
        $this->posizione       = $posizione;
        $this->grandezza       = $grandezza;
        $this->costo           = $costo;
        $this->stili           = new ArrayCollection();
    }

    public function getId(): ?int               { return $this->id; }
    public function getTitolo(): string          { return $this->titolo; }
    public function getDescrizione(): ?string    { return $this->descrizione; }
    public function getData(): DateTime          { return $this->data; }
    public function getOra(): DateTime           { return $this->ora; }
    public function getStudio(): Studio          { return $this->studio; }
    public function getPercorsoImmagine(): string { return $this->percorsoImmagine; }
    public function getPosizione(): ?string      { return $this->posizione; }
    public function getGrandezza(): ?string      { return $this->grandezza; }
    public function getCosto(): ?float           { return $this->costo; }

    /** @return Collection<int, Stile> */
    public function getStili(): Collection       { return $this->stili; }

    public function setTitolo(string $titolo): void              { $this->titolo = $titolo; }
    public function setDescrizione(?string $descrizione): void   { $this->descrizione = $descrizione; }
    public function setData(DateTime $data): void                { $this->data = $data; }
    public function setOra(DateTime $ora): void                  { $this->ora = $ora; }
    public function setStudio(Studio $studio): void              { $this->studio = $studio; }
    public function setPercorsoImmagine(string $p): void         { $this->percorsoImmagine = $p; }
    public function setPosizione(?string $posizione): void       { $this->posizione = $posizione; }
    public function setGrandezza(?string $grandezza): void       { $this->grandezza = $grandezza; }
    public function setCosto(?float $costo): void                { $this->costo = $costo; }

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
