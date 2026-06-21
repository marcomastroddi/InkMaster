<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'carte_credito')]
class CartaDiCredito
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    private string $nomeIntestatario;

    #[ORM\Column(type: 'string', length: 100)]
    private string $cognomeIntestatario;

    #[ORM\Column(type: 'string', length: 16)]
    private string $numeroCarta;

    #[ORM\Column(type: 'date')]
    private DateTime $dataScadenza;

    #[ORM\Column(type: 'string', length: 4)]
    private string $cvv;

    // COSTRUTTORE - Nota: L'ID non va nel costruttore perché lo genera automaticamente il database
    public function __construct(
        string $nomeIntestatario, 
        string $cognomeIntestatario, 
        string $numeroCarta, 
        DateTime $dataScadenza, 
        string $cvv
    ) {
        $this->nomeIntestatario = $nomeIntestatario;
        $this->cognomeIntestatario = $cognomeIntestatario;
        $this->numeroCarta = $numeroCarta;
        $this->dataScadenza = $dataScadenza;
        $this->cvv = $cvv;
    }

    //Metodi getter

    public function getId(): ?int 
    {
        return $this->id;
    }

    public function getNomeIntestatario(): string 
    {
        return $this->nomeIntestatario;
    }

    public function getCognomeIntestatario(): string 
    {
        return $this->cognomeIntestatario;
    }

    public function getNumeroCarta(): string 
    {
        return $this->numeroCarta;
    }

    public function getDataScadenza(): DateTime 
    {
        return $this->dataScadenza;
    }

    public function getCvv(): string 
    {
        return $this->cvv;
    }

    //Metodi setter

    public function setNomeIntestatario(string $nomeIntestatario): void 
    {
        $this->nomeIntestatario = $nomeIntestatario;
    }

    public function setCognomeIntestatario(string $cognomeIntestatario): void 
    {
        $this->cognomeIntestatario = $cognomeIntestatario;
    }

    public function setNumeroCarta(string $numeroCarta): void 
    {
        $this->numeroCarta = $numeroCarta;
    }

    public function setDataScadenza(DateTime $dataScadenza): void 
    {
        $this->dataScadenza = $dataScadenza;
    }

    public function setCvv(string $cvv): void 
    {
        $this->cvv = $cvv;
    }
}
