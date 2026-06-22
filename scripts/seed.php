<?php

/**
 * SCRIPT DI SEED - InkMaster
 * ============================================================
 * Popola il database con dati sufficienti a testare tutti i metodi
 * del Foundation layer (PersistentManager + Repository).
 *
 * USO:
 *   php scripts/seed.php
 *
 * NOTA: solo per ambiente di sviluppo locale.
 */

use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Amministratore;
use InkMaster\Entity\Stile;
use InkMaster\Entity\Tatuaggio;
use InkMaster\Entity\Appuntamento;
use InkMaster\Entity\Pagamento;
use InkMaster\Entity\CartaDiCredito;
use InkMaster\Entity\Recensione;
use InkMaster\Entity\Pubblicazione;
use InkMaster\Entity\Segnalazione;
use InkMaster\Entity\Messaggio;
use InkMaster\Enum\Citta;

/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = require __DIR__ . '/../config/bootstrap-doctrine.php';

echo "Avvio popolamento database InkMaster...\n";

// ============================================================
// 1. STILI
//    Copertura: findAvailableStyles(), findById(), findStiliByStudioId()
// ============================================================
$stileRealistico      = new Stile('Realistico',      'Riproduce soggetti con dettagli fotografici, ombreggiature fedeli alla realtà.');
$stileTradizionale    = new Stile('Tradizionale',    'Stile classico americano con contorni neri marcati e colori pieni.');
$stileLettering       = new Stile('Lettering',       'Scritte, frasi o nomi con font calligrafici o personalizzati.');
$stileNeotradizionale = new Stile('Neotradizionale', 'Evoluzione del tradizionale con forme esagerate e palette più ampia.');
$stileBlackwork       = new Stile('Blackwork',       'Esclusivamente inchiostro nero: campiture, pattern geometrici o ornamentali.');
$stileDotwork         = new Stile('Dotwork',         'Composizione di punti che creano ombreggiature, texture e mandala.');
$stileGiapponese      = new Stile('Giapponese',      'Draghi, fiori di ciliegio, samurai e onde in grandi composizioni.');
$stileTribale         = new Stile('Tribale',         'Campiture nere ispirate alle tradizioni polinesiane e maori.');
$stileWatercolor      = new Stile('Watercolor',      'Imita l\'acquerello con colori sfumati e contorni minimi.');
$stileFineline        = new Stile('Fineline',        'Linee sottilissime e disegni minimal, senza ombreggiature o colore.');

$tuttiStili = [
    $stileRealistico, $stileTradizionale, $stileLettering, $stileNeotradizionale,
    $stileBlackwork, $stileDotwork, $stileGiapponese, $stileTribale,
    $stileWatercolor, $stileFineline,
];
foreach ($tuttiStili as $stile) {
    $entityManager->persist($stile);
}

// ============================================================
// 2. STUDI (6 studi in città diverse)
//    Copertura: findAvailableStudios(), findById(), findByUsername(),
//               findStudiRandom(), countStudi()
// ============================================================
$studioRoma = new Studio(
    nome: 'Black Needle Studio',
    partitaIva: '12345678901',
    posizione: Citta::Roma,
    email: 'info@blackneedle.it',
    username: 'black_needle',
    password: password_hash('BlackNeedle2024!', PASSWORD_BCRYPT),
    descrizione: 'Studio storico di Roma specializzato in blackwork e tradizionale. Aperto dal 2010.',
    telefono: '0612345678',
    orariApertura: ['lun' => '10:00', 'mar' => '10:00', 'mer' => '10:00', 'gio' => '10:00', 'ven' => '10:00'],
    orariChiusura: ['lun' => '19:00', 'mar' => '19:00', 'mer' => '19:00', 'gio' => '19:00', 'ven' => '19:00']
);

$studioMilano = new Studio(
    nome: 'InkSpire Tattoo',
    partitaIva: '98765432109',
    posizione: Citta::Milano,
    email: 'contatti@inkspire.it',
    username: 'inkspire_milano',
    password: password_hash('InkSpire2024!', PASSWORD_BCRYPT),
    descrizione: 'Studio moderno a Milano con focus su realismo e giapponese. Artisti premiati a livello internazionale.',
    telefono: '0298765432',
    orariApertura: ['lun' => '09:30', 'mar' => '09:30', 'mer' => '09:30', 'gio' => '09:30', 'ven' => '09:30', 'sab' => '10:00'],
    orariChiusura: ['lun' => '18:30', 'mar' => '18:30', 'mer' => '18:30', 'gio' => '18:30', 'ven' => '18:30', 'sab' => '14:00']
);

$studioNapoli = new Studio(
    nome: 'Vesuvio Ink',
    partitaIva: '11223344556',
    posizione: Citta::Napoli,
    email: 'hello@vesuvioink.it',
    username: 'vesuvio_ink',
    password: password_hash('VesuvioInk2024!', PASSWORD_BCRYPT),
    descrizione: 'Il cuore del tatuaggio napoletano: tradizione, watercolor e dotwork in un unico studio.',
    telefono: '0811234567',
    orariApertura: ['lun' => '11:00', 'mar' => '11:00', 'mer' => '11:00', 'gio' => '11:00', 'ven' => '11:00'],
    orariChiusura: ['lun' => '20:00', 'mar' => '20:00', 'mer' => '20:00', 'gio' => '20:00', 'ven' => '20:00']
);

$studioTorino = new Studio(
    nome: 'Alpine Tattoo',
    partitaIva: '66778899001',
    posizione: Citta::Torino,
    email: 'info@alpinetattoo.it',
    username: 'alpine_tattoo',
    password: password_hash('AlpineTattoo2024!', PASSWORD_BCRYPT),
    descrizione: 'Studio torinese specializzato in fineline, lettering e neotradizionale.',
    telefono: '0119988776',
    orariApertura: ['lun' => '10:00', 'mar' => '10:00', 'mer' => '10:00', 'gio' => '10:00', 'ven' => '10:00', 'sab' => '10:00'],
    orariChiusura: ['lun' => '18:00', 'mar' => '18:00', 'mer' => '18:00', 'gio' => '18:00', 'ven' => '18:00', 'sab' => '13:00']
);

