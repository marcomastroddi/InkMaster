<?php

/**
 * SCRIPT DI SEED - InkMaster - Generato da Claude
 * ============================================================
 * Popola il database con dati di test per la fase di sviluppo.
 *
 * USO:
 *   php seed.php
 *
 * NOTA: pensato solo per ambiente di sviluppo locale.
 * Non usare in produzione
 */

use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Amministratore;
use InkMaster\Entity\Stile;
use InkMaster\Entity\Tatuaggio;
use InkMaster\Entity\Appuntamento;
use InkMaster\Entity\Pagamento;
use InkMaster\Entity\Cartadicredito;
use InkMaster\Entity\Recensione;
use InkMaster\Entity\Pubblicazione;
use InkMaster\Entity\Segnalazione;
use InkMaster\Entity\Messaggio;

// Recuperiamo l'EntityManager già configurato (stessa connessione usata dal resto dell'app)
/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = require __DIR__ . '/../config/bootstrap-doctrine.php';

echo "Avvio popolamento database InkMaster...\n";

// ------------------------------------------------------------
// 1. STILI (nessuna dipendenza da altre entità)
// ------------------------------------------------------------

$stileRealistico    = new Stile('Realistico','Tatuaggio che riproduce soggetti (volti, animali, oggetti) con dettagli, ombreggiature e proporzioni fedeli alla realtà, quasi fotografici.');
$stileTradizionale  = new Stile('Tradizionale','Stile classico americano con contorni neri marcati, colori pieni e a contrasto, e soggetti iconici come rose, ancore e rondini.');
$stileLettering      = new Stile('Lettering', 'Tatuaggio composto da scritte, frasi o nomi, realizzato con font calligrafici, corsivi o personalizzati.');
$stileNeotradizionale  = new Stile('Neotradizionale', 'Evoluzione dello stile tradizionale con forme esagerate, prospettive dinamiche e una palette di colori più ampia e vivace.');
$stileBlackwork      = new Stile('Blackwork', 'Tatuaggio realizzato esclusivamente con inchiostro nero, spesso con grandi campiture piene, pattern geometrici o ornamentali.');
$stileDotwork        = new Stile('Dotwork', 'Tecnica basata sulla composizione di punti che, accostati con densità variabile, creano ombreggiature, texture e disegni geometrici o mandala.');
$stileGiapponese     = new Stile('Giapponese', 'Stile tradizionale giapponese con soggetti iconici come draghi, fiori di ciliegio, samurai e onde, spesso in grandi composizioni che coprono ampie aree del corpo.');
$stileTribale       = new Stile('Tribale', 'isegni a campiture nere piene con linee curve e angolari, ispirati alle tradizioni tribali polinesiane, maori e di altre culture indigene.');
$stileWatercolor    = new Stile('Watercolor', 'Tatuaggio che imita l\'effetto dell\'acquerello, con colori sfumati, spruzzi e contorni spesso assenti o minimi.');
$stileFineline       = new Stile('Fineline', 'Stile essenziale basato su linee sottili e disegni di piccole dimensioni, spesso senza ombreggiature o colore.');

foreach ([$stileRealistico, $stileTradizionale, $stileLettering, $stileNeotradizionale, $stileBlackwork, $stileDotwork, $stileGiapponese, $stileTribale, $stileWatercolor, $stileFineline] as $stile) {
    $entityManager->persist($stile);
}

// ------------------------------------------------------------
// 2. STUDI (nessuna dipendenza da altre entità)
// ------------------------------------------------------------
$studioRoma = new Studio(
    nome: 'Black Needle Studio',
    partitaIva: '12345678901',
    posizione: 'Via Roma 10, Roma',
    email: 'info@blackneedle.it',
    descrizione: 'Studio specializzato in stili tradizionali e blackwork',
    telefono: '0612345678',
    orariApertura: ['lun' => '10:00', 'mar' => '10:00', 'mer' => '10:00', 'gio' => '10:00', 'ven' => '10:00'],
    orariChiusura: ['lun' => '19:00', 'mar' => '19:00', 'mer' => '19:00', 'gio' => '19:00', 'ven' => '19:00']
);

