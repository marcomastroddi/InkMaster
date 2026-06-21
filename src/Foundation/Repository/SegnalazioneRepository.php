<?php
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\Segnalazione;
use DateTime;

class SegnalazioneRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function findAllSegnalazioni(): array
    {
        return [
            new Segnalazione('Comportamento scorretto', 'L\'utente ha insultato altri utenti nella chat.', new DateTime('2024-01-10')),
            new Segnalazione('Contenuto inappropriato', 'Foto del portfolio non conformi alle linee guida.', new DateTime('2024-02-15')),
            new Segnalazione('Spam', 'L\'utente ha inviato messaggi ripetuti a più studi.', new DateTime('2024-03-20')),
        ];
    }
}