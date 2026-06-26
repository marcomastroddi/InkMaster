<div class="im-topbar">
<div class="im-nav im-nav--search">
    <a href="/home" class="im-logo">INK<span>MASTER</span></a>

    <form action="/avvia_ricerca" method="get" class="im-nav-search">
        <div class="im-nav-search-box">
            <span class="im-search-icon">⌕</span>
            <input type="text" name="testo" autocomplete="off"
                   value="{$filtri_correnti.testo|default:''|escape}"
                   placeholder="es. DanInk — nome, studio o parola chiave…">
        </div>
        <button type="submit" class="im-nav-search-btn">Cerca</button>
    </form>

    <div class="im-nav-right">
        {if $_sessione.username}
            {if $_sessione.ruolo === 'cliente'}
                <a href="/area_personale" class="im-btn-outline im-btn-prenotazioni">Le mie prenotazioni</a>
            {/if}
            <a href="/visualizza_profilo" class="im-nav-profilo">
                <div class="im-avatar">{$_sessione.username|substr:0:1|upper}</div>
                <span class="im-nav-username">{$_sessione.username}</span>
            </a>
            <a href="#" class="im-btn-outline" id="im-logout-btn">Esci</a>
        {else}
            <a href="/registrazioneCliente" class="im-btn-outline">Registrati</a>
            <a href="/login" class="im-btn-outline">Accedi</a>
        {/if}
    </div>
</div>
</div>

{if $_sessione.username}
<div class="im-logout-overlay" id="im-logout-overlay">
    <div class="im-logout-modal">
        <div class="im-logout-eyebrow">CI DISPIACE VEDERTI ANDARE</div>
        <h2 class="im-logout-title">Vuoi davvero uscire?</h2>
        <p class="im-logout-desc">Accedendo al tuo profilo puoi tenere traccia delle prenotazioni, scrivere recensioni e seguire i tuoi studi preferiti.</p>
        <div class="im-logout-actions">
            <button type="button" class="im-logout-stay" id="im-logout-cancel">Rimani con noi</button>
            <a href="/logout" class="im-logout-confirm">Esci</a>
        </div>
    </div>
</div>
{/if}