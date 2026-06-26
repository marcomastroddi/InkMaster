{if $_sessione.ruolo != 'amministratore'}
<div class="im-nav">
    <a href="/home" class="im-logo">INK<span>MASTER</span></a>
    <div class="im-nav-right">
        <a href="/registrazioneStudio">Per gli artisti</a>

        {if $_sessione.username}
            <a href="/visualizza_profilo" class="im-nav-profilo">
                <div class="im-avatar">
                    {$_sessione.username|truncate:1:'':true|upper}
                </div>
                <span class="im-nav-username">{$_sessione.username}</span>
            </a>
            <a href="#" class="im-btn-outline" id="im-logout-btn">Esci</a>
        {else}
            <a href="/registrazioneCliente" class="im-btn-outline">Registrati</a>
            <a href="/login" class="im-btn-outline">Accedi</a>
        {/if}

        
    </div>
</div>

{if $_sessione.username}
<div class="im-logout-overlay" id="im-logout-overlay">
    <div class="im-logout-modal">
        <div class="im-logout-eyebrow">CI DISPIACE VEDERTI ANDARE</div>
        <h2 class="im-logout-title">Vuoi davvero uscire?</h2>
        <p class="im-logout-desc">Accedendo al tuo profilo puoi tenere traccia delle prenotazioni, scrivere recensioni e seguire i tuoi studi preferiti. Tutto questo ti aspetta al prossimo accesso.</p>
        <div class="im-logout-actions">
            <button type="button" class="im-logout-stay" id="im-logout-cancel">Rimani con noi</button>
            <a href="/logout" class="im-logout-confirm">Esci</a>
        </div>
    </div>
</div>
{/if}

{else}
<div class="im-nav im-nav--admin">
    <a href="/home" class="im-logo">INK<span>MASTER</span></a>
    <div class="im-nav-right">
        <a href="/dashboard_moderatore" class="im-btn-outline">Dashboard Admin</a>
        <a href="/logout" class="im-btn-outline">Esci</a>
    </div>
</div>
{/if}
