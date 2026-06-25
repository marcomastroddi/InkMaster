<div class="im-nav">
    <a href="/home" class="im-logo">INK<span>MASTER</span></a>
    <div class="im-nav-right">
        <a href="/registrazioneStudio">Per gli artisti</a>

        {if $_sessione.username}
            {* Utente loggato: mostra avatar + nome cliccabile *}
            <a href="/visualizza_profilo" class="im-nav-profilo">
                <div class="im-avatar">
                    {$_sessione.username|truncate:1:'':true|upper}
                </div>
                <span class="im-nav-username">{$_sessione.username}</span>
            </a>
            <a href="/logout" class="im-btn-outline">Esci</a>
        {else}
            {* Utente ospite: link classici *}
            <a href="/registrazioneCliente" class="im-btn-outline">Registrati</a>
            <a href="/login" class="im-btn-outline">Accedi</a>
        {/if}

        <span class="im-lang">🌐 <strong>ITA</strong></span>
    </div>
</div>