$studioFirenze = new Studio(
    nome: 'Rinascimento Ink',
    partitaIva: '55443322110',
    posizione: Citta::Firenze,
    email: 'studio@rinascimentoink.it',
    username: 'rinascimento_ink',
    password: password_hash('Rinascimento2024!', PASSWORD_BCRYPT),
    descrizione: 'Arte rinascimentale incontra il tatuaggio. Specializzati in realismo e stile giapponese.',
    telefono: '0554433221',
    orariApertura: ['lun' => '09:00', 'mar' => '09:00', 'mer' => '09:00', 'gio' => '09:00', 'ven' => '09:00'],
    orariChiusura: ['lun' => '18:00', 'mar' => '18:00', 'mer' => '18:00', 'gio' => '18:00', 'ven' => '18:00']
);

$studioBologna = new Studio(
    nome: 'Emilia Tattoo Lab',
    partitaIva: '33221100998',
    posizione: Citta::Bologna,
    email: 'lab@emiliatattoo.it',
    username: 'emilia_tattoo',
    password: password_hash('EmiliaLab2024!', PASSWORD_BCRYPT),
    descrizione: 'Lab creativo bolognese: tribale, blackwork e sperimentazione continua.',
    telefono: '0512211009',
    orariApertura: ['lun' => '10:30', 'mar' => '10:30', 'mer' => '10:30', 'gio' => '10:30', 'ven' => '10:30'],
    orariChiusura: ['lun' => '19:30', 'mar' => '19:30', 'mer' => '19:30', 'gio' => '19:30', 'ven' => '19:30']
);

$tuttiStudi = [$studioRoma, $studioMilano, $studioNapoli, $studioTorino, $studioFirenze, $studioBologna];
foreach ($tuttiStudi as $studio) {
    $entityManager->persist($studio);
}

// ============================================================
// 3. TATUATORI (almeno 2 per studio)
//    Copertura: findTatuatoriByStudioId(), findTatuatoreById()
// ============================================================

// --- Roma ---
$tatuatoreMarco = new Tatuatore(
    nome: 'Marco',
    cognome: 'Bianchi',
    dataNascita: new DateTime('1990-04-12'),
    studio: $studioRoma
);
$tatuatoreMarco->addStile($stileTradizionale);
$tatuatoreMarco->addStile($stileBlackwork);

$tatuatoreElena = new Tatuatore(
    nome: 'Elena',
    cognome: 'Conti',
    dataNascita: new DateTime('1994-11-03'),
    studio: $studioRoma
);
$tatuatoreElena->addStile($stileRealistico);
$tatuatoreElena->addStile($stileDotwork);

// --- Milano ---
$tatuatoreGiulia = new Tatuatore(
    nome: 'Giulia',
    cognome: 'Verdi',
    dataNascita: new DateTime('1993-09-23'),
    studio: $studioMilano
);
$tatuatoreGiulia->addStile($stileRealistico);
$tatuatoreGiulia->addStile($stileGiapponese);

$tatuatoreAlessandro = new Tatuatore(
    nome: 'Alessandro',
    cognome: 'Russo',
    dataNascita: new DateTime('1988-06-15'),
    studio: $studioMilano
);
$tatuatoreAlessandro->addStile($stileNeotradizionale);
$tatuatoreAlessandro->addStile($stileWatercolor);

// --- Napoli ---
$tatuatoreSofiaD = new Tatuatore(
    nome: 'Sofia',
    cognome: 'De Luca',
    dataNascita: new DateTime('1996-02-28'),
    studio: $studioNapoli
);
$tatuatoreSofiaD->addStile($stileWatercolor);
$tatuatoreSofiaD->addStile($stileDotwork);

$tatuatoreAntonioM = new Tatuatore(
    nome: 'Antonio',
    cognome: 'Mancini',
    dataNascita: new DateTime('1985-07-19'),
    studio: $studioNapoli
);
$tatuatoreAntonioM->addStile($stileTribale);
$tatuatoreAntonioM->addStile($stileBlackwork);

// --- Torino ---
$tatuatoreLauraN = new Tatuatore(
    nome: 'Laura',
    cognome: 'Neri',
    dataNascita: new DateTime('1992-03-05'),
    studio: $studioTorino
);
$tatuatoreLauraN->addStile($stileFineline);
$tatuatoreLauraN->addStile($stileLettering);

$tatuatoreRiccardo = new Tatuatore(
    nome: 'Riccardo',
    cognome: 'Fontana',
    dataNascita: new DateTime('1991-12-22'),
    studio: $studioTorino
);
$tatuatoreRiccardo->addStile($stileNeotradizionale);
$tatuatoreRiccardo->addStile($stileTradizionale);

// --- Firenze ---
$tatuatoreChiara = new Tatuatore(
    nome: 'Chiara',
    cognome: 'Esposito',
    dataNascita: new DateTime('1997-08-14'),
    studio: $studioFirenze
);
$tatuatoreChiara->addStile($stileRealistico);
$tatuatoreChiara->addStile($stileGiapponese);

$tatuatoreGiovanni = new Tatuatore(
    nome: 'Giovanni',
    cognome: 'Marini',
    dataNascita: new DateTime('1986-01-30'),
    studio: $studioFirenze
);
$tatuatoreGiovanni->addStile($stileDotwork);
$tatuatoreGiovanni->addStile($stileBlackwork);

// --- Bologna ---
$tatuatoreValeria = new Tatuatore(
    nome: 'Valeria',
    cognome: 'Greco',
    dataNascita: new DateTime('1995-05-17'),
    studio: $studioBologna
);
$tatuatoreValeria->addStile($stileTribale);
$tatuatoreValeria->addStile($stileBlackwork);

$tatuatoreDavide = new Tatuatore(
    nome: 'Davide',
    cognome: 'Lombardi',
    dataNascita: new DateTime('1989-10-08'),
    studio: $studioBologna
);
$tatuatoreDavide->addStile($stileLettering);
$tatuatoreDavide->addStile($stileFineline);

