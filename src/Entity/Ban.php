<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'ban')]
class Ban
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    // Riferimento "piatto" all'utente bannato (cliente o studio)
    #[ORM\Column(type: 'integer')]
    private int $utenteId;

    #[ORM\Column(type: 'string', length: 50)]
    private string $utenteTipo; // 'cliente' | 'studio'

    #[ORM\Column(type: 'string', length: 50)]
    private string $tipo;        // 'temporaneo' | 'permanente'

    #[ORM\Column(type: 'string', length: 50)]
    private string $durata;

    #[ORM\Column(type: 'string', length: 150)]
    private string $motivazione;

    #[ORM\Column(type: 'string', length: 50)]
    private string $gravita;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $descrizione = null;

    #[ORM\Column(type: 'datetime')]
    private DateTime $data;

    public function __construct(
        int $utenteId,
        string $utenteTipo,
        string $tipo,
        string $durata,
        string $motivazione,
        string $gravita,
        ?string $descrizione = null
    ) {
        $this->utenteId    = $utenteId;
        $this->utenteTipo  = $utenteTipo;
        $this->tipo        = $tipo;
        $this->durata      = $durata;
        $this->motivazione = $motivazione;
        $this->gravita     = $gravita;
        $this->descrizione = $descrizione;
        $this->data        = new DateTime(); // impostata automaticamente
    }

    public function getId(): ?int { return $this->id; }
    public function getUtenteId(): int { return $this->utenteId; }
    public function getUtenteTipo(): string { return $this->utenteTipo; }
    public function getTipo(): string { return $this->tipo; }
    public function getDurata(): string { return $this->durata; }
    public function getMotivazione(): string { return $this->motivazione; }
    public function getGravita(): string { return $this->gravita; }
    public function getDescrizione(): ?string { return $this->descrizione; }
    public function getData(): DateTime { return $this->data; }
}