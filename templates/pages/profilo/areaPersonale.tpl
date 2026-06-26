{extends file='layouts/base.tpl'}

{block name="title"}Area personale — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/areaPersonale.css">
{/block}

{block name="content"}
<div class="im-ap-page">
<div class="im-ap-inner">

    {* ── Header profilo ── *}
    <div class="im-ap-header">
        <div class="im-ap-avatar">
            {$smarty.session.username|substr:0:1|upper}
        </div>
        <div class="im-ap-header-info">
            <div class="im-ap-welcome">Bentornato, {$smarty.session.username}</div>
            <div class="im-ap-meta">
                <span>✉ {$smarty.session.email|default:''}</span>
                <span>📍 {$smarty.session.posizione|default:''}</span>
            </div>
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

                {* Avatar studio *}
                <div class="im-ap-studio-avatar">
                    {$app->getStudio()->getNome()|substr:0:1|upper}
                </div>

                {* Info *}
                <div class="im-ap-booking-info">
                    <div class="im-ap-studio-name">{$app->getStudio()->getNome()}</div>
                    <div class="im-ap-booking-note">{$app->getNote()|truncate:60:'...'|default:'—'}</div>
                </div>

                {* Data + città *}
                <div class="im-ap-booking-meta">
                    <div class="im-ap-booking-date">{$app->getData()->format('d/m/Y')}</div>
                    <div class="im-ap-booking-city">{$app->getStudio()->getPosizione()|default:''}</div>
                </div>

                {* Badge stato *}
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

                {* Azioni *}
                <div class="im-ap-actions">
                    {if $stato === 'DA_PAGARE'}
                        <a href="/avvia_pagamento?id={$app->getId()}" class="im-ap-btn-pay">
                            PAGA {if $app->getCosto()}€{$app->getCosto()|string_format:"%.2f"}{else}€{/if}
                        </a>
                    {elseif $stato === 'COMPLETATO'}
                        <span class="im-ap-btn-paid">✓ Pagato</span>
                    {/if}
                    <a href="#" class="im-ap-btn-chat" title="Chat">
                        💬 Chat
                    </a>
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