$studioMilano = new Studio(
    nome: 'InkSpire Tattoo',
    partitaIva: '98765432109',
    posizione: 'Corso Buenos Aires 50, Milano',
    email: 'contatti@inkspire.it',
    descrizione: 'Studio moderno con focus su realismo e giapponese',
    telefono: '0298765432',
    orariApertura: ['lun' => '09:30', 'mar' => '09:30', 'mer' => '09:30', 'gio' => '09:30', 'ven' => '09:30', 'sab' => '10:00'],
    orariChiusura: ['lun' => '18:30', 'mar' => '18:30', 'mer' => '18:30', 'gio' => '18:30', 'ven' => '18:30', 'sab' => '13:00']
);

$entityManager->persist($studioRoma);
$entityManager->persist($studioMilano);

// ------------------------------------------------------------
// 3. TATUATORI (richiedono uno Studio già esistente nel costruttore)
// ------------------------------------------------------------
$tatuatore1 = new Tatuatore(
    nome: 'Marco',
    cognome: 'Bianchi',
    password: 'hash_password_placeholder_1', // in produzione: password già hashata (es. bcrypt)
    dataNascita: new DateTime('1990-04-12'),
    studio: $studioRoma
);
$tatuatore1->addStile($stileTradizionale);
$tatuatore1->addStile($stileBlackwork);

$tatuatore2 = new Tatuatore(
    nome: 'Giulia',
    cognome: 'Verdi',
    password: 'hash_password_placeholder_2',
    dataNascita: new DateTime('1993-09-23'),
    studio: $studioMilano
);
$tatuatore2->addStile($stileRealistico);
$tatuatore2->addStile($stileGiapponese);

$entityManager->persist($tatuatore1);
$entityManager->persist($tatuatore2);

// ------------------------------------------------------------
// 4. CLIENTI (nessuna dipendenza da altre entità nel costruttore)
// ------------------------------------------------------------
$cliente1 = new Cliente(
    nome: 'Luca',
    cognome: 'Rossi',
    password: 'hash_password_placeholder_3',
    dataNascita: new DateTime('1998-01-15'),
    email: 'luca.rossi@example.com',
    posizione: 'Roma'
);

$cliente2 = new Cliente(
    nome: 'Sara',
    cognome: 'Ferrari',
    password: 'hash_password_placeholder_4',
    dataNascita: new DateTime('2000-07-30'),
    email: 'sara.ferrari@example.com',
    posizione: 'Milano'
);

$entityManager->persist($cliente1);
$entityManager->persist($cliente2);

// ------------------------------------------------------------
// 5. AMMINISTRATORE (nessuna dipendenza)
// ------------------------------------------------------------
$admin = new Amministratore(
    nome: 'Admin',
    cognome: 'InkMaster',
    password: 'hash_password_placeholder_admin'
);
$entityManager->persist($admin);

// ------------------------------------------------------------
// 6. TATUAGGI (dipendono solo dagli Stili per il collegamento ManyToMany)
// ------------------------------------------------------------
$tatuaggio1 = new Tatuaggio(
    costo: 150.00,
    posizione: 'Avambraccio',
    grandezza: '10x10 cm'
);
$tatuaggio1->addStile($stileTradizionale);

$tatuaggio2 = new Tatuaggio(
    costo: 300.00,
    posizione: 'Schiena',
    grandezza: '30x40 cm'
);
$tatuaggio2->addStile($stileGiapponese);

$entityManager->persist($tatuaggio1);
$entityManager->persist($tatuaggio2);

// ------------------------------------------------------------
// 7. PUBBLICAZIONI (dipendono da Studio + Tatuaggio)
// ------------------------------------------------------------
$pubblicazione1 = new Pubblicazione(
    titolo: 'Nuovo lavoro: drago giapponese',
    data: new DateTime('2026-05-10'),
    ora: new DateTime('15:30'),
    studio: $studioMilano,
    tatuaggio: $tatuaggio2,
    descrizione: 'Realizzato in tre sessioni'
);
$entityManager->persist($pubblicazione1);

// ------------------------------------------------------------
// 8. APPUNTAMENTI (dipendono da Cliente + Studio)
//    NB: il costruttore richiede pagamento? No, il campo $pagamento
//    è nullable e va impostato DOPO con setPagamento().
// ------------------------------------------------------------
$appuntamento1 = new Appuntamento(
    data: new DateTime('2026-07-01'),
    oraInizio: new DateTime('10:00'),
    oraFine: new DateTime('12:00'),
    stato: 'CONFERMATO',
    cliente: $cliente1,
    studio: $studioRoma,
    note: 'Prima sessione, ritocco previsto'
);
$entityManager->persist($appuntamento1);