$tuttiTatuatori = [
    $tatuatoreMarco, $tatuatoreElena,
    $tatuatoreGiulia, $tatuatoreAlessandro,
    $tatuatoreSofiaD, $tatuatoreAntonioM,
    $tatuatoreLauraN, $tatuatoreRiccardo,
    $tatuatoreChiara, $tatuatoreGiovanni,
    $tatuatoreValeria, $tatuatoreDavide,
];
foreach ($tuttiTatuatori as $t) {
    $entityManager->persist($t);
}

// ============================================================
// 4. CLIENTI (10 clienti)
//    Copertura: findByUsername(), findPersonaById(), countClienti()
// ============================================================
$clienteLuca    = new Cliente('Luca',     'Rossi',      password_hash('Luca2024!', PASSWORD_BCRYPT),     'luca.rossi',      new DateTime('1998-01-15'), 'luca.rossi@example.com',      Citta::Roma->value);
$clienteSara    = new Cliente('Sara',     'Ferrari',    password_hash('Sara2024!', PASSWORD_BCRYPT),     'sara.ferrari',    new DateTime('2000-07-30'), 'sara.ferrari@example.com',    Citta::Milano->value);
$clienteMatteo  = new Cliente('Matteo',   'Gallo',      password_hash('Matteo2024!', PASSWORD_BCRYPT),   'matteo.gallo',    new DateTime('1995-03-22'), 'matteo.gallo@example.com',    Citta::Napoli->value);
$clienteAnna    = new Cliente('Anna',     'Colombo',    password_hash('Anna2024!', PASSWORD_BCRYPT),     'anna.colombo',    new DateTime('2001-11-08'), 'anna.colombo@example.com',    Citta::Torino->value);
$clienteFederico= new Cliente('Federico', 'Ricci',      password_hash('Federico2024!', PASSWORD_BCRYPT), 'federico.ricci',  new DateTime('1993-06-14'), 'federico.ricci@example.com',  Citta::Firenze->value);
$clienteMarta   = new Cliente('Marta',    'Barbieri',   password_hash('Marta2024!', PASSWORD_BCRYPT),    'marta.barbieri',  new DateTime('1999-09-25'), 'marta.barbieri@example.com',  Citta::Bologna->value);
$clienteSimone  = new Cliente('Simone',   'Moretti',    password_hash('Simone2024!', PASSWORD_BCRYPT),   'simone.moretti',  new DateTime('1997-04-03'), 'simone.moretti@example.com',  Citta::Roma->value);
$clienteIlaria  = new Cliente('Ilaria',   'Santoro',    password_hash('Ilaria2024!', PASSWORD_BCRYPT),   'ilaria.santoro',  new DateTime('2002-12-19'), 'ilaria.santoro@example.com',  Citta::Milano->value);
$clienteAndrea  = new Cliente('Andrea',   'Vitale',     password_hash('Andrea2024!', PASSWORD_BCRYPT),   'andrea.vitale',   new DateTime('1991-08-07'), 'andrea.vitale@example.com',   Citta::Genova->value);
$clienteGinevra = new Cliente('Ginevra',  'Pellegrini', password_hash('Ginevra2024!', PASSWORD_BCRYPT),  'ginevra.pell',    new DateTime('2003-02-11'), 'ginevra.pell@example.com',    Citta::Venezia->value);

$tuttiClienti = [
    $clienteLuca, $clienteSara, $clienteMatteo, $clienteAnna, $clienteFederico,
    $clienteMarta, $clienteSimone, $clienteIlaria, $clienteAndrea, $clienteGinevra,
];
foreach ($tuttiClienti as $c) {
    $entityManager->persist($c);
}

// ============================================================
// 5. AMMINISTRATORI (2: uno principale + uno di supporto)
//    Copertura: findByUsername()
// ============================================================
$adminPrincipale = new Amministratore(
    nome: 'Admin',
    cognome: 'InkMaster',
    password: password_hash('AdminInkMaster2024!', PASSWORD_BCRYPT),
    username: 'admin'
);

$adminSupport = new Amministratore(
    nome: 'Supporto',
    cognome: 'InkMaster',
    password: password_hash('SupportInkMaster2024!', PASSWORD_BCRYPT),
    username: 'support'
);

$entityManager->persist($adminPrincipale);
$entityManager->persist($adminSupport);

// ============================================================
// 6. TATUAGGI (12: almeno 2 per studio)
//    Copertura: relazione Pubblicazione → Tatuaggio
// ============================================================
$tatuaggio_trad_avambraccio = new Tatuaggio(costo: 150.00, posizione: 'Avambraccio',  grandezza: '10x10 cm');
$tatuaggio_trad_avambraccio->addStile($stileTradizionale);

$tatuaggio_black_coscia = new Tatuaggio(costo: 200.00, posizione: 'Coscia',        grandezza: '15x20 cm');
$tatuaggio_black_coscia->addStile($stileBlackwork);

$tatuaggio_real_schiena = new Tatuaggio(costo: 600.00, posizione: 'Schiena',       grandezza: '40x50 cm');
$tatuaggio_real_schiena->addStile($stileRealistico);

$tatuaggio_giap_braccio = new Tatuaggio(costo: 350.00, posizione: 'Braccio intero', grandezza: '30x50 cm');
$tatuaggio_giap_braccio->addStile($stileGiapponese);

$tatuaggio_water_polso = new Tatuaggio(costo: 100.00, posizione: 'Polso',          grandezza: '5x7 cm');
$tatuaggio_water_polso->addStile($stileWatercolor);

$tatuaggio_dot_petto = new Tatuaggio(costo: 280.00, posizione: 'Petto',            grandezza: '20x20 cm');
$tatuaggio_dot_petto->addStile($stileDotwork);

$tatuaggio_letter_collo = new Tatuaggio(costo: 80.00, posizione: 'Collo',          grandezza: '5x3 cm');
$tatuaggio_letter_collo->addStile($stileLettering);

$tatuaggio_neotr_polpaccio = new Tatuaggio(costo: 220.00, posizione: 'Polpaccio',  grandezza: '12x18 cm');
$tatuaggio_neotr_polpaccio->addStile($stileNeotradizionale);

