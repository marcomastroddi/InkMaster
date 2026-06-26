<?php
/**
 * InkMaster — Seeder dati realistici
 * Esegui: php seed.php
 */

require_once __DIR__ . '/../vendor/autoload.php';
$em = require_once __DIR__ . '/../config/bootstrap-doctrine.php';

use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Stile;
use InkMaster\Entity\Recensione;
use InkMaster\Entity\Appuntamento;
use InkMaster\Entity\PubblicazioneTatuaggio;
use InkMaster\Enum\Citta;

// ── Protezione doppia esecuzione ──────────────────────────────────────────────
$countStudi = $em->createQuery('SELECT COUNT(s.id) FROM ' . Studio::class . ' s')->getSingleScalarResult();
if ($countStudi > 5) {
    echo "Il DB sembra già popolato ($countStudi studi). Interrotto.\n";
    exit;
}

echo "Inizio seeding...\n";

// ── Config per città ──────────────────────────────────────────────────────────
$cittaConfig = [
    'Roma'      => ['studi' => 7, 'tatuatori' => 4, 'recensioni' => 10, 'pubblicazioni' => 10],
    'Milano'    => ['studi' => 7, 'tatuatori' => 4, 'recensioni' => 10, 'pubblicazioni' => 10],
    'Napoli'    => ['studi' => 6, 'tatuatori' => 3, 'recensioni' => 9,  'pubblicazioni' => 9],
    'Torino'    => ['studi' => 6, 'tatuatori' => 3, 'recensioni' => 9,  'pubblicazioni' => 9],
    'Firenze'   => ['studi' => 5, 'tatuatori' => 3, 'recensioni' => 8,  'pubblicazioni' => 8],
    'Bologna'   => ['studi' => 5, 'tatuatori' => 3, 'recensioni' => 8,  'pubblicazioni' => 8],
    'Palermo'   => ['studi' => 5, 'tatuatori' => 3, 'recensioni' => 8,  'pubblicazioni' => 8],
    'Genova'    => ['studi' => 5, 'tatuatori' => 3, 'recensioni' => 8,  'pubblicazioni' => 8],
    'Venezia'   => ['studi' => 4, 'tatuatori' => 2, 'recensioni' => 6,  'pubblicazioni' => 6],
    'Bari'      => ['studi' => 4, 'tatuatori' => 2, 'recensioni' => 6,  'pubblicazioni' => 6],
    'Catania'   => ['studi' => 4, 'tatuatori' => 2, 'recensioni' => 6,  'pubblicazioni' => 6],
    'Pescara'   => ['studi' => 4, 'tatuatori' => 2, 'recensioni' => 6,  'pubblicazioni' => 6],
    'Catanzaro' => ['studi' => 4, 'tatuatori' => 2, 'recensioni' => 6,  'pubblicazioni' => 6],
    'Avezzano'  => ['studi' => 4, 'tatuatori' => 2, 'recensioni' => 6,  'pubblicazioni' => 6],
    'Popoli'    => ['studi' => 4, 'tatuatori' => 2, 'recensioni' => 6,  'pubblicazioni' => 6],
];

