<?php
require 'vendor/autoload.php';

use InkMaster\Foundation\PersistentManager;

$pm = PersistentManager::getInstance();

echo "\n=== SEGNALAZIONI DAL DATABASE ===\n";
foreach ($pm->findAllSegnalazioni() as $segnalazione) {
    echo $segnalazione->getId() . ' - ' . $segnalazione->getDescrizione() . "\n";
}

// Test metodi in ControllerCliente

//prenotazione e pagamento

//scegli_tatuatore
//prova valida
echo "\n=== TATUATORI NELLO STUDIO DURANTE LA PRENOTAZIONE ===\n";
$tatuatore = $pm->read(\InkMaster\Entity\Tatuatore::class, 12);
if ($tatuatore) {
    echo $tatuatore->getId() . ' - ' . $tatuatore->getNome() . ' ' . $tatuatore->getCognome() . "\n";
} else {
    echo "Tatuatore non trovato\n";
}
//prova se ID inesistente
$tatuatore = $pm->read(\InkMaster\Entity\Tatuatore::class, 999);
if ($tatuatore) {
    echo $tatuatore->getId() . ' - ' . $tatuatore->getNome() . ' ' . $tatuatore->getCognome() . "\n";
} else {
    echo "Tatuatore non trovato\n";
}

//Scegli Stile
//Prova valida percè il controllo dello stile non spetta a questo test, ma al metodo precendente, prendendo il tatuatore
//corretto popola la scleta per l'utente con gli stili giò filtrati
echo "\n=== STILI DEL TATUATORE DURANTE LA PRENOTAZIONE ===\n";
$stile = $pm->read(\InkMaster\Entity\Stile::class, 5);
if ($stile) {
    echo $stile->getId() . ' - ' . $stile->getNome() . "\n";
} else {
    echo "Stile non trovato\n";
}

//scegli_data non chiama il db 

//richiedi appuntamento
echo "\n=== RICHIESTA APPUNTAMENTO DURANTE LA PRENOTAZIONE ===\n";
$studio = $pm->read(\InkMaster\Entity\Studio::class, 1);
$tatuatore = $pm->read(\InkMaster\Entity\Tatuatore::class, 12);
$stile = $pm->read(\InkMaster\Entity\Stile::class, 5);
$cliente = $pm->read(\InkMaster\Entity\Cliente::class, 1);

echo "Studio: "    . ($studio    ? $studio->getNome()             : 'non trovato') . "\n";
echo "Tatuatore: " . ($tatuatore ? $tatuatore->getNome()          : 'non trovato') . "\n";
echo "Stile: "     . ($stile     ? $stile->getNome()              : 'non trovato') . "\n";
echo "Cliente: "   . ($cliente   ? $cliente->getNome()            : 'non trovato') . "\n";

// Conferma Prenotazione
echo "\n=== TEST read() APPUNTAMENTO ===\n";
$appuntamento = $pm->read(\InkMaster\Entity\Appuntamento::class, 5);
if ($appuntamento) {
    echo $appuntamento->getId() . ' - ' . $appuntamento->getStato() . "\n";
} else {
    echo "Appuntamento non trovato\n";
}

// Accetta Richiesta
echo "\n=== TEST read() APPUNTAMENTO PER ACCETTAZIONE RICHIESTA ===\n";
$appuntamento = $pm->read(\InkMaster\Entity\Appuntamento::class, 9);
if ($appuntamento) {
    echo $appuntamento->getId() . ' - ' . $appuntamento->getStato() . "\n";
} else {
    echo "Appuntamento non trovato\n";
}

// Rifiuta Richiesta
echo "\n=== TEST read() APPUNTAMENTO PER RIFIUTO RICHIESTA ===\n";
$appuntamento = $pm->read(\InkMaster\Entity\Appuntamento::class, 10);
if ($appuntamento) {
    echo $appuntamento->getId() . ' - ' . $appuntamento->getStato() . "\n";
} else {
    echo "Appuntamento non trovato\n";
}

// Completa Prenotazione
echo "\n=== TEST read() APPUNTAMENTO PER COMPLETA PRENOTAZIONE ===\n";
$appuntamento = $pm->read(\InkMaster\Entity\Appuntamento::class, 5);
if ($appuntamento) {
    echo $appuntamento->getId() . ' - ' . $appuntamento->getStato() . ' - Costo: ' . $appuntamento->getCosto() . "\n";
} else {
    echo "Appuntamento non trovato\n";
}

//avvia pagamento
echo "\n=== TEST read() APPUNTAMENTO PER AVVIA PAGAMENTO ===\n";
$appuntamento = $pm->read(\InkMaster\Entity\Appuntamento::class, 5);
if ($appuntamento) {
    echo $appuntamento->getId() . ' - ' . $appuntamento->getStato() . ' - Costo: ' . $appuntamento->getCosto() . "\n";
} else {
    echo "Appuntamento non trovato\n";
}

//inserisci dati pagamento
echo "\n=== TEST create() PAGAMENTO ===\n";
$appuntamento = $pm->read(\InkMaster\Entity\Appuntamento::class, 1);
$carta = $pm->read(\InkMaster\Entity\CartaDiCredito::class, 1);

$pagamento = new \InkMaster\Entity\Pagamento(
    importo: $appuntamento->getCosto(),
    stato: 'COMPLETATO',
    appuntamento: $appuntamento,
    cartaDiCredito: $carta
);

$pm->create($pagamento);
echo "Pagamento salvato con ID: " . $pagamento->getId() . "\n";


//test metodi in ViusualizzaPortfolio

//findPortfolioByStudioId
echo "\n=== TEST findPortfolioByStudioId() ===\n";
foreach ($pm->findPortfolioByStudioId(1) as $pub) {
    echo $pub->getId() . ' - ' . $pub->getTitolo() . "\n";
}

//findDettagliPubblicazione
echo "\n=== TEST findDettagliPubblicazione() ===\n";
$pub = $pm->findDettagliPubblicazione(1);
if ($pub) {
    echo $pub->getId() . ' - ' . $pub->getTitolo() . "\n";
} else {
    echo "Pubblicazione non trovata\n";
}