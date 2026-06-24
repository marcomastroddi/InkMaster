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
        <a href="/cerca">Per gli artisti</a>
        {if $_sessione.username}
            <a href="/visualizza_profilo" class="im-nav-user">
                <div class="im-nav-avatar">{$_sessione.username|substr:0:2|upper}</div>
                <span class="im-nav-uname">{$_sessione.username}</span>
            </a>
        {else}
            <a href="/login" class="im-btn-outline">Accedi</a>
        {/if}
        <span class="im-lang">🌐 <strong>ITA</strong></span>
    </div>
</div>