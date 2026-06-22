<?php
require 'vendor/autoload.php';

use InkMaster\Foundation\PersistentManager;

$pm = PersistentManager::getInstance();

echo "=== STILI DAL DATABASE ===\n";
foreach ($pm->findAvailableStyles() as $stile) {
    echo $stile->getId() . ' - ' . $stile->getNome() . "\n";
}

echo "\n=== DASHBOARD MODERATORE ===\n";
$mod = new \InkMaster\Control\ControllerAmministratore\ModerazionePiattaforma();
print_r($mod->visualizzaDashboard()['data']['kpi']);

echo "\n=== SEGNALAZIONI (quante) ===\n";
echo count($mod->accedi_segnalazioni()['data']) . " segnalazioni\n";

echo "\n=== BAN ===\n";
$_SESSION['utente_selezionato'] = 1;
$mod = new \InkMaster\Control\ControllerAmministratore\ModerazionePiattaforma();
$esito = $mod->conferma_ban('temporaneo', '7 giorni', 'spam', 'bassa', 'Messaggi ripetuti');
echo "Ban salvato con id: " . $esito['data']['ban_id'] . "\n";

echo "\n=== #1 + BAN con tipo reale ===\n";
$mod = new \InkMaster\Control\ControllerAmministratore\ModerazionePiattaforma();

// simulo il moderatore che seleziona uno STUDIO dalla segnalazione
$sel = $mod->seleziona_utente(1, 'studio');
echo "Selezionato: " . $sel['data']->getNome() . " (tipo studio)\n";

$esito = $mod->conferma_ban('permanente', '-', 'contenuti', 'alta', 'Foto non conformi');
echo "Ban id " . $esito['data']['ban_id'] . " — tipo utente: "
   . $_SESSION['tipo_utente_selezionato'] . "\n";