$tatuaggio_tribal_spalla = new Tatuaggio(costo: 190.00, posizione: 'Spalla',       grandezza: '15x15 cm');
$tatuaggio_tribal_spalla->addStile($stileTribale);

$tatuaggio_fine_caviglia = new Tatuaggio(costo: 70.00, posizione: 'Caviglia',      grandezza: '4x6 cm');
$tatuaggio_fine_caviglia->addStile($stileFineline);

$tatuaggio_real_coscia = new Tatuaggio(costo: 450.00, posizione: 'Coscia',         grandezza: '25x30 cm');
$tatuaggio_real_coscia->addStile($stileRealistico);
$tatuaggio_real_coscia->addStile($stileDotwork);

$tatuaggio_giap_schiena = new Tatuaggio(costo: 800.00, posizione: 'Schiena intera', grandezza: '50x60 cm');
$tatuaggio_giap_schiena->addStile($stileGiapponese);
$tatuaggio_giap_schiena->addStile($stileBlackwork);

$tuttiTatuaggi = [
    $tatuaggio_trad_avambraccio, $tatuaggio_black_coscia, $tatuaggio_real_schiena,
    $tatuaggio_giap_braccio, $tatuaggio_water_polso, $tatuaggio_dot_petto,
    $tatuaggio_letter_collo, $tatuaggio_neotr_polpaccio, $tatuaggio_tribal_spalla,
    $tatuaggio_fine_caviglia, $tatuaggio_real_coscia, $tatuaggio_giap_schiena,
];
foreach ($tuttiTatuaggi as $tat) {
    $entityManager->persist($tat);
}

// ============================================================
// 7. PUBBLICAZIONI (almeno 2-3 per studio)
//    Copertura: findPortfolioByStudioId(), findDettagliPubblicazione(),
//               savePubblicazione(), deletePubblicazione()
// ============================================================

// Roma
$pub1 = new Pubblicazione('Rose tradizionale su avambraccio', new DateTime('2026-03-10'), new DateTime('14:00'), $studioRoma, $tatuaggio_trad_avambraccio, '/images/pub/roma_rose_trad.jpg', 'Classica rosa tradizionale americana, colori saturi e contorni decisi.');
$pub2 = new Pubblicazione('Mandala dotwork sul petto', new DateTime('2026-04-05'), new DateTime('11:30'), $studioRoma, $tatuaggio_dot_petto, '/images/pub/roma_mandala_dot.jpg', 'Mandala simmetrico con tecnica dotwork pura, 400+ punti.');
$pub3 = new Pubblicazione('Copertura coscia blackwork', new DateTime('2026-05-20'), new DateTime('16:00'), $studioRoma, $tatuaggio_black_coscia, '/images/pub/roma_coscia_black.jpg', 'Copertura totale con pattern geometrico blackwork.');

// Milano
$pub4 = new Pubblicazione('Drago giapponese – schiena intera', new DateTime('2026-02-14'), new DateTime('15:30'), $studioMilano, $tatuaggio_giap_schiena, '/images/pub/milano_drago_giap.jpg', 'Realizzato in 5 sessioni. Drago avvolto tra onde e nuvole.');
$pub5 = new Pubblicazione('Ritratto realistico – coscia', new DateTime('2026-04-22'), new DateTime('10:00'), $studioMilano, $tatuaggio_real_coscia, '/images/pub/milano_ritratto.jpg', 'Ritratto in bianco e nero con tecnica realistica.');
$pub6 = new Pubblicazione('Braccio giapponese completo', new DateTime('2026-05-30'), new DateTime('13:00'), $studioMilano, $tatuaggio_giap_braccio, '/images/pub/milano_sleeve_giap.jpg', 'Sleeve giapponese con carpe koi e fiori di loto.');

// Napoli
$pub7 = new Pubblicazione('Acquerello sul polso', new DateTime('2026-01-18'), new DateTime('12:00'), $studioNapoli, $tatuaggio_water_polso, '/images/pub/napoli_water_polso.jpg', 'Colori vivaci stile acquerello, senza contorni neri.');
$pub8 = new Pubblicazione('Tribale spalla', new DateTime('2026-03-28'), new DateTime('09:30'), $studioNapoli, $tatuaggio_tribal_spalla, '/images/pub/napoli_tribal_spalla.jpg', 'Ispirato al Polinesiano tradizionale.');

// Torino
$pub9  = new Pubblicazione('Lettering corsivo collo', new DateTime('2026-02-02'), new DateTime('10:30'), $studioTorino, $tatuaggio_letter_collo, '/images/pub/torino_lettering.jpg', 'Frase in latino con font calligrafico personalizzato.');
$pub10 = new Pubblicazione('Neotrad polpaccio', new DateTime('2026-04-15'), new DateTime('15:00'), $studioTorino, $tatuaggio_neotr_polpaccio, '/images/pub/torino_neotr.jpg', 'Volpe neotradizionale con palette pastello.');

// Firenze
$pub11 = new Pubblicazione('Ritratto iperrealistico – schiena', new DateTime('2026-03-05'), new DateTime('11:00'), $studioFirenze, $tatuaggio_real_schiena, '/images/pub/firenze_real_schiena.jpg', 'Ritratto di donna rinascimentale in bianco e nero.');
$pub12 = new Pubblicazione('Dotwork petto geometrico', new DateTime('2026-05-10'), new DateTime('14:30'), $studioFirenze, $tatuaggio_dot_petto, '/images/pub/firenze_dotwork.jpg', 'Fiore della vita in dotwork puro.');

// Bologna
$pub13 = new Pubblicazione('Tribal full sleeve', new DateTime('2026-01-25'), new DateTime('16:30'), $studioBologna, $tatuaggio_tribal_spalla, '/images/pub/bologna_tribal.jpg', 'Maori ispirato con elementi moderni.');
$pub14 = new Pubblicazione('Fineline caviglia botanica', new DateTime('2026-04-08'), new DateTime('10:00'), $studioBologna, $tatuaggio_fine_caviglia, '/images/pub/bologna_fine_cav.jpg', 'Ramo di ciliegio in linea sottilissima.');

