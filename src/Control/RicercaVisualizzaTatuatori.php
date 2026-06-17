<?php
namespace InkMaster\Control;

use App\Presentation\SmartyBoot;
use Doctrine\ORM\EntityManager; //serve come punto di partenza per interagire con il database tramite Doctrine
use InkMaster\Entity\Tatuatore; // Importa l'entità Tatuatore che rappresenta la tabella dei tatuatori nel database
use InkMaster\Enum\Citta\Citta;

class RicercaVisualizzaTatuatori // Sostituisci con il nome reale della tua classe
{   
    private EntityManager $em;

    /**
     * IL COSTRUTTORE
     * Serve a inizializzare il servizio inserendo la dipendenza obbligatoria (Dependency Injection).
     * Chiunque istanzi questo Control deve passargli l'EntityManager già pronto dal bootstrap dell'app.
     */
    public function __construct(EntityManager $em)
    {
        // Salviamo l'EntityManager nell'attributo privato della classe per renderlo disponibile a tutti i metodi.
        $this->em = $em;
    }



    
    public function mostra_home(): array
    {
        // Recuperiamo il Repository (Foundation Layer)
        $repository = $this->em->getRepository(Tatuatore::class);
        
        // 1. Prendiamo gli stili REALI dal database tramite Doctrine
        $stiliTatuaggi = $repository->findAvailableStyles();

        // 2. Definiamo una città di default per la prima visualizzazione (es. Roma o nessuna)
        $cittaDefault = 'Roma';

        // 3. Recuperiamo una recensione in evidenza (può essere finta per ora o reale dal DB)
        $recensioneInEvidenza = [
            'utente' => 'Lorenzo Rossi',
            'intestazione' => 'Lavoro spettacolare!',
            'descrizione' => 'Il tatuatore ha capito al volo la mia idea. Linee sottilissime.',
            'foto_tatuaggio' => 'https://placehold.co/120x150?text=Tatuaggio',
            'nome_tatuatore' => 'DanInk'
        ];

        // Restituiamo il pacchetto iniziale per la Home al Presentation Layer
        return [
            'status' => 'success',
            'interfaccia' => 'Home Page Iniziale',
            'stili' => $stiliTatuaggi,
            'citta_corrente' => $cittaDefault,
            'recensione' => $recensioneInEvidenza,
            'tatuatori' => [] // All'inizio la lista dei tatuatori cercati è vuota!
        ];
    }



    public function clicca_catch_phrase(): array
{
    // Recuperiamo tutte le città disponibili dall'enumerazione Citta
    $cittaEnum = Citta::cases(); 

    // Trasformiamo l'array di oggetti Enum in un array di stringhe semplici (i nomi delle città)
    $cittaDisponibili = array_map(fn($citta) => $citta->value, $cittaEnum);

    // Restituiamo l'elenco delle città disponibili al Presentation Layer
    return [
        'status' => 'success',
        'interfaccia' => 'Menù città dinamico', 
        'data' => $cittaDisponibili            // L'elenco pulito delle 20 stringhe (es. ["Roma", "Milano", ...])
    ];
}

    public function seleziona_posizione(string $citta): array
    {
        // se la stringa è vuota, blocchiamo l'esecuzione segnalando l'errore.
        if (empty($citta)) {
            return ['status' => 'error', 'message' => 'Città non valida'];
        }

        // Orchestrazione dello stato: memorizziamo la città nella sessione PHP ($_SESSION).
        // Questo permetterà al metodo di ricerca (più avanti) di sapere quale città avevamo scelto.
        $_SESSION['ricerca_citta'] = $citta;

        return [
            'status' => 'success',
            'interfaccia' => 'Catch phrase aggiornata', // Destinazione sul diagramma [cite: 9]
            'catch_phrase' => "I migliori tatuatori a " . htmlspecialchars($citta) // Stringa dinamica pronta per la UI
        ];
    }

