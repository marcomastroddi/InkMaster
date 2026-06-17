<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'pagamenti')]
class Pagamento 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private float $importo;

    #[ORM\Column(type: 'datetime')]
    private DateTime $data;

    #[ORM\Column(type: 'string', length: 50)]
    private string $stato;

    /**
     * RELAZIONE CON APPUNTAMENTO (1 a 1)
     * indica che la tabella 'pagamenti' conterrà una colonna 'appuntamento_id' (chiave esterna)
     */
    #[ORM\OneToOne(targetEntity: Appuntamento::class, mappedBy: 'pagamento')]
    private Appuntamento $appuntamento;

    /**
     * RELAZIONE CON CARTA DI CREDITO (Molti a 1)
     */
    #[ORM\ManyToOne(targetEntity: Cartadicredito::class)]
    #[ORM\JoinColumn(name: 'carta_credito_id', referencedColumnName: 'id', nullable: false)]
    private Cartadicredito $cartaDiCredito;

    // COSTRUTTORE
    // Nota: L'ID non va nel costruttore perché lo genera automaticamente il database
    public function __construct(float $importo, string $stato, Appuntamento $appuntamento, Cartadicredito $cartaDiCredito) 
    {
        $this->importo = $importo;
        $this->stato = $stato;
        $this->appuntamento = $appuntamento;
        $this->cartaDiCredito = $cartaDiCredito;
        $this->data = new DateTime(); // Imposta automaticamente la data e l'ora correnti al momento del pagamento
    }

    
    //Metodi getter
    public function getId(): ?int 
    {
        return $this->id;
    }

    public function getImporto(): float 
    {
        return $this->importo;
    }

    public function getData(): DateTime 
    {
        return $this->data;
    }

    public function getStato(): string 
    {
        return $this->stato;
    }

    public function getAppuntamento(): Appuntamento 
    {
        return $this->appuntamento;
    }

    public function getCartaDiCredito(): Cartadicredito 
    {
        return $this->cartaDiCredito;
    }

    //Metodi setter
    public function setImporto(float $importo): void 
    {
        $this->importo = $importo;
    }
 
    public function setData(DateTime $data): void 
    {
        $this->data = $data;
    }

    public function setStato(string $stato): void 
    {
        $this->stato = $stato;
    }

    public function setAppuntamento(Appuntamento $appuntamento): void 
    {
        $this->appuntamento = $appuntamento;
    }

    public function setCartaDiCredito(Cartadicredito $cartaDiCredito): void 
    {
        $this->cartaDiCredito = $cartaDiCredito;
    }
}