// ── Pool di dati realistici ───────────────────────────────────────────────────
$prefissiStudio  = ['Ink','Dark','Black','Shadow','Royal','Tribal','Art','Sacred','Neo','Urban','Deep','Soul','Wild','Electric','Iron'];
$suffissiStudio  = ['Studio','Lab','Tattoo','Ink Works','Arts','Gallery','House','Cave','Temple','Collective'];
$descrizioniPool = [
    'Studio specializzato in tatuaggi realistici e blackwork con oltre 10 anni di esperienza.',
    'Ambiente accogliente e professionale nel cuore della città. Specialisti in stili orientali.',
    'Ogni tatuaggio è un\'opera d\'arte unica. Utilizziamo solo inchiostri premium e attrezzatura sterile.',
    'Studio boutique con tatuatori certificati. Specializzati in cover-up e restauri.',
    'Pionieri del tatuaggio artistico in città. Portfolio vasto, consulenza gratuita.',
    'Atelier del tatuaggio contemporaneo. Fusion tra tradizione e innovazione.',
    'Studio di ricerca artistica sul corpo. Solo appuntamenti, lista d\'attesa selettiva.',
    'Tatuaggi su misura per ogni cliente. Dal piccolo dettaglio alla manica completa.',
    'Specialisti in geometrico, mandala e dotwork. Ambiente tranquillo e creativo.',
    'Studio indipendente fondato da artisti. Ogni sessione è un\'esperienza unica.',
];
$nomiMaschili  = ['Marco','Luca','Andrea','Giovanni','Francesco','Alessandro','Davide','Lorenzo','Matteo','Simone','Roberto','Antonio','Fabio','Riccardo','Stefano','Nicola','Pietro','Massimo','Diego','Giulio','Cristian','Daniele','Federico','Edoardo','Gianluca','Salvatore','Angelo','Vincenzo','Emanuele','Giorgio'];
$nomiFemminili = ['Sofia','Giulia','Sara','Valentina','Chiara','Alice','Elena','Martina','Elisa','Laura','Federica','Alessia','Giorgia','Claudia','Roberta','Serena','Monica','Veronica','Ilaria','Michela'];
$cognomi       = ['Russo','Ferrari','Esposito','Bianchi','Romano','Colombo','Bruno','Ricci','Greco','Marino','Gallo','Conti','De Luca','Costa','Mancini','Fontana','Rizzo','Lombardi','Moretti','Barbieri','Marini','Villa','Conte','Ferretti','Caruso','Fabbri','Palumbo','De Santis','Leone','Pellegrini'];
$titoliPub     = ['Dark Rose Sleeve','Japanese Dragon','Geometric Mandala','Realistic Portrait','Watercolor Butterfly','Nordic Runes','Blackwork Compass','Old School Anchor','Minimalist Linework','Tribal Shoulder','Dotwork Sacred Heart','Neo Traditional Eagle','Full Sleeve Dark','Chest Panel','Koi Fish','Skull & Flowers','Biomechanical Arm','Cosmic Sleeve','Forest Sleeve','Tiger Realism','Wolf Pack','Samurai Scene','Celtic Knot','Art Nouveau Floral','Medusa Portrait','Phoenix Rising','Geometric Lion','Maori Sleeve','Trash Polka Abstract','Angel Wings','Snake & Dagger','Moon Phase Sleeve','Peony Japanese','Lighthouse Storm','Electric Tiger','Black Sun','Sacred Geometry','Whip Shading Rose','Biomech Spider','Sumi-e Crane'];
$posizioniCorpo = ['Avambraccio sinistro','Avambraccio destro','Bicipite','Polpaccio','Coscia','Petto','Schiena intera','Spalla','Costato','Nuca','Collo','Mano','Caviglia','Sterno'];
$grandezze     = ['5×5 cm','10×10 cm','15×15 cm','20×20 cm','Mezza manica','Manica intera','Schiena intera','Piccolo','Medio','Grande'];
$costiPub      = [80, 120, 150, 200, 250, 300, 400, 500, 600, 800, 1000, 1200];
$titoliRec     = ['Lavoro impeccabile!','Artista eccezionale','Preciso e delicato','Colori vivaci perfetti','Consigliatissimo!','Professionalità al top','Tatuaggio perfetto','Superato ogni aspettativa','Dettagli magnifici','Arte vera','Esperienza fantastica','Lo rifarei subito','Maestro della tecnica','Risultato straordinario','Il migliore in città'];
$testiRec      = [
    'Sono rimasto senza parole davanti al risultato finale. Tecnica impeccabile e attenzione ai dettagli fuori dal comune.',
    'Studio pulitissimo, staff professionale e accogliente. Il tatuaggio è venuto esattamente come lo avevo immaginato.',
    'Ho aspettato sei mesi per avere un appuntamento e ne è valsa assolutamente la pena. Consiglio vivamente.',
    'Avevo molta paura del dolore ma l\'ambiente rilassante ha reso tutto più semplice. Risultato magnifico.',
    'Il mio terzo tatuaggio in questo studio e ogni volta supera il precedente. Artisti di talento assoluto.',
    'Copertura di un vecchio tatuaggio eseguita in modo magistrale. Sembrava impossibile, loro l\'hanno resa perfetta.',
    'Prezzi giusti per una qualità altissima. Ho fatto girare il bigliettino da visita a tutti i miei amici.',
    'Consulenza dettagliata prima della sessione, spiegazioni chiare durante, risultato spettacolare.',
    'Da non credere la precisione nelle linee. Dopo sei mesi i colori sono ancora vividi come il primo giorno.',
    'Staff gentilissimo che mette a proprio agio anche i più ansiosi. Tornerò sicuramente per il prossimo tatuaggio.',
    'Ambiente sterile e professionale. Si vede che la qualità e l\'igiene sono al primo posto.',
    'Il tatuatore ha capito subito cosa volevo e ha proposto miglioramenti che hanno reso il disegno ancora più bello.',
    'Ho girato mezzo paese prima di trovare qualcuno capace di fare ciò che volevo. Qui l\'hanno realizzato alla perfezione.',
    'Sessione lunga ma l\'artista si è fermato quando necessario. Cura del cliente totale.',
    'Ho regalato un voucher a mia sorella e anche lei è rimasta entusiasta. Studio top!',
];
$orariApertura = ['lun' => '10:00', 'mar' => '10:00', 'mer' => '10:00', 'gio' => '10:00', 'ven' => '10:00', 'sab' => '11:00'];
$orariChiusura = ['lun' => '19:00', 'mar' => '19:00', 'mer' => '19:00', 'gio' => '19:00', 'ven' => '19:00', 'sab' => '18:00'];

