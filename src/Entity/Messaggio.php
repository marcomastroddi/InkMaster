<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'messaggi')]
class Messaggio 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    // Il testo può essere nullable se l'utente invia solo un'immagine
    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $testo = null;

    #[ORM\Column(type: 'date')]
    private DateTime $dataInvio;

    #[ORM\Column(type: 'time')]
    private DateTime $oraInvio;

    // L'attributo dell'immagine lo esprimiamo come stringa che conterrà il percorso o URL dell'immagine. Può essere nullable se l'utente invia solo testo.
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $immagine = null;

    #[ORM\Column(type: 'integer')]
    private int $mittenteId;

    #[ORM\Column(type: 'string', length: 50)]
    private string $mittenteTipo; // es. 'CLIENTE', 'STUDIO', 'TATUATORE'

    #[ORM\Column(type: 'integer')]
    private int $destinatarioId;

    #[ORM\Column(type: 'string', length: 50)]
    private string $destinatarioTipo;

    // Relazione bidirezionale: Molti messaggi appartengono a un Appuntamento
    #[ORM\ManyToOne(targetEntity: Appuntamento::class, inversedBy: 'messaggi')]
    #[ORM\JoinColumn(name: 'appuntamento_id', referencedColumnName: 'id', nullable: false)]
    private Appuntamento $appuntamento;

    // Costruttore
    public function __construct(
        int $mittenteId,
        string $mittenteTipo,
        int $destinatarioId,
        string $destinatarioTipo,
        Appuntamento $appuntamento,
        ?string $testo = null,
        ?string $immagine = null
    ) {
        $this->mittenteId = $mittenteId;
        $this->mittenteTipo = $mittenteTipo;
        $this->destinatarioId = $destinatarioId;
        $this->destinatarioTipo = $destinatarioTipo;
        $this->appuntamento = $appuntamento;
        $this->testo = $testo;
        $this->immagine = $immagine;
        
        // Data e ora vengono impostate automaticamente al momento dell'invio
        $this->dataInvio = new DateTime();
        $this->oraInvio = new DateTime();
    }

    // Metodi getter
    public function getId(): ?int 
    {
        return $this->id;
    }

    public function getTesto(): ?string 
    {
        return $this->testo;
    }

    public function getDataInvio(): DateTime 
    {
        return $this->dataInvio;
    }

    public function getOraInvio(): DateTime 
    {
        return $this->oraInvio;
    }

    public function getImmagine(): ?string 
    {
        return $this->immagine;
    }

    public function getMittenteId(): int 
    {
        return $this->mittenteId;
    }

    public function getMittenteTipo(): string 
    {
        return $this->mittenteTipo;
    }

    public function getDestinatarioId(): int 
    {
        return $this->destinatarioId;
    }

    public function getDestinatarioTipo(): string 
    {
        return $this->destinatarioTipo;
    }

    public function getAppuntamento(): Appuntamento 
    {
        return $this->appuntamento;
    }

    // Metodi setter
    public function setTesto(?string $testo): void 
    {
        $this->testo = $testo;
    }

    public function setDataInvio(DateTime $dataInvio): void 
    {
        $this->dataInvio = $dataInvio;
    }

    public function setOraInvio(DateTime $oraInvio): void 
    {
        $this->oraInvio = $oraInvio;
    }

    public function setImmagine(?string $immagine): void 
    {
        $this->immagine = $immagine;
    }

    public function setMittenteId(int $mittenteId): void 
    {
        $this->mittenteId = $mittenteId;
    }

    public function setMittenteTipo(string $mittenteTipo): void 
    {
        $this->mittenteTipo = $mittenteTipo;
    }

    public function setDestinatarioId(int $destinatarioId): void 
    {
        $this->destinatarioId = $destinatarioId;
    }

    public function setDestinatarioTipo(string $destinatarioTipo): void 
    {
        $this->destinatarioTipo = $destinatarioTipo;
    }

    public function setAppuntamento(Appuntamento $appuntamento): void 
    {
        $this->appuntamento = $appuntamento;
    }
}