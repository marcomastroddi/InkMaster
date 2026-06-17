<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

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


    // Costruttore
    public function __construct(
        int $voto, 
        DateTime $data, 
        Cliente $cliente, 
        Studio $studio, 
        ?string $descrizione = null
    ) {
        $this->voto = $voto;
        $this->data = $data;
        $this->cliente = $cliente;
        $this->studio = $studio;
        $this->descrizione = $descrizione;
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
}