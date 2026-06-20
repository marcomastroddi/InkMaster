<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use InkMaster\Entity\Tatuatore;

#[ORM\Entity]
#[ORM\Table(name: 'recensioni')]
class Recensione 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    private int $voto; // Es: stelle da 1 a 5

    #[ORM\Column(type: 'date')]
    private DateTime $data;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $descrizione = null;

    // Relazione 1: La recensione è scritta da un cliente
    #[ORM\ManyToOne(targetEntity: Cliente::class, inversedBy: 'recensioni')]
    #[ORM\JoinColumn(name: 'cliente_id', referencedColumnName: 'id', nullable: false)]
    private Cliente $cliente;

    // Relazione 2: La recensione è legata a uno studio specifico(Molti a uno)
    #[ORM\ManyToOne(targetEntity: Studio::class, inversedBy: 'recensioni')]
    #[ORM\JoinColumn(name: 'studio_id', referencedColumnName: 'id', nullable: false)]
    private Studio $studio;

    #[ORM\Column(type: 'string', length: 150)]
    private string $titolo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $foto = null;

    #[ORM\Column(type: 'string', length: 100)]
    private string $stile;

    // Relazione: la recensione riguarda un tatuatore specifico (Molti a uno)
    #[ORM\ManyToOne(targetEntity: Tatuatore::class)]
    #[ORM\JoinColumn(name: 'tatuatore_id', referencedColumnName: 'id', nullable: false)]
    private Tatuatore $tatuatore;


    // Costruttore
    public function __construct(
        int $voto, 
        DateTime $data, 
        Cliente $cliente, 
        Studio $studio, 
        string $titolo,
        string $stile,
        Tatuatore $tatuatore,
        ?string $descrizione = null,
        ?string $foto = null
    ) {
        $this->voto = $voto;
        $this->data = $data;
        $this->cliente = $cliente;
        $this->studio = $studio;
        $this->titolo = $titolo;
        $this->stile = $stile;
        $this->tatuatore = $tatuatore;
        $this->descrizione = $descrizione;
        $this->foto = $foto;
    }
    // Metodi getter
    public function getId(): ?int 
    {
        return $this->id;
    }

    public function getVoto(): int 
    {
        return $this->voto;
    }

    public function getData(): DateTime 
    {
        return $this->data;
    }

    public function getDescrizione(): ?string 
    {
        return $this->descrizione;
    }

    public function getCliente(): Cliente 
    {
        return $this->cliente;
    }

    public function getStudio(): Studio 
    {
        return $this->studio;
    }

    public function getTitolo(): string 
    {
        return $this->titolo;
    }

    public function getFoto(): ?string 
    {
        return $this->foto;
    }

    public function getStile(): string 
    {
        return $this->stile;
    }

    public function getTatuatore(): Tatuatore 
    {
        return $this->tatuatore;
    }
    // Metodi setter
    public function setVoto(int $voto): void 
    {
        $this->voto = $voto;
    }

    public function setData(DateTime $data): void 
    {
        $this->data = $data;
    }

    public function setDescrizione(?string $descrizione): void 
    {
        $this->descrizione = $descrizione;
    }

    public function setCliente(Cliente $cliente): void 
    {
        $this->cliente = $cliente;
    }

    public function setStudio(Studio $studio): void 
    {
        $this->studio = $studio;
    }

    public function setTitolo(string $titolo): void 
    {
        $this->titolo = $titolo;
    }

    public function setFoto(?string $foto): void 
    {
        $this->foto = $foto;
    }

    public function setStile(string $stile): void 
    {
        $this->stile = $stile;
    }

    public function setTatuatore(Tatuatore $tatuatore): void 
    {
        $this->tatuatore = $tatuatore;
    }
}