<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'pubblicazioni')]
class Pubblicazione 
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
    private string $percorsoImmagine; // Percorso dell'immagine: una pubblicazione DEVE avere una foto del tatuaggio

    // Relazione 1: La pubblicazione appartiene a uno specifico studio (Molti a uno)
    #[ORM\ManyToOne(targetEntity: Studio::class, inversedBy: 'pubblicazioni')]
    #[ORM\JoinColumn(name: 'studio_id', referencedColumnName: 'id', nullable: false)]
    private Studio $studio;

    // Relazione 2: La pubblicazione riguarda uno ed un solo tatuaggio (Molti a uno)
    #[ORM\ManyToOne(targetEntity: Tatuaggio::class)]
    #[ORM\JoinColumn(name: 'tatuaggio_id', referencedColumnName: 'id', nullable: false)]
    private Tatuaggio $tatuaggio;


    // Costruttore
    public function __construct(
        string $titolo, 
        DateTime $data, 
        DateTime $ora, 
        Studio $studio,
        Tatuaggio $tatuaggio,
        string $percorsoImmagine,        // obbligatorio: la foto del tatuaggio
        ?string $descrizione = null
    ) {
        $this->titolo = $titolo;
        $this->data = $data;
        $this->ora = $ora;
        $this->studio = $studio;
        $this->tatuaggio = $tatuaggio;
        $this->percorsoImmagine = $percorsoImmagine;
        $this->descrizione = $descrizione;
    }

    // Blocco getter
    public function getId(): ?int 
    {
        return $this->id;
    }

    public function getTitolo(): string 
    {
        return $this->titolo;
    }

    public function getDescrizione(): ?string 
    {
        return $this->descrizione;
    }

    public function getData(): DateTime 
    {
        return $this->data;
    }

    public function getOra(): DateTime 
    {
        return $this->ora;
    }

    public function getStudio(): Studio 
    {
        return $this->studio;
    }

    public function getTatuaggio(): Tatuaggio 
    {
        return $this->tatuaggio;
    }

    public function getPercorsoImmagine(): string
    {
        return $this->percorsoImmagine;
    }

    // Blocco setter
    public function setTitolo(string $titolo): void 
    {
        $this->titolo = $titolo;
    }

    public function setDescrizione(?string $descrizione): void 
    {
        $this->descrizione = $descrizione;
    }

    public function setData(DateTime $data): void 
    {
        $this->data = $data;
    }

    public function setOra(DateTime $ora): void 
    {
        $this->ora = $ora;
    }

    public function setStudio(Studio $studio): void 
    {
        $this->studio = $studio;
    }

    public function setTatuaggio(Tatuaggio $tatuaggio): void 
    {
        $this->tatuaggio = $tatuaggio;
    }

    public function setPercorsoImmagine(string $percorsoImmagine): void
    {
        $this->percorsoImmagine = $percorsoImmagine;
    }
}
