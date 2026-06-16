<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'segnalazioni')]
class Segnalazione 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 150)]
    private string $motivo;

    #[ORM\Column(type: 'text')]
    private string $descrizione;

    #[ORM\Column(type: 'date')]
    private DateTime $data;

    #[ORM\Column(type: 'string', length: 30)]
    private string $stato = 'APERTA'; // Impostiamo un valore predefinito

    // Relazione 1. Chi segnala: Può essere un Cliente (unidirezionale e molti a uno, nullable)
    #[ORM\ManyToOne(targetEntity: Cliente::class)]
    #[ORM\JoinColumn(name: 'cliente_id', referencedColumnName: 'id', nullable: true)]
    private ?Cliente $cliente = null;

    // Relazione 2. Chi segnala: Può essere uno Studio (unidirezionale perchè difficilmente a uno studio serve la lista di segnalazioni, nullable)
    #[ORM\ManyToOne(targetEntity: Studio::class)]
    #[ORM\JoinColumn(name: 'studio_id', referencedColumnName: 'id', nullable: true)]
    private ?Studio $studio = null;

    // Relazione3. Chi gestisce: L'amministratore incaricato (Molti a 1, nullable all'inizio)
    #[ORM\ManyToOne(targetEntity: Amministratore::class)]
    #[ORM\JoinColumn(name: 'amministratore_id', referencedColumnName: 'id', nullable: true)]
    private ?Amministratore $amministratore = null;


    // Costruttore
    public function __construct(string $motivo, string $descrizione, DateTime $data) 
    {
        $this->motivo = $motivo;
        $this->descrizione = $descrizione;
        $this->data = $data;
    }

    // Metodi getter
    public function getId(): ?int 
    {
        return $this->id;
    }

    public function getMotivo(): string 
    {
        return $this->motivo;
    }

    public function getDescrizione(): string 
    {
        return $this->descrizione;
    }

    public function getData(): DateTime 
    {
        return $this->data;
    }

    public function getStato(): string 
    {
        return $this->stato;
    }

    public function getCliente(): ?Cliente 
    {
        return $this->cliente;
    }

    public function getStudio(): ?Studio 
    {
        return $this->studio;
    }

    public function getAmministratore(): ?Amministratore 
    {
        return $this->amministratore;
    }

    // Metodi setter
    public function setMotivo(string $motivo): void 
    {
        $this->motivo = $motivo;
    }

    public function setDescrizione(string $descrizione): void 
    {
        $this->descrizione = $descrizione;
    }

    public function setData(DateTime $data): void 
    {
        $this->data = $data;
    }

    public function setStato(string $stato): void 
    {
        $this->stato = $stato;
    }

    public function setCliente(?Cliente $cliente): void 
    {
        $this->cliente = $cliente;
    }

    public function setStudio(?Studio $studio): void 
    {
        $this->studio = $studio;
    }

    public function setAmministratore(?Amministratore $amministratore): void 
    {
        $this->amministratore = $amministratore;
    }
}