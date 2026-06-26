{extends file='layouts/base.tpl'}

{block name="title"}Area personale — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/areaPersonale.css">
{/block}

{block name="content"}
<div class="im-ap-page">

{* ── Sfondo: blob verdi + fineline geometrico ── *}
<div class="im-ap-bg-layer">
    <div class="im-ap-blob im-ap-blob-1"></div>
    <div class="im-ap-blob im-ap-blob-2"></div>
    <div class="im-ap-blob im-ap-blob-3"></div>

    <svg class="im-ap-svg" viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice"
         xmlns="http://www.w3.org/2000/svg">

        {* — Rosa grande a sinistra — *}
        <g fill="none" stroke="#2fd8aa" stroke-linecap="round"
           style="animation: im-geo-spin 60s linear infinite; transform-origin: 320px 450px;">
            <circle cx="320" cy="450" r="120" stroke-width="0.5"/>
            <circle cx="320" cy="330" r="120" stroke-width="0.5"/>
            <circle cx="320" cy="570" r="120" stroke-width="0.5"/>
            <circle cx="216" cy="390" r="120" stroke-width="0.5"/>
            <circle cx="424" cy="390" r="120" stroke-width="0.5"/>
            <circle cx="216" cy="510" r="120" stroke-width="0.5"/>
            <circle cx="424" cy="510" r="120" stroke-width="0.5"/>
            <circle cx="320" cy="450" r="240" stroke-width="0.3" opacity="0.6"/>
            <circle cx="320" cy="450" r="360" stroke-width="0.2" opacity="0.35"/>
            <polygon points="320,330 424,390 424,510 320,570 216,510 216,390" stroke-width="0.4" opacity="0.6"/>
            <polygon points="320,314 428,503 212,503" stroke-width="0.3" opacity="0.5"/>
            <polygon points="320,586 212,397 428,397" stroke-width="0.3" opacity="0.5"/>
            <line x1="320" y1="450" x2="320" y2="90"  stroke-width="0.2" opacity="0.3"/>
            <line x1="320" y1="450" x2="320" y2="810" stroke-width="0.2" opacity="0.3"/>
            <line x1="320" y1="450" x2="680" y2="450" stroke-width="0.2" opacity="0.3"/>
            <line x1="320" y1="450" x2="-40" y2="450" stroke-width="0.2" opacity="0.3"/>
            <line x1="320" y1="450" x2="575" y2="195" stroke-width="0.2" opacity="0.25"/>
            <line x1="320" y1="450" x2="65"  y2="195" stroke-width="0.2" opacity="0.25"/>
            <line x1="320" y1="450" x2="575" y2="705" stroke-width="0.2" opacity="0.25"/>
            <line x1="320" y1="450" x2="65"  y2="705" stroke-width="0.2" opacity="0.25"/>
            <circle cx="320" cy="210" r="3" stroke-width="0.6" opacity="0.6"/>
            <circle cx="320" cy="690" r="3" stroke-width="0.6" opacity="0.6"/>
            <circle cx="80"  cy="330" r="2" stroke-width="0.5" opacity="0.5"/>
            <circle cx="560" cy="330" r="2" stroke-width="0.5" opacity="0.5"/>
            <circle cx="80"  cy="570" r="2" stroke-width="0.5" opacity="0.5"/>
            <circle cx="560" cy="570" r="2" stroke-width="0.5" opacity="0.5"/>
        </g>

        {* — Rosa piccola a destra — *}
        <g fill="none" stroke="#2fd8aa" stroke-linecap="round"
           style="animation: im-geo-spin 80s linear infinite reverse; transform-origin: 1150px 400px;">
            <circle cx="1150" cy="400" r="70"  stroke-width="0.5"/>
            <circle cx="1150" cy="330" r="70"  stroke-width="0.5"/>
            <circle cx="1150" cy="470" r="70"  stroke-width="0.5"/>
            <circle cx="1089" cy="365" r="70"  stroke-width="0.5"/>
            <circle cx="1211" cy="365" r="70"  stroke-width="0.5"/>
            <circle cx="1089" cy="435" r="70"  stroke-width="0.5"/>
            <circle cx="1211" cy="435" r="70"  stroke-width="0.5"/>
            <circle cx="1150" cy="400" r="140" stroke-width="0.3" opacity="0.6"/>
            <circle cx="1150" cy="400" r="210" stroke-width="0.2" opacity="0.35"/>
            <polygon points="1150,330 1211,365 1211,435 1150,470 1089,435 1089,365" stroke-width="0.4" opacity="0.6"/>
            <polygon points="1150,318 1213,428 1087,428" stroke-width="0.3" opacity="0.5"/>
            <polygon points="1150,482 1087,372 1213,372" stroke-width="0.3" opacity="0.5"/>
            <line x1="1150" y1="400" x2="1150" y2="190" stroke-width="0.2" opacity="0.3"/>
            <line x1="1150" y1="400" x2="1150" y2="610" stroke-width="0.2" opacity="0.3"/>
            <line x1="1150" y1="400" x2="940"  y2="400" stroke-width="0.2" opacity="0.3"/>
            <line x1="1150" y1="400" x2="1360" y2="400" stroke-width="0.2" opacity="0.3"/>
            <line x1="1150" y1="400" x2="1299" y2="251" stroke-width="0.2" opacity="0.25"/>
            <line x1="1150" y1="400" x2="1001" y2="251" stroke-width="0.2" opacity="0.25"/>
            <line x1="1150" y1="400" x2="1299" y2="549" stroke-width="0.2" opacity="0.25"/>
            <line x1="1150" y1="400" x2="1001" y2="549" stroke-width="0.2" opacity="0.25"/>
            <circle cx="1150" cy="260" r="2.5" stroke-width="0.6" opacity="0.6"/>
            <circle cx="1150" cy="540" r="2.5" stroke-width="0.6" opacity="0.6"/>
            <circle cx="1010" cy="330" r="1.5" stroke-width="0.5" opacity="0.5"/>
            <circle cx="1290" cy="330" r="1.5" stroke-width="0.5" opacity="0.5"/>
            <circle cx="1010" cy="470" r="1.5" stroke-width="0.5" opacity="0.5"/>
            <circle cx="1290" cy="470" r="1.5" stroke-width="0.5" opacity="0.5"/>
        </g>

    </svg>