// ── 1. STILI ──────────────────────────────────────────────────────────────────
echo "Creo stili...\n";
$stiliNomi = ['Tradizionale','Realistico','Geometrico','Blackwork','Watercolor','Japanese','Neo Traditional','Minimal','Tribal','Old School','Dotwork','Trash Polka'];
$stiliEntita = [];

foreach ($stiliNomi as $nomeStile) {
    $esistente = $em->getRepository(Stile::class)->findOneBy(['nome' => $nomeStile]);
    if ($esistente) {
        $stiliEntita[] = $esistente;
    } else {
        $s = new Stile($nomeStile);
        $em->persist($s);
        $stiliEntita[] = $s;
    }
}
$em->flush();
echo "  → " . count($stiliEntita) . " stili pronti.\n";

// ── 2. CLIENTI BETA TESTER ────────────────────────────────────────────────────
echo "Creo clienti beta tester...\n";
$betaClienti = [
    ['nome' => 'Mario',   'cognome' => 'Rossi',  'username' => 'mario_rossi',  'email' => 'mario.rossi@beta.it'],
    ['nome' => 'Laura',   'cognome' => 'Verdi',  'username' => 'laura_verdi',  'email' => 'laura.verdi@beta.it'],
    ['nome' => 'Tommaso', 'cognome' => 'Neri',   'username' => 'tomma_neri',   'email' => 'tommaso.neri@beta.it'],
    ['nome' => 'Chiara',  'cognome' => 'Blu',    'username' => 'chiara_blu',   'email' => 'chiara.blu@beta.it'],
    ['nome' => 'Giulia',  'cognome' => 'Ferri',  'username' => 'giulia_ferri', 'email' => 'giulia.ferri@beta.it'],
];
$clientiEntita = [];
$passHash = password_hash('Beta@1234', PASSWORD_BCRYPT);

foreach ($betaClienti as $b) {
    $esiste = $em->getRepository(Cliente::class)->findOneBy(['username' => $b['username']]);
    if (!$esiste) {
        $c = new Cliente($b['nome'], $b['cognome'], $passHash, $b['username'], new DateTime('1990-01-01'), $b['email']);
        $em->persist($c);
        $clientiEntita[] = $c;
    } else {
        $clientiEntita[] = $esiste;
    }
}
$em->flush();
echo "  → " . count($clientiEntita) . " clienti beta pronti.\n";

