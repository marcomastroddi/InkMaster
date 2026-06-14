<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'appuntamenti')]
class Appuntamento 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'date')]
    private DateTime $data;

    #[ORM\Column(type: 'time')]
    private DateTime $oraInizio;

    #[ORM\Column(type: 'time')]
    private DateTime $oraFine;

    #[ORM\Column(type: 'string', length: 50)]
    private string $stato;

    // Le note sono un testo lungo e possono essere lasciate vuote (nullable: true)
    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $note = null;

    // 1. Relazione con Cliente (Molti appuntamenti a un Cliente)
    #[ORM\ManyToOne(targetEntity: Cliente::class)]
    #[ORM\JoinColumn(name: 'cliente_id', referencedColumnName: 'id', nullable: false)]
    private Cliente $cliente;

    // 2. Relazione con Studio (Molti appuntamenti a uno Studio)
    #[ORM\ManyToOne(targetEntity: Studio::class)]
    #[ORM\JoinColumn(name: 'studio_id', referencedColumnName: 'id', nullable: false)]
    private Studio $studio;

    // 3. Relazione con Pagamento (Bidirezionale rispetto a Pagamento.php)
    #[ORM\OneToOne(mappedBy: 'appuntamento', targetEntity: Pagamento::class)]
    private ?Pagamento $pagamento = null;

    // 4. Relazione con Messaggi (Un appuntamento ha molti messaggi)
    #[ORM\OneToMany(mappedBy: 'appuntamento', targetEntity: Messaggio::class)]
    private Collection $messaggi;


    // COSTRUTTORE
    public function __construct(
        DateTime $data, 
        DateTime $oraInizio, 
        DateTime $oraFine, 
        string $stato, 
        Cliente $cliente, 
        Studio $studio,
        ?string $note = null
    ) {
        $this->data = $data;
        $this->oraInizio = $oraInizio;
        $this->oraFine = $oraFine;
        $this->stato = $stato;
        $this->cliente = $cliente;
        $this->studio = $studio;
        $this->note = $note;
        
        // In Doctrine Le relazioni "OneToMany" (collezioni) 
        // vanno sempre inizializzate nel costruttore come ArrayCollection vuote.
        $this->messaggi = new ArrayCollection();
    }

    //Metodi getter
    public function getId(): ?int 
    {
        return $this->id;
    }

    public function getData(): DateTime 
    {
        return $this->data;
    }

    public function getOraInizio(): DateTime 
    {
        return $this->oraInizio;
    }

    public function getOraFine(): DateTime 
    {
        return $this->oraFine;
    }

    public function getStato(): string 
    {
        return $this->stato;
    }

    public function getNote(): ?string 
    {
        return $this->note;
    }

    public function getCliente(): Cliente 
    {
        return $this->cliente;
    }

    public function getStudio(): Studio 
    {
        return $this->studio;
    }

    public function getPagamento(): ?Pagamento 
    {
        return $this->pagamento;
    }

    public function getMessaggi(): Collection 
    {
        return $this->messaggi;
    }

    // Blocco setter
    public function setData(DateTime $data): void 
    {
        $this->data = $data;
    }

    public function setOraInizio(DateTime $oraInizio): void 
    {
        $this->oraInizio = $oraInizio;
    }

    public function setOraFine(DateTime $oraFine): void 
    {
        $this->oraFine = $oraFine;
    }

    public function setStato(string $stato): void 
    {
        $this->stato = $stato;
    }

    public function setNote(?string $note): void 
    {
        $this->note = $note;
    }

    public function setCliente(Cliente $cliente): void 
    {
        $this->cliente = $cliente;
    }

    public function setStudio(Studio $studio): void 
    {
        $this->studio = $studio;
    }

    public function setPagamento(?Pagamento $pagamento): void 
    {
        $this->pagamento = $pagamento;
    }
}