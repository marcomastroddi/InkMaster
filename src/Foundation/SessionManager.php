<?php
namespace InkMaster\Foundation;
//Codice generato da claude, da revisionare, è la base di session

/**
 * Gestione centralizzata della sessione.
 *
 * CHIAVI AMMESSE (non inventarne altre fuori da questo elenco):
 *
 * --- IDENTITÀ (scritte SOLO da Login::login, durano tutta la sessione) ---
 *   'username'   string  Lo username dell'utente loggato
 *   'ruolo'      string  'cliente' | 'studio' | 'amministratore'
 *   'idUtente'  int     L'id dell'entità loggata (qualunque tipo)
 *   'id_studio'  int     Solo per ruolo 'studio': id dello studio (dashboard studio)
 *
 * --- STATI TEMPORANEI / WIZARD (scritti durante una procedura, poi rimossi) ---
 *   'filtri_ricerca'      array  Filtri della ricerca in corso (città, stile, testo)
 *   'prenotazione'        array  Dati della prenotazione in corso (studio_id, tatuatore_id, ...)
 *   'bozza_recensione'    array  Bozza della recensione in corso
 *   'studio_selezionato'  int    Studio a cui si sta lasciando la recensione
 *   'utente_selezionato'  int    Utente che il moderatore sta per bannare
 */
class SessionManager
{
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function destroy(): void
    {
        session_destroy();
        $_SESSION = [];
    }
}