    public function seleziona_filtro(string $tipoFiltro): array
    {
        // Verifichiamo che il filtro richiesto sia effettivamente quello gestito ("Stile") [cite: 10]
        if ($tipoFiltro === "Stile") {
            // Otteniamo il Repository (Foundation) per accedere ai dati dei tatuatori.
            $repository = $this->em->getRepository(Tatuatore::class);
            
            // Chiamiamo il metodo del repository per estrarre gli stili di tatuaggio censiti a sistema.
            $stili = $repository->findAvailableStyles(); 

            return [
                'status' => 'success',
                'interfaccia' => 'sezione "TatooStyles"', // Destinazione sul diagramma [cite: 11]
                'data' => $stili                         // Array di stili da mostrare nella sezione grafica
            ];
        }

        return ['status' => 'error', 'message' => 'Filtro non supportato'];
    }

    public function apri_stile(string $stile): array
    {
        return [
            'status' => 'success',
            'interfaccia' => 'interfaccia dettaglio stile', // Destinazione sul diagramma [cite: 13]
            'stile_selezionato' => $stile                   // Comunica alla View quale stile l'utente sta visualizzando
        ];
    }

    public function aggiungi_filtri(string $stile): array
    {
        // Salviamo lo stile nella sessione sotto la chiave dei filtri di ricerca.
        $_SESSION['filtri_ricerca']['stile'] = $stile;

        return [
            'status' => 'success',
            'interfaccia' => 'Home page filtri aggiornati' // Destinazione sul diagramma [cite: 15]
        ];
    }

    public function imposta_filtri(array $parametri): array
    {
        // Prende l'array dei filtri già salvati (se non esiste ne crea uno vuoto con ??) e unisce i nuovi parametri.
        $_SESSION['filtri_ricerca'] = array_merge($_SESSION['filtri_ricerca'] ?? [], $parametri);

        return [
            'status' => 'success',
            'interfaccia' => 'Parametri di ricerca aggiornati', // Destinazione sul diagramma [cite: 18]
            'filtri_attuali' => $_SESSION['filtri_ricerca']     // Restituisce lo stato attuale dei filtri per controllo
        ];
    }

    public function avvia_ricerca(): array
    {   //VERIFUCA PARAMETRO TESTO


        // Recuperiamo i dati che avevamo precedentemente "memorizzato" nelle interazioni 2, 5 e 6.
        $citta = $_SESSION['ricerca_citta'] ?? null;
        $filtri = $_SESSION['filtri_ricerca'] ?? [];

        // Chiediamo il nostro Foundation Layer (il Repository di Tatuatore).
        $repository = $this->em->getRepository(Tatuatore::class);
        
        // Deleghiamo la query complessa al Repository. Doctrine interrogherà il DB e ci restituirà 
        // direttamente un array composto da veri e propri oggetti di classe Entity (Tatuatore).
        $tatuatori = $repository->searchByCittaAndFiltri($citta, $filtri);

        return [
            'status' => 'success',
            'interfaccia' => 'Lista tatuatori', // Destinazione sul diagramma [cite: 20]
            'data' => $tatuatori               // Passiamo l'array di Entity al Presentation layer che le ciclerà a schermo
        ];
    }

    public function ordina_risultati(string $parametro): array
    {
        // Recuperiamo nuovamente la città e i filtri correnti dalla sessione per non perdere la ricerca attuale.
        $citta = $_SESSION['ricerca_citta'] ?? null;
        $filtri = $_SESSION['filtri_ricerca'] ?? [];

        $repository = $this->em->getRepository(Tatuatore::class);
        
        // Rieseguiamo la ricerca passando come terzo argomento il parametro di ordinamento richiesto.
        $tatuatoriOrdinati = $repository->searchByCittaAndFiltri($citta, $filtri, $parametro);

        return [
            'status' => 'success',
            'interfaccia' => 'Interfaccia risultati aggiornata', // Destinazione sul diagramma [cite: 22]
            'data' => $tatuatoriOrdinati                          // I dati ordinati pronti per essere renderizzati
        ];
    }
}