</div>

<div class="im-ap-inner">

    {* ── Header profilo ── *}
    <div class="im-ap-header">
        <div class="im-ap-avatar">
            {$smarty.session.username|substr:0:1|upper}
        </div>
        <div class="im-ap-header-info">
            <div class="im-ap-welcome-label">Area personale</div>
            <div class="im-ap-welcome">Bentornato, {$smarty.session.username}</div>
        </div>
        <a href="/visualizza_profilo" class="im-ap-gestisci">Gestisci profilo</a>
    </div>

    {* ── Le mie prenotazioni ── *}
    <div class="im-ap-bookings">
        <div class="im-ap-section-title">Le mie prenotazioni</div>

        {if empty($appuntamenti)}
            <div class="im-ap-empty">Nessuna prenotazione ancora. <a href="/home" style="color:#2fd8aa">Cerca uno studio</a></div>
        {else}
            {foreach $appuntamenti as $app}
            {assign var='stato' value=$app->getStato()}
            <div class="im-ap-booking-card">

                <div class="im-ap-studio-avatar">
                    {$app->getStudio()->getNome()|substr:0:1|upper}
                </div>

                <div class="im-ap-booking-info">
                    <div class="im-ap-studio-name">{$app->getStudio()->getNome()}</div>
                    <div class="im-ap-booking-note">{$app->getNote()|truncate:60:'...'|default:'—'}</div>
                </div>

                <div class="im-ap-booking-meta">
                    <div class="im-ap-booking-date">{$app->getData()->format('d/m/Y')}</div>
                    <div class="im-ap-booking-city">{$app->getStudio()->getPosizione()->value|default:''}</div>
                </div>

                {if $stato === 'IN_ATTESA'}
                    <span class="im-ap-badge im-ap-badge--attesa">In attesa</span>
                {elseif $stato === 'CONFERMATO'}
                    <span class="im-ap-badge im-ap-badge--confermato">Confermato</span>
                {elseif $stato === 'DA_PAGARE'}
                    <span class="im-ap-badge im-ap-badge--pagare">Da pagare</span>
                {elseif $stato === 'COMPLETATO'}
                    <span class="im-ap-badge im-ap-badge--completato">Completato</span>
                {elseif $stato === 'ANNULLATO'}
                    <span class="im-ap-badge im-ap-badge--annullato">Annullato</span>
                {/if}

                <div class="im-ap-actions">
                    {if $stato === 'DA_PAGARE'}
                        <a href="/avvia_pagamento?id={$app->getId()}" class="im-ap-btn-pay">
                            PAGA {if $app->getCosto()}€{$app->getCosto()|string_format:"%.2f"}{else}€{/if}
                        </a>
                    {elseif $stato === 'COMPLETATO'}
                        <span class="im-ap-btn-paid">✓ Pagato</span>
                    {/if}
                    <a href="#" class="im-ap-btn-chat" title="Chat">💬 Chat</a>
                </div>

            </div>
            {/foreach}
        {/if}
    </div>

    {* ── Le mie recensioni ── *}
    <div class="im-ap-reviews">
        <div class="im-ap-section-title">Le mie recensioni</div>

        {if empty($recensioni)}
            <div class="im-ap-empty">Non hai ancora scritto recensioni.</div>
        {else}
            <div class="im-ap-review-grid">
            {foreach $recensioni as $rec}
            <div class="im-ap-review-card">
                <div class="im-ap-review-head">
                    <div class="im-ap-review-avatar">
                        {$rec->getStudio()->getNome()|substr:0:1|upper}
                    </div>
                    <div class="im-ap-review-meta">
                        <div class="im-ap-review-studio">{$rec->getStudio()->getNome()}</div>
                        <div class="im-ap-review-date">{$rec->getData()->format('M Y')}</div>
                    </div>
                </div>
                <div class="im-ap-stars">
                    {section name=i loop=5}
                        {if $smarty.section.i.index < $rec->getVoto()}★{else}☆{/if}
                    {/section}
                </div>
                <div class="im-ap-review-title">{$rec->getTitolo()}</div>
                {if $rec->getDescrizione()}
                    <div class="im-ap-review-desc">{$rec->getDescrizione()}</div>
                {/if}
                <span class="im-ap-review-tag">{$rec->getStile()}</span>
            </div>
            {/foreach}
            </div>
        {/if}
    </div>

</div>
</div>
{/block}