$tuttePubblicazioni = [
    $pub1, $pub2, $pub3, $pub4, $pub5, $pub6, $pub7, $pub8,
    $pub9, $pub10, $pub11, $pub12, $pub13, $pub14,
];
foreach ($tuttePubblicazioni as $p) {
    $entityManager->persist($p);
}

// ============================================================
// 8. APPUNTAMENTI (20 appuntamenti, stati variati)
//    Copertura: findAppuntamentiByStudioId(), countPrenotazioniAttive()
//    Stati usati: CONFERMATO, IN_ATTESA, IN_CORSO, COMPLETATO, ANNULLATO
// ============================================================
$app1 = new Appuntamento(new DateTime('2026-07-01'), new DateTime('10:00'), new DateTime('12:00'), 'CONFERMATO',  $clienteLuca,     $studioRoma,    $tatuatoreMarco,      'Prima sessione, rose tradizionali su avambraccio.',    150.00);
$app2 = new Appuntamento(new DateTime('2026-07-03'), new DateTime('14:00'), new DateTime('17:00'), 'CONFERMATO',  $clienteSimone,   $studioRoma,    $tatuatoreElena,      'Mandala dotwork sul petto.',                           280.00);
$app3 = new Appuntamento(new DateTime('2026-06-20'), new DateTime('09:00'), new DateTime('11:00'), 'COMPLETATO',  $clienteLuca,     $studioRoma,    $tatuatoreMarco,      'Sessione completata con successo.',                    150.00);
$app4 = new Appuntamento(new DateTime('2026-06-25'), new DateTime('15:00'), new DateTime('16:30'), 'COMPLETATO',  $clienteFederico, $studioRoma,    $tatuatoreElena,      null,                                                   120.00);
$app5 = new Appuntamento(new DateTime('2026-07-10'), new DateTime('11:00'), new DateTime('14:00'), 'IN_ATTESA',   $clienteSara,     $studioMilano,  $tatuatoreGiulia,     'Ritratto coscia, portare foto referenza.',             450.00);
$app6 = new Appuntamento(new DateTime('2026-07-15'), new DateTime('14:00'), new DateTime('19:00'), 'IN_ATTESA',   $clienteIlaria,   $studioMilano,  $tatuatoreAlessandro, 'Sleeve giapponese, prima sessione.',                   350.00);
$app7 = new Appuntamento(new DateTime('2026-06-22'), new DateTime('10:00'), new DateTime('11:30'), 'IN_CORSO',    $clienteMatteo,   $studioMilano,  $tatuatoreGiulia,     null,                                                   100.00);
$app8 = new Appuntamento(new DateTime('2026-06-18'), new DateTime('09:00'), new DateTime('12:00'), 'COMPLETATO',  $clienteSara,     $studioMilano,  $tatuatoreAlessandro, 'Completato: neotrad polpaccio.',                       220.00);
$app9 = new Appuntamento(new DateTime('2026-07-05'), new DateTime('11:00'), new DateTime('13:00'), 'CONFERMATO',  $clienteMatteo,   $studioNapoli,  $tatuatoreSofiaD,     'Acquerello polso.',                                    100.00);
$app10= new Appuntamento(new DateTime('2026-07-08'), new DateTime('09:30'), new DateTime('11:00'), 'IN_ATTESA',   $clienteAndrea,   $studioNapoli,  $tatuatoreAntonioM,   'Tribale spalla destra.',                               190.00);
$app11= new Appuntamento(new DateTime('2026-06-15'), new DateTime('14:00'), new DateTime('15:30'), 'ANNULLATO',   $clienteGinevra,  $studioNapoli,  $tatuatoreSofiaD,     'Annullato dal cliente per motivi personali.',          null);
$app12= new Appuntamento(new DateTime('2026-07-12'), new DateTime('10:00'), new DateTime('11:30'), 'CONFERMATO',  $clienteAnna,     $studioTorino,  $tatuatoreLauraN,     'Lettering corsivo sul collo.',                         80.00);
$app13= new Appuntamento(new DateTime('2026-07-20'), new DateTime('15:00'), new DateTime('17:00'), 'IN_ATTESA',   $clienteFederico, $studioTorino,  $tatuatoreRiccardo,   'Neotrad polpaccio – seconda sessione.',                220.00);
$app14= new Appuntamento(new DateTime('2026-06-10'), new DateTime('09:00'), new DateTime('11:00'), 'COMPLETATO',  $clienteAnna,     $studioTorino,  $tatuatoreLauraN,     'Fineline caviglia completata.',                        70.00);
$app15= new Appuntamento(new DateTime('2026-07-18'), new DateTime('11:00'), new DateTime('14:00'), 'CONFERMATO',  $clienteMarta,    $studioFirenze, $tatuatoreChiara,     'Schiena realistica – prima sessione.',                 300.00);
$app16= new Appuntamento(new DateTime('2026-07-25'), new DateTime('14:30'), new DateTime('16:00'), 'IN_ATTESA',   $clienteSimone,   $studioFirenze, $tatuatoreGiovanni,   'Dotwork petto geometrico.',                            280.00);
$app17= new Appuntamento(new DateTime('2026-06-12'), new DateTime('10:30'), new DateTime('12:00'), 'COMPLETATO',  $clienteMarta,    $studioFirenze, $tatuatoreChiara,     'Prima sessione fineline completata.',                  150.00);
$app18= new Appuntamento(new DateTime('2026-07-22'), new DateTime('09:00'), new DateTime('10:30'), 'CONFERMATO',  $clienteAndrea,   $studioBologna, $tatuatoreValeria,    'Tribale spalla sinistra.',                             190.00);
$app19= new Appuntamento(new DateTime('2026-07-28'), new DateTime('11:00'), new DateTime('12:30'), 'IN_ATTESA',   $clienteGinevra,  $studioBologna, $tatuatoreDavide,     'Lettering fineline sulla costola.',                    90.00);
$app20= new Appuntamento(new DateTime('2026-06-05'), new DateTime('15:00'), new DateTime('16:00'), 'COMPLETATO',  $clienteAndrea,   $studioBologna, $tatuatoreValeria,    'Tribal small finito.',                                 120.00);