// ── 3. STUDI, TATUATORI, RECENSIONI, PUBBLICAZIONI ───────────────────────────
$tuttiStudi    = [];
$tuttiTatuatori = [];
$studioIdx     = 0; // indice globale per username/email/piva univoci

foreach ($cittaConfig as $cittaNome => $cfg) {
    $cittaEnum = Citta::from($cittaNome);
    echo "Città: $cittaNome ({$cfg['studi']} studi)...\n";

    for ($si = 0; $si < $cfg['studi']; $si++) {
        $studioIdx++;
        $nomeStudio = $prefissiStudio[array_rand($prefissiStudio)] . ' ' . $suffissiStudio[array_rand($suffissiStudio)];
        $nomeStudio .= ' ' . $cittaNome; // rende il nome unico per città

        $piva     = str_pad((string)($studioIdx * 7 + 1000000000), 11, '0', STR_PAD_LEFT);
        $username = 'studio_' . strtolower(str_replace(' ', '_', $cittaNome)) . '_' . $si;
        $email    = 'studio' . $studioIdx . '@inkmaster-seed.it';
        $passS    = password_hash('Studio@1234', PASSWORD_BCRYPT);
        $desc     = $descrizioniPool[$studioIdx % count($descrizioniPool)];

        $studio = new Studio(
            $nomeStudio, $piva, $cittaEnum, $email,
            $username, $passS, $desc, null,
            $orariApertura, $orariChiusura
        );
        $em->persist($studio);
        $em->flush(); // serve l'ID subito per le relazioni

        $tuttiStudi[] = $studio;

        // ── Tatuatori per questo studio ────────────────────────────────────────
        $tatStudio = [];
        $nomiUsati = [];
        for ($ti = 0; $ti < $cfg['tatuatori']; $ti++) {
            do {
                $usaMaschile = (rand(0, 1) === 0);
                $nome = $usaMaschile
                    ? $nomiMaschili[array_rand($nomiMaschili)]
                    : $nomiFemminili[array_rand($nomiFemminili)];
                $cognome = $cognomi[array_rand($cognomi)];
                $chiave  = $nome . $cognome;
            } while (in_array($chiave, $nomiUsati));
            $nomiUsati[] = $chiave;

            $dn = new DateTime('19' . rand(65, 99) . '-' . sprintf('%02d', rand(1,12)) . '-' . sprintf('%02d', rand(1,28)));
            $tat = new Tatuatore($nome, $cognome, $dn, $studio);

            // Assegna 2-3 stili casuali
            $stiliMescolati = $stiliEntita;
            shuffle($stiliMescolati);
            $quanti = rand(2, 3);
            for ($k = 0; $k < $quanti; $k++) {
                $tat->addStile($stiliMescolati[$k]);
            }

            $em->persist($tat);
            $tatStudio[] = $tat;
        }
        $em->flush();
        $tuttiTatuatori = array_merge($tuttiTatuatori, $tatStudio);

        // ── Pubblicazioni ──────────────────────────────────────────────────────
        $titoliPubUsati = [];
        for ($pi = 0; $pi < $cfg['pubblicazioni']; $pi++) {
            do {
                $titoloPub = $titoliPub[array_rand($titoliPub)];
            } while (in_array($titoloPub, $titoliPubUsati) && count($titoliPubUsati) < count($titoliPub));
            $titoliPubUsati[] = $titoloPub;

            $dataP = new DateTime('-' . rand(10, 730) . ' days');
            $oraP  = new DateTime(sprintf('%02d:%02d', rand(9,18), rand(0,59)));
            $pub   = new PubblicazioneTatuaggio(
                $titoloPub,
                $dataP,
                $oraP,
                $studio,
                '/img/tatuaggi/placeholder.jpg',
                'Opera realizzata con tecnica ' . $stiliNomi[array_rand($stiliNomi)] . '. Sessione di ' . rand(2, 8) . ' ore.',
                $posizioniCorpo[array_rand($posizioniCorpo)],
                $grandezze[array_rand($grandezze)],
                (float)$costiPub[array_rand($costiPub)]
            );
            // Collega 1-2 stili
            $stiliPub = $stiliEntita;
            shuffle($stiliPub);
            $pub->addStile($stiliPub[0]);
            if (rand(0,1)) $pub->addStile($stiliPub[1]);

            $em->persist($pub);
        }
        $em->flush();

        // ── Recensioni ─────────────────────────────────────────────────────────
        for ($ri = 0; $ri < $cfg['recensioni']; $ri++) {
            $cliente = $clientiEntita[array_rand($clientiEntita)];
            $tat     = $tatStudio[array_rand($tatStudio)];
            $voto    = rand(3, 5); // media tendenzialmente alta, più realistico
            if (rand(0, 9) === 0) $voto = rand(1, 2); // ~10% recensioni negative
            $dataR   = new DateTime('-' . rand(5, 500) . ' days');
            $stileR  = $stiliNomi[array_rand($stiliNomi)];

            $rec = new Recensione(
                $voto,
                $dataR,
                $cliente,
                $studio,
                $titoliRec[array_rand($titoliRec)],
                $stileR,
                $tat,
                $testiRec[array_rand($testiRec)]
            );
            $em->persist($rec);
        }
        $em->flush();

        echo "    Studio '$nomeStudio' ok ({$cfg['tatuatori']} tat · {$cfg['pubblicazioni']} pub · {$cfg['recensioni']} rec)\n";
    }
}

