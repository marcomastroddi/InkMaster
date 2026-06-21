<?php
//Va dentro PersonaRepository perché seleziona_utente lavora su utenti generici — l'amministratore non sa se sta bannando un Cliente o un Tatuatore.
//Però Persona è astratta, quindi per i dati fittizi siamo costretti ad usare Cliente che è la classe concreta. Quando ci sarà il DB reale, Doctrine gestirà automaticamente entrambi i tipi.
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\Cliente;
use DateTime;

class PersonaRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function findById(int $id): ?Cliente
    {
        return new Cliente(
            'Mario',
            'Rossi',
            'password123',
            new DateTime('1990-05-15'),
            'mario.rossi@email.it',
            'Roma'
        );
    }
    
}