<?php
namespace InkMaster\Control;

use App\Presentation\SmartyBoot;
// Se avete già impostato Doctrine e i modelli (Entity/Foundation), importerai qui le classi:
// use InkMaster\Foundation\FTatuatore; 

class RicercaVisualizzaTatuatori // Sostituisci con il nome reale della tua classe
{
    /**
     * Metodo esistente per gestire la ricerca e la visualizzazione dei tatuatori
     */
    public function RicercaVisualizzaTatuatori(): void 
    {
        // ==========================================
        // STEP 1: GESTIONE DEI DATI (In futuro qui userete Doctrine)
        // ==========================================
        
        // Simuliamo i dati dinamici che arriveranno dal database tramite Doctrine.
        // Questi array verranno ciclati da Smarty con il costrutto {foreach}
        
        // 1. Array degli stili (Tattoo Styles)
        $stiliTatuaggi = [
            ['nome' => 'Tradizionale', 'immagine' => 'https://placehold.co/150x150?text=Tradizionale'],
            ['nome' => 'Fine Line', 'immagine' => 'https://placehold.co/150x150?text=Fine+Line'],
            ['nome' => 'Realistico', 'immagine' => 'https://placehold.co/150x150?text=Realistico'],
            ['nome' => 'Maori', 'immagine' => 'https://placehold.co/150x150?text=Maori']
        ];

        // 2. Array dei tatuatori (Tattoo Artist) filtrati per la città (es. Roma)
        $listaTatuatori = [
            ['nome' => 'DanInk'],
            ['nome' => 'Dankink'],
            ['nome' => 'Danrkink'],
            ['nome' => 'Alex Tattoo']
        ];

        // 3. Array o oggetto per la recensione in evidenza nel mockup
        $recensioneInEvidenza = [
            'utente' => 'Lorenzo Rossi',
            'intestazione' => 'Lavoro spettacolare!',
            'descrizione' => 'Il tatuatore ha capito al volo la mia idea. Linee sottilissime e sfumature perfette.',
            'foto_tatuaggio' => 'https://placehold.co/120x150?text=Tatuaggio',
            'nome_tatuatore' => 'DanInk'
        ];


        // ==========================================
        // STEP 2: DIALOGO CON IL PRESENTATION LAYER (Smarty)
        // ==========================================
        
        // Richiamiamo l'istanza centralizzata di Smarty bootstraccata prima
        $smarty = SmartyBoot::getSmarty();

        // Passiamo i dati puliti (array/variabili) a Smarty.
        // Il primo parametro è il nome della variabile che userai nel file .tpl
        // Il secondo parametro è la variabile PHP che contiene i dati.
        $smarty->assign('stili', $stiliTatuaggi);
        $smarty->assign('tatuatori', $listaTatuatori);
        $smarty->assign('recensione', $recensioneInEvidenza);
        
        // Passiamo anche una stringa semplice per la città (dinamica)
        $smarty->assign('citta_corrente', 'Roma');


        // ==========================================
        // STEP 3: RENDERING DELLA VIEW
        // ==========================================
        
        // Diciamo a Smarty di prendere lo scheletro della home che si trova 
        // all'interno della sottocartella 'pages' (in base alla tua bellissima struttura)
        $smarty->display('pages/home.tpl');
    }
}