// ── 4. APPUNTAMENTI BETA ─────────────────────────────────────────────────────
echo "Creo appuntamenti beta...\n";
$stati   = ['confermato', 'completato', 'in attesa'];
$noteApp = [
    'Vuole una manica giapponese, stilizzata.',
    'Cover-up di un vecchio tatuaggio sul braccio destro.',
    'Prima sessione, cliente nuovo. Ha già il disegno approvato.',
    'Ritocco sessione precedente.',
    'Consulenza + prima sessione manica.',
];

for ($i = 0; $i < 12; $i++) {
    $cliente = $clientiEntita[$i % count($clientiEntita)];
    $studio  = $tuttiStudi[array_rand($tuttiStudi)];
    $tats    = array_filter($tuttiTatuatori, fn($t) => $t->getStudio()->getId() === $studio->getId());
    if (empty($tats)) continue;
    $tat     = array_values($tats)[array_rand($tats)];

    $giorni  = rand(-30, 60); // alcuni nel passato, alcuni futuri
    $dataApp = new DateTime(($giorni >= 0 ? '+' : '') . $giorni . ' days');
    $ora     = rand(9, 17);
    $oraIni  = new DateTime(sprintf('%02d:00', $ora));
    $oraFine = new DateTime(sprintf('%02d:00', $ora + rand(1, 3)));
    $stato   = $giorni < 0 ? 'completato' : $stati[array_rand($stati)];

    $app = new Appuntamento(
        $dataApp, $oraIni, $oraFine, $stato,
        $cliente, $studio, $tat,
        $noteApp[array_rand($noteApp)],
        $stato === 'completato' ? (float)$costiPub[array_rand($costiPub)] : null
    );
    $em->persist($app);
}
$em->flush();

echo "\n✓ Seeding completato!\n";
echo "  Studi creati:        " . count($tuttiStudi)     . "\n";
echo "  Tatuatori creati:    " . count($tuttiTatuatori)  . "\n";
echo "  Clienti beta:        " . count($clientiEntita)   . "\n";
echo "  Appuntamenti:        12\n";
echo "\nCredenziali beta tester:\n";
echo "  username: mario_rossi / laura_verdi / tomma_neri / chiara_blu / fcrudeli\n";
echo "  password: Beta@1234\n";
echo "\nCredenziali studio (ogni studio):\n";
echo "  username: studio_{città}_{0..N}\n";
echo "  password: Studio@1234\n";