$appuntamento2 = new Appuntamento(
    data: new DateTime('2026-07-15'),
    oraInizio: new DateTime('14:00'),
    oraFine: new DateTime('16:30'),
    stato: 'IN_ATTESA',
    cliente: $cliente2,
    studio: $studioMilano
);
$entityManager->persist($appuntamento2);

// Flush intermedio: necessario perché Pagamento richiede un Appuntamento
// già esistente (relazione 1 a 1 bidirezionale) nel suo costruttore.
$entityManager->flush();

// ------------------------------------------------------------
// 9. CARTE DI CREDITO (nessuna dipendenza da altre entità)
// ------------------------------------------------------------
$carta1 = new Cartadicredito(
    nomeIntestatario: 'Luca',
    cognomeIntestatario: 'Rossi',
    numeroCarta: '4111111111111111',
    dataScadenza: new DateTime('2028-12-01'),
    cvv: '123'
);

$carta2 = new Cartadicredito(
    nomeIntestatario: 'Sara',
    cognomeIntestatario: 'Ferrari',
    numeroCarta: '5500000000000004',
    dataScadenza: new DateTime('2027-06-01'),
    cvv: '456'
);

$entityManager->persist($carta1);
$entityManager->persist($carta2);

// ------------------------------------------------------------
// 10. PAGAMENTI (dipendono da Appuntamento + CartaDiCredito)
//     e poi vanno ricollegati all'Appuntamento via setPagamento()
//     per completare la relazione bidirezionale 1 a 1.
// ------------------------------------------------------------
$pagamento1 = new Pagamento(
    importo: 150.00,
    stato: 'PAGATO',
    appuntamento: $appuntamento1,
    cartaDiCredito: $carta1
);
$appuntamento1->setPagamento($pagamento1);

$pagamento2 = new Pagamento(
    importo: 300.00,
    stato: 'IN_ATTESA',
    appuntamento: $appuntamento2,
    cartaDiCredito: $carta2
);
$appuntamento2->setPagamento($pagamento2);

$entityManager->persist($pagamento1);
$entityManager->persist($pagamento2);

// ------------------------------------------------------------
// 11. MESSAGGI (dipendono da Appuntamento)
// ------------------------------------------------------------
$messaggio1 = new Messaggio(
    mittenteId: 1, // corrisponde a $cliente1 dopo il flush
    mittenteTipo: 'CLIENTE',
    destinatarioId: 1, // corrisponde a $studioRoma
    destinatarioTipo: 'STUDIO',
    appuntamento: $appuntamento1,
    testo: 'Buongiorno, confermo la presenza per il 1 luglio.'
);
$entityManager->persist($messaggio1);

// ------------------------------------------------------------
// 12. RECENSIONI (dipendono da Cliente + Studio)
// ------------------------------------------------------------
$recensione1 = new Recensione(
    voto: 5,
    data: new DateTime('2026-06-01'),
    cliente: $cliente1,
    studio: $studioRoma,
    descrizione: 'Esperienza fantastica, personale molto professionale'
);
$entityManager->persist($recensione1);

// ------------------------------------------------------------
// 13. SEGNALAZIONI (cliente e studio sono opzionali/nullable)
// ------------------------------------------------------------
$segnalazione1 = new Segnalazione(
    motivo: 'Ritardo appuntamento',
    descrizione: 'Lo studio ha posticipato senza preavviso',
    data: new DateTime('2026-06-05')
);
$segnalazione1->setCliente($cliente2);
$segnalazione1->setStudio($studioMilano);
$entityManager->persist($segnalazione1);

// ------------------------------------------------------------
// FLUSH FINALE: scrive tutto il resto sul database
// ------------------------------------------------------------
$entityManager->flush();

echo "Seed completato con successo.\n";
echo " - " . 10 . " stili\n";
echo " - " . 2 . " studi\n";
echo " - " . 2 . " tatuatori\n";
echo " - " . 2 . " clienti\n";
echo " - " . 1 . " amministratore\n";
echo " - " . 2 . " tatuaggi\n";
echo " - " . 1 . " pubblicazione\n";
echo " - " . 2 . " appuntamenti\n";
echo " - " . 2 . " pagamenti\n";
echo " - " . 2 . " carte di credito\n";
echo " - " . 1 . " messaggio\n";
echo " - " . 1 . " recensione\n";
echo " - " . 1 . " segnalazione\n";