$tuttiAppuntamenti = [
    $app1,  $app2,  $app3,  $app4,  $app5,
    $app6,  $app7,  $app8,  $app9,  $app10,
    $app11, $app12, $app13, $app14, $app15,
    $app16, $app17, $app18, $app19, $app20,
];
foreach ($tuttiAppuntamenti as $a) {
    $entityManager->persist($a);
}

// Flush intermedio: Pagamento richiede Appuntamento già persistito (relazione 1:1)
$entityManager->flush();
echo "  → Stili, Studi, Tatuatori, Clienti, Appuntamenti persistiti.\n";

// ============================================================
// 9. CARTE DI CREDITO (una per cliente attivo)
// ============================================================
$carta_luca     = new CartaDiCredito('Luca',     'Rossi',      '4111111111111111', new DateTime('2028-12-01'), '123');
$carta_sara     = new CartaDiCredito('Sara',     'Ferrari',    '5500000000000004', new DateTime('2027-06-01'), '456');
$carta_matteo   = new CartaDiCredito('Matteo',   'Gallo',      '4012888888881881', new DateTime('2029-03-01'), '789');
$carta_anna     = new CartaDiCredito('Anna',     'Colombo',    '4222222222222',    new DateTime('2027-09-01'), '321');
$carta_federico = new CartaDiCredito('Federico', 'Ricci',      '5105105105105100', new DateTime('2028-05-01'), '654');
$carta_marta    = new CartaDiCredito('Marta',    'Barbieri',   '4111111111111111', new DateTime('2026-11-01'), '987');
$carta_simone   = new CartaDiCredito('Simone',   'Moretti',    '4532015112830366', new DateTime('2029-08-01'), '246');
$carta_andrea   = new CartaDiCredito('Andrea',   'Vitale',     '4916338506082832', new DateTime('2027-12-01'), '135');

$tutteCarteDiCredito = [
    $carta_luca, $carta_sara, $carta_matteo, $carta_anna,
    $carta_federico, $carta_marta, $carta_simone, $carta_andrea,
];
foreach ($tutteCarteDiCredito as $cc) {
    $entityManager->persist($cc);
}

// ============================================================
// 10. PAGAMENTI (per gli appuntamenti completati/confermati)
//     Copertura: findPagamentiByStudioId()
//     Stati: PAGATO, IN_ATTESA, FALLITO
// ============================================================
$pag1 = new Pagamento(150.00, 'PAGATO',    $app1,  $carta_luca);     $app1->setPagamento($pag1);
$pag2 = new Pagamento(280.00, 'IN_ATTESA', $app2,  $carta_simone);   $app2->setPagamento($pag2);
$pag3 = new Pagamento(150.00, 'PAGATO',    $app3,  $carta_luca);     $app3->setPagamento($pag3);
$pag4 = new Pagamento(120.00, 'PAGATO',    $app4,  $carta_federico); $app4->setPagamento($pag4);
$pag5 = new Pagamento(450.00, 'IN_ATTESA', $app5,  $carta_sara);     $app5->setPagamento($pag5);
$pag6 = new Pagamento(350.00, 'IN_ATTESA', $app6,  $carta_sara);     $app6->setPagamento($pag6);
$pag7 = new Pagamento(100.00, 'IN_ATTESA', $app7,  $carta_matteo);   $app7->setPagamento($pag7);
$pag8 = new Pagamento(220.00, 'PAGATO',    $app8,  $carta_sara);     $app8->setPagamento($pag8);
$pag9 = new Pagamento(100.00, 'IN_ATTESA', $app9,  $carta_matteo);   $app9->setPagamento($pag9);
$pag10= new Pagamento(190.00, 'IN_ATTESA', $app10, $carta_andrea);   $app10->setPagamento($pag10);
$pag12= new Pagamento(80.00,  'IN_ATTESA', $app12, $carta_anna);     $app12->setPagamento($pag12);
$pag13= new Pagamento(220.00, 'IN_ATTESA', $app13, $carta_federico); $app13->setPagamento($pag13);
$pag14= new Pagamento(70.00,  'PAGATO',    $app14, $carta_anna);     $app14->setPagamento($pag14);
$pag15= new Pagamento(300.00, 'IN_ATTESA', $app15, $carta_marta);    $app15->setPagamento($pag15);
$pag16= new Pagamento(280.00, 'IN_ATTESA', $app16, $carta_simone);   $app16->setPagamento($pag16);
$pag17= new Pagamento(150.00, 'PAGATO',    $app17, $carta_marta);    $app17->setPagamento($pag17);
$pag18= new Pagamento(190.00, 'IN_ATTESA', $app18, $carta_andrea);   $app18->setPagamento($pag18);
$pag19= new Pagamento(90.00,  'IN_ATTESA', $app19, $carta_andrea);   $app19->setPagamento($pag19);
$pag20= new Pagamento(120.00, 'PAGATO',    $app20, $carta_andrea);   $app20->setPagamento($pag20);

$tuttiPagamenti = [
    $pag1, $pag2, $pag3, $pag4, $pag5, $pag6, $pag7, $pag8, $pag9, $pag10,
    $pag12, $pag13, $pag14, $pag15, $pag16, $pag17, $pag18, $pag19, $pag20,
];
foreach ($tuttiPagamenti as $pag) {
    $entityManager->persist($pag);
}

