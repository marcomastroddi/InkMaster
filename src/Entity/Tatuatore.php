<?php

namespace InkMaster\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'tatuatori')]
class Tatuatore extends Persona 
{
    #[ORM\Column(type: 'date')]
    private DateTime $dataNascita;

    #[ORM\ManyToOne(targetEntity: Studio::class, inversedBy: 'tatuatori')]
    #[ORM\JoinColumn(name: 'studio_id', referencedColumnName: 'id', nullable: false)]
    private Studio $studio;

    #[ORM\ManyToMany(targetEntity: Stile::class, inversedBy: 'tatuatori')]
    #[ORM\JoinTable(name: 'tatuatori_stili')]
    private Collection $stili;

    public function __construct(
        string $nome, 
        string $cognome, 
        DateTime $dataNascita, 
        Studio $studio
    ) {
        parent::__construct($nome, $cognome);
        $this->dataNascita = $dataNascita;
        $this->studio = $studio;
        $this->stili = new ArrayCollection();
    }

    public function getDataNascita(): DateTime 
    {
        return $this->dataNascita;
    }

    public function getStudio(): Studio 
    {
        return $this->studio;
    }

    public function getStili(): Collection 
    {
        return $this->stili;
    }

    public function setDataNascita(DateTime $dataNascita): void 
    {
        $this->dataNascita = $dataNascita;
    }

    public function setStudio(Studio $studio): void 
    {
        $this->studio = $studio;
    }

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