{extends file='layouts/base.tpl'}

{block name="title"}Storico Appuntamenti — InkMaster Studio{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/StoricoAppuntamenti.css">
{/block}

{block name="content"}
<div class="im-storico-page">

    <div class="im-hero-bg">
        <div class="im-blob im-blob-1"></div>
        <div class="im-blob im-blob-2"></div>
        <div class="im-blob im-blob-3"></div>
    </div>

    <div class="im-storico-content">
        <div class="im-dash-eyebrow">Dashboard Studio</div>
        <h1 class="im-dash-title">I miei clienti</h1>

        <div class="im-storico-filtri">
            <a href="/storico_appuntamenti" class="im-filtro{if !isset($smarty.get.stato)} im-filtro-attivo{/if}">Tutti</a>
            <a href="/storico_appuntamenti?stato=CONFERMATO" class="im-filtro{if isset($smarty.get.stato) && $smarty.get.stato === 'CONFERMATO'} im-filtro-attivo{/if}">Confermati</a>
            <a href="/storico_appuntamenti?stato=IN_CORSO" class="im-filtro{if isset($smarty.get.stato) && $smarty.get.stato === 'IN_CORSO'} im-filtro-attivo{/if}">In corso</a>
            <a href="/storico_appuntamenti?stato=COMPLETATO" class="im-filtro{if isset($smarty.get.stato) && $smarty.get.stato === 'COMPLETATO'} im-filtro-attivo{/if}">Completati</a>
            <a href="/storico_appuntamenti?stato=ANNULLATO" class="im-filtro{if isset($smarty.get.stato) && $smarty.get.stato === 'ANNULLATO'} im-filtro-attivo{/if}">Annullati</a>
            <a href="/storico_appuntamenti?stato=IN_ATTESA" class="im-filtro{if isset($smarty.get.stato) && $smarty.get.stato === 'IN_ATTESA'} im-filtro-attivo{/if}">In attesa</a>
        </div>

        {if empty($data)}
            <p class="im-nessuna">Nessun appuntamento trovato.</p>
        {else}
            <div class="im-storico-lista">
                {foreach $data as $app}
                {assign var="stato" value=$app->getStato()}
                {if !isset($smarty.get.stato) || $smarty.get.stato === $stato}
                <div class="im-storico-card">

                    <div class="im-richiesta-avatar">
                        {$app->getCliente()->getNome()|substr:0:1|upper}{$app->getCliente()->getCognome()|substr:0:1|upper}
                    </div>

                    <div class="im-storico-info">
                        <div class="im-richiesta-nome">{$app->getCliente()->getNome()|escape} {$app->getCliente()->getCognome()|escape}</div>
                        <div class="im-richiesta-username">@{$app->getCliente()->getUsername()|escape}</div>
                    </div>

                    <div class="im-richiesta-campo">
                        <div class="im-richiesta-label">Data</div>
                        <div class="im-richiesta-valore">{$app->getData()->format('d/m/Y')}</div>
                    </div>

                    <div class="im-richiesta-campo">
                        <div class="im-richiesta-label">Orario</div>
                        <div class="im-richiesta-valore">{$app->getOraInizio()->format('H:i')} – {$app->getOraFine()->format('H:i')}</div>
                    </div>

                    <div class="im-richiesta-campo">
                        <div class="im-richiesta-label">Note</div>
                        <div class="im-richiesta-valore">{$app->getNote()|default:'—'|escape}</div>
                    </div>

                    <div class="im-storico-stato im-stato-{$stato|lower}">
                        {if $stato === 'CONFERMATO'}Confermato
                        {elseif $stato === 'IN_CORSO'}In corso
                        {elseif $stato === 'COMPLETATO'}Completato
                        {elseif $stato === 'ANNULLATO'}Annullato
                        {elseif $stato === 'IN_ATTESA'}In attesa
                        {else}{$stato|escape}
                        {/if}
                    </div>

                </div>
                {/if}
                {/foreach}
            </div>
        {/if}

        <a href="/dashboardStudio" class="im-btn-back">← Torna alla dashboard</a>
    </div>
</div>
{/block}