// ============================================================
// 11. MESSAGGI (conversazioni su appuntamenti attivi)
//     Copertura: relazione Appuntamento → messaggi
// ============================================================
$msg1 = new Messaggio(
    mittenteId: 0,      // verrà risolto dall'ID reale dopo flush
    mittenteTipo: 'CLIENTE',
    destinatarioId: 0,
    destinatarioTipo: 'STUDIO',
    appuntamento: $app1,
    testo: 'Buongiorno, confermo la presenza per il 1 luglio alle 10:00.'
);
$msg2 = new Messaggio(
    mittenteId: 0,
    mittenteTipo: 'STUDIO',
    destinatarioId: 0,
    destinatarioTipo: 'CLIENTE',
    appuntamento: $app1,
    testo: 'Perfetto! Ti aspettiamo. Ricorda di non esporre la zona al sole nelle 24h precedenti.'
);
$msg3 = new Messaggio(
    mittenteId: 0,
    mittenteTipo: 'CLIENTE',
    destinatarioId: 0,
    destinatarioTipo: 'STUDIO',
    appuntamento: $app5,
    testo: 'Ho allegato le foto di riferimento per il ritratto. Potete confermare se sono adatte?'
);
$msg4 = new Messaggio(
    mittenteId: 0,
    mittenteTipo: 'STUDIO',
    destinatarioId: 0,
    destinatarioTipo: 'CLIENTE',
    appuntamento: $app5,
    testo: 'Le foto sono ottime, qualità perfetta per il realismo. Ci vediamo il 10 luglio!'
);
$msg5 = new Messaggio(
    mittenteId: 0,
    mittenteTipo: 'CLIENTE',
    destinatarioId: 0,
    destinatarioTipo: 'STUDIO',
    appuntamento: $app9,
    testo: 'Posso anticipare l\'appuntamento alle 10:30 invece delle 11:00?'
);
$msg6 = new Messaggio(
    mittenteId: 0,
    mittenteTipo: 'CLIENTE',
    destinatarioId: 0,
    destinatarioTipo: 'STUDIO',
    appuntamento: $app15,
    testo: 'Volevo sapere quanto tempo durerà la prima sessione per la schiena.'
);
$msg7 = new Messaggio(
    mittenteId: 0,
    mittenteTipo: 'STUDIO',
    destinatarioId: 0,
    destinatarioTipo: 'CLIENTE',
    appuntamento: $app15,
    testo: 'La prima sessione durerà circa 3 ore. Prevediamo 4-5 sessioni in totale.'
);

$tuttiMessaggi = [$msg1, $msg2, $msg3, $msg4, $msg5, $msg6, $msg7];
foreach ($tuttiMessaggi as $m) {
    $entityManager->persist($m);
}

// ============================================================
// 12. RECENSIONI (14 recensioni, voti da 1 a 5)
//     Copertura: findByStudioId(), findRecensioniPositiveRandom(),
//                salvaRecensione(), deleteRecensione()
// ============================================================

// Roma (voti misti per testare filtro positivo)
$rec1 = new Recensione(5, new DateTime('2026-06-21'), $clienteLuca,     $studioRoma,    'Capolavoro tradizionale',     'Tradizionale',    $tatuatoreMarco,      'Marco è un artista eccezionale. Ogni dettaglio è curato.');
$rec2 = new Recensione(4, new DateTime('2026-06-22'), $clienteSimone,   $studioRoma,    'Ottimo dotwork',              'Dotwork',         $tatuatoreElena,      'Elena è precisa e professionale, ottimo risultato.');
$rec3 = new Recensione(3, new DateTime('2026-06-10'), $clienteFederico, $studioRoma,    'Buono ma attesa lunga',       'Realistico',      $tatuatoreElena,      'Risultato finale buono ma i tempi di attesa sono lunghi.');
$rec4 = new Recensione(2, new DateTime('2026-05-30'), $clienteMarta,    $studioRoma,    'Delusione sui colori',        'Tradizionale',    $tatuatoreMarco,      'I colori si sono sbiaditi in poche settimane.');

// Milano (voti alti)
$rec5 = new Recensione(5, new DateTime('2026-06-20'), $clienteSara,     $studioMilano,  'Realismo pazzesco',           'Realistico',      $tatuatoreGiulia,     'Il ritratto è talmente realistico che sembra una foto stampata sulla pelle.');
$rec6 = new Recensione(5, new DateTime('2026-06-18'), $clienteIlaria,   $studioMilano,  'Sleeve mozzafiato',           'Giapponese',      $tatuatoreAlessandro, 'Alessandro è il migliore per lo stile giapponese in Italia.');
$rec7 = new Recensione(4, new DateTime('2026-06-15'), $clienteMatteo,   $studioMilano,  'Grande professionalità',      'Neotradizionale', $tatuatoreAlessandro, 'Studio pulito, artista puntuale, prezzo giusto.');

// Napoli
$rec8 = new Recensione(5, new DateTime('2026-06-12'), $clienteMatteo,   $studioNapoli,  'Watercolor spettacolare',     'Watercolor',      $tatuatoreSofiaD,     'Sofia ha una mano leggerissima, il tatuaggio sembra dipinto.');
$rec9 = new Recensione(3, new DateTime('2026-05-25'), $clienteAndrea,   $studioNapoli,  'Tribale nella media',         'Tribale',         $tatuatoreAntonioM,   'Lavoro nella media, nulla di speciale ma pulito.');

// Torino
$rec10= new Recensione(5, new DateTime('2026-06-14'), $clienteAnna,     $studioTorino,  'Fineline meraviglioso',       'Fineline',        $tatuatoreLauraN,     'Laura ha una precisione incredibile. Il lettering è perfetto.');
$rec11= new Recensione(4, new DateTime('2026-06-08'), $clienteFederico, $studioTorino,  'Neotrad riuscitissimo',       'Neotradizionale', $tatuatoreRiccardo,   'Riccardo è molto creativo, contento del risultato finale.');

// Firenze
$rec12= new Recensione(5, new DateTime('2026-06-13'), $clienteMarta,    $studioFirenze, 'Schiena da sogno',            'Realistico',      $tatuatoreChiara,     'Chiara ha trasformato la mia schiena in un\'opera d\'arte.');
$rec13= new Recensione(4, new DateTime('2026-06-07'), $clienteSimone,   $studioFirenze, 'Dotwork geometrico perfetto', 'Dotwork',         $tatuatoreGiovanni,   'Giovanni è pazientissimo e il risultato è eccellente.');

// Bologna
$rec14= new Recensione(1, new DateTime('2026-05-20'), $clienteAndrea,   $studioBologna, 'Esperienza negativa',         'Tribale',         $tatuatoreValeria,    'L\'appuntamento è stato spostato tre volte senza preavviso.');

