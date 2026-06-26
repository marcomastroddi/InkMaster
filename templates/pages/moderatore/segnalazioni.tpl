{extends file='layouts/base.tpl'}

{block name="title"}Segnalazioni — InkMaster Admin{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/home.css">
    <link rel="stylesheet" href="/CSS/admin.css">
{/block}

{block name="content"}
<div class="adm-page">

    <div style="position:fixed;inset:0;z-index:0;pointer-events:none;overflow:hidden;">
        <div class="im-blob im-blob-1" style="width:600px;height:600px;left:-180px;top:-200px;"></div>
        <div class="im-blob im-blob-2" style="width:500px;height:500px;right:-120px;top:80px;animation-delay:-4s;"></div>
    </div>

    <header class="adm-topbar">
        <div class="adm-topbar-logo">InkMaster</div>
        <div class="adm-topbar-title">Gestione Segnalazioni</div>
        <div class="adm-topbar-right">
            <a href="/dashboard_moderatore" class="adm-topbar-icon" title="Dashboard">⬅</a>
            <div class="adm-topbar-sep"></div>
            <div class="adm-topbar-user">
                <div class="adm-topbar-avatar">{$smarty.session.username|default:'A'|substr:0:1|upper}</div>
                <div>
                    <div class="adm-topbar-uname">{$smarty.session.username|default:'Admin'|escape}</div>
                    <a href="/logout" class="adm-topbar-logout">Esci</a>
                </div>
            </div>
        </div>
    </header>

    <div class="adm-body">

        <div class="adm-welcome">
            <div class="adm-section-label">Moderazione</div>
            <h1 class="adm-welcome-title">Utenti <span>segnalati</span></h1>
            <p class="adm-welcome-sub">Elenco degli utenti che hanno ricevuto segnalazioni. Premi "Banna" per applicare una sanzione.</p>
        </div>

        <div class="adm-table-card">
            <div class="adm-table-head">
                <span class="adm-table-title">Gestione utenti</span>
                <span class="adm-table-count">👥 {$data|count} segnalazioni</span>
            </div>

            {if $data}
            <table class="adm-table">
                <thead>
                    <tr>
                        <th>Utente</th>
                        <th>Motivo</th>
                        <th>Stato</th>
                        <th>Data</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                {foreach $data as $seg}
                    {if $seg->getCliente()}
                        {assign var=utente value=$seg->getCliente()}
                        {assign var=tipo value='cliente'}
                        {assign var=nomeUtente value="`$utente->getNome()` `$utente->getCognome()`"}
                        {assign var=iniziali value="`$utente->getNome()|substr:0:1``$utente->getCognome()|substr:0:1`"}
                    {elseif $seg->getStudio()}
                        {assign var=utente value=$seg->getStudio()}
                        {assign var=tipo value='studio'}
                        {assign var=nomeUtente value=$utente->getNome()}
                        {assign var=iniziali value=$utente->getNome()|substr:0:2|upper}
                    {else}
                        {continue}
                    {/if}
                    <tr>
                        <td>
                            <div class="adm-user-cell">
                                <div class="adm-user-av adm-user-av--{$tipo}">{$iniziali|upper}</div>
                                <div>
                                    <div class="adm-user-name">{$nomeUtente|escape}</div>
                                    <div class="adm-user-email">{$utente->getEmail()|escape}</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="adm-motivo">{$seg->getMotivo()|escape}</span></td>
                        <td>
                            {if $seg->getStato() == 'APERTA'}
                                <span class="adm-badge adm-badge--red">Aperta</span>
                            {else}
                                <span class="adm-badge adm-badge--muted">Chiusa</span>
                            {/if}
                        </td>
                        <td class="adm-date">{$seg->getData()->format('d M Y')}</td>
                        <td>
                            <a href="/seleziona_utente?id={$utente->getId()}&tipo={$tipo}" class="adm-btn-ban">Banna</a>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
            {else}
            <div class="adm-empty">
                <div class="adm-empty-icon">✓</div>
                <p>Nessuna segnalazione aperta.</p>
            </div>
            {/if}
        </div>
    </div>
</div>
{/block}