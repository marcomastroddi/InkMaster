<?php
namespace InkMaster\Foundation;

use InkMaster\Entity\Stile;

class StileRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    /**
     * @return Stile[]
     */
    public function findAvailableStyles(): array
    {
        return [
            new Stile('Realistico', 'Riproduce immagini fotografiche con dettagli, luci e ombre estremamente fedeli alla realtà.'),
            new Stile('Giapponese', 'Stile tradizionale orientale (Irezumi), con grandi composizioni, draghi, koi e colori vivaci.'),
            new Stile('Blackwork', 'Utilizza solo inchiostro nero, spaziando da disegni geometrici a pieni totali (blackout).'),
            new Stile('Watercolor', 'Imita l\'effetto di un acquerello, con colori sfumati e l\'assenza di contorni netti.'),
            new Stile('Tradizionale', 'Conosciuto anche come Old School, con linee marcate, pochi colori netti e soggetti classici (ancore, rose).'),
        ];
    }
}