$tutteRecensioni = [
    $rec1, $rec2, $rec3, $rec4, $rec5, $rec6, $rec7,
    $rec8, $rec9, $rec10, $rec11, $rec12, $rec13, $rec14,
];
foreach ($tutteRecensioni as $r) {
    $entityManager->persist($r);
}

// ============================================================
// 13. SEGNALAZIONI (10: stati APERTA e CHIUSA, con/senza admin)
//     Copertura: findAllSegnalazioni(), saveSegnalazione(),
//                countSegnalazioniAperte()
// ============================================================
$seg1 = new Segnalazione('Ritardo appuntamento',         'Lo studio ha posticipato di 2 ore senza preavviso.',               new DateTime('2026-06-05'));
$seg1->setCliente($clienteSara);
$seg1->setStudio($studioMilano);

$seg2 = new Segnalazione('Qualità lavoro scadente',      'Il tatuaggio si è sbiadito dopo 2 settimane.',                     new DateTime('2026-05-28'));
$seg2->setCliente($clienteMarta);
$seg2->setStudio($studioRoma);
$seg2->setStato('CHIUSA');
$seg2->setAmministratore($adminPrincipale);

$seg3 = new Segnalazione('Comportamento scorretto',      'Il tatuatore ha assunto un atteggiamento irrispettoso.',           new DateTime('2026-06-10'));
$seg3->setCliente($clienteAndrea);
$seg3->setStudio($studioNapoli);

$seg4 = new Segnalazione('Appuntamento annullato',       'Studio ha annullato senza rimborso della caparra.',               new DateTime('2026-06-15'));
$seg4->setCliente($clienteGinevra);
$seg4->setStudio($studioNapoli);
$seg4->setStato('CHIUSA');
$seg4->setAmministratore($adminSupport);

$seg5 = new Segnalazione('Igiene insufficiente',         'Gli strumenti non sembravano adeguatamente sterilizzati.',         new DateTime('2026-06-18'));
$seg5->setCliente($clienteMatteo);
$seg5->setStudio($studioRoma);

$seg6 = new Segnalazione('Discrepanza prezzi',           'Il prezzo finale era diverso da quello preventivato.',             new DateTime('2026-06-01'));
$seg6->setCliente($clienteFederico);
$seg6->setStudio($studioTorino);
$seg6->setStato('CHIUSA');
$seg6->setAmministratore($adminPrincipale);

$seg7 = new Segnalazione('Stile non rispettato',         'Il tatuaggio realizzato era diverso dal progetto concordato.',     new DateTime('2026-06-20'));
$seg7->setCliente($clienteLuca);
$seg7->setStudio($studioFirenze);

$seg8 = new Segnalazione('Tempi di cura errati',         'Le indicazioni post-tatuaggio erano incomplete e imprecise.',      new DateTime('2026-05-15'));
$seg8->setCliente($clienteAnna);
$seg8->setStudio($studioBologna);
$seg8->setStato('CHIUSA');
$seg8->setAmministratore($adminSupport);

$seg9 = new Segnalazione('Mancato rispetto orari',       'Lo studio era chiuso all\'orario dell\'appuntamento.',            new DateTime('2026-06-22'));
$seg9->setCliente($clienteSimone);
$seg9->setStudio($studioMilano);

$seg10= new Segnalazione('Profilo studio non aggiornato','Le foto del portfolio non corrispondono ai lavori reali.',         new DateTime('2026-06-21'));
$seg10->setCliente($clienteIlaria);
$seg10->setStudio($studioMilano);

$tutteSegnalazioni = [
    $seg1, $seg2, $seg3, $seg4, $seg5,
    $seg6, $seg7, $seg8, $seg9, $seg10,
];
foreach ($tutteSegnalazioni as $s) {
    $entityManager->persist($s);
}

// ============================================================
// FLUSH FINALE
// ============================================================
$entityManager->flush();

// ============================================================
// RIEPILOGO
// ============================================================
$nAperte  = count(array_filter($tutteSegnalazioni, fn($s) => $s->getStato() === 'APERTA'));
$nChiuse  = count($tutteSegnalazioni) - $nAperte;
$nAttive  = count(array_filter($tuttiAppuntamenti, fn($a) => in_array($a->getStato(), ['CONFERMATO', 'IN_ATTESA', 'IN_CORSO'])));
$nPosRec  = count(array_filter($tutteRecensioni, fn($r) => $r->getVoto() >= 4));

echo "\nSeed completato con successo!\n";
echo str_repeat('-', 45) . "\n";
echo sprintf("  %-28s %d\n", 'Stili:', count($tuttiStili));
echo sprintf("  %-28s %d\n", 'Studi:', count($tuttiStudi));
echo sprintf("  %-28s %d\n", 'Tatuatori:', count($tuttiTatuatori));
echo sprintf("  %-28s %d\n", 'Clienti:', count($tuttiClienti));
echo sprintf("  %-28s 2\n", 'Amministratori:');
echo sprintf("  %-28s %d\n", 'Tatuaggi:', count($tuttiTatuaggi));
echo sprintf("  %-28s %d\n", 'Pubblicazioni:', count($tuttePubblicazioni));
echo sprintf("  %-28s %d\n", 'Appuntamenti:', count($tuttiAppuntamenti));
echo sprintf("  %-28s %s\n", '  → attivi (CONF/ATT/CORS):', $nAttive);
echo sprintf("  %-28s %d\n", 'Carte di credito:', count($tutteCarteDiCredito));
echo sprintf("  %-28s %d\n", 'Pagamenti:', count($tuttiPagamenti));
echo sprintf("  %-28s %d\n", 'Messaggi:', count($tuttiMessaggi));
echo sprintf("  %-28s %d\n", 'Recensioni:', count($tutteRecensioni));
echo sprintf("  %-28s %s\n", '  → positive (voto >= 4):', $nPosRec);
echo sprintf("  %-28s %d\n", 'Segnalazioni:', count($tutteSegnalazioni));
echo sprintf("  %-28s %s APERTE / %s CHIUSE\n", '  → stato:', $nAperte, $nChiuse);
echo str_repeat('-', 45) . "\n";