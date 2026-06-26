{extends file='layouts/base.tpl'}

{block name="title"}Pagamenti — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/pagamenti.css">
    <style>
        .im-nav { background: rgba(8,14,12,0.96); backdrop-filter: blur(12px); position: sticky; top: 0; z-index: 100; }
    </style>
{/block}

{block name="content"}
<div class="im-pag-bg"></div>

<svg class="im-pag-deco" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#2fd8aa" stroke-width="0.8">
    <circle cx="100" cy="100" r="90"/>
    <circle cx="100" cy="100" r="70"/>
    <circle cx="100" cy="100" r="50"/>
    <circle cx="100" cy="100" r="30"/>
    <line x1="100" y1="10" x2="100" y2="190"/>
    <line x1="10" y1="100" x2="190" y2="100"/>
    <line x1="36" y1="36" x2="164" y2="164"/>
    <line x1="164" y1="36" x2="36" y2="164"/>
    <text x="100" y="107" text-anchor="middle" font-size="28" stroke-width="1" font-family="Archivo,sans-serif">€</text>
</svg>

<div class="im-pag-content">

    <div class="im-pag-eyebrow">Dashboard Studio</div>
    <h1 class="im-pag-title">Pagamenti</h1>

    <div class="im-pag-kpi">
        <div class="im-pag-kpi-card">
            <div class="im-pag-kpi-label">Questo mese</div>
            <div class="im-pag-kpi-value">€{$tot_mese|string_format:"%.2f"}</div>
            <div class="im-pag-kpi-sub">{$smarty.now|date_format:'%B %Y'}</div>
        </div>
        <div class="im-pag-kpi-card">
            <div class="im-pag-kpi-label">Quest'anno</div>
            <div class="im-pag-kpi-value">€{$tot_anno|string_format:"%.2f"}</div>
            <div class="im-pag-kpi-sub">{$smarty.now|date_format:'%Y'}</div>
        </div>
        <div class="im-pag-kpi-card">
            <div class="im-pag-kpi-label">Totale storico</div>
            <div class="im-pag-kpi-value">€{$tot_sempre|string_format:"%.2f"}</div>
            <div class="im-pag-kpi-sub">da sempre</div>
        </div>
        <div class="im-pag-kpi-card">
            <div class="im-pag-kpi-label">Completati</div>
            <div class="im-pag-kpi-value">{$n_completati}</div>
            <div class="im-pag-kpi-sub">tatuaggi pagati</div>
        </div>
    </div>

    {assign var="n_conf" value=$confermati|count}
    {assign var="n_paga" value=$da_pagare|count}

    <div class="im-pag-tabs">
        <a href="#confermati" class="im-pag-tab im-pag-tab--active" id="tab-conf">
            Lavori conclusi
            {if $n_conf > 0}<span>({$n_conf})</span>{/if}
        </a>
        <a href="#da-pagare" class="im-pag-tab" id="tab-paga">
            In attesa dal cliente
            {if $n_paga > 0}<span>({$n_paga})</span>{/if}
        </a>
    </div>

    {* ── #da-pagare PRIMA di #confermati — necessario per il selettore CSS ~ ── *}

    <div class="im-pag-section" id="da-pagare">
        <div class="im-pag-section-title">Il cliente deve ancora effettuare il pagamento</div>
        {if $da_pagare|count > 0}
        <div class="im-pag-lista">
            {foreach $da_pagare as $app}
            <div class="im-pag-card">
                <div class="im-pag-card-avatar">
                    {$app->getCliente()->getUsername()|substr:0:2|upper}
                </div>
                <div class="im-pag-card-info">
                    <div class="im-pag-card-name">{$app->getCliente()->getNome()} {$app->getCliente()->getCognome()}</div>
                    <div class="im-pag-card-meta">
                        {$app->getData()|date_format:'%d/%m/%Y'}
                        · {$app->getTatuatore()->getNome()} {$app->getTatuatore()->getCognome()}
                    </div>
                </div>
                <span class="im-pag-badge">In attesa</span>
                {if $app->getCosto()}
                <span class="im-pag-badge im-pag-badge--amount">€{$app->getCosto()|string_format:"%.2f"}</span>
                {/if}
            </div>
            {/foreach}
        </div>
        {else}
        <div class="im-pag-empty">Nessun pagamento in attesa dal cliente.</div>
        {/if}
    </div>

    <div class="im-pag-section" id="confermati">
        <div class="im-pag-section-title">Imposta il prezzo e abilita il pagamento</div>
        {if $confermati|count > 0}
        <div class="im-pag-lista">
            {foreach $confermati as $app}
            <div class="im-pag-card" id="card-{$app->getId()}">
                <div class="im-pag-card-avatar">
                    {$app->getCliente()->getUsername()|substr:0:2|upper}
                </div>
                <div class="im-pag-card-info">
                    <div class="im-pag-card-name">{$app->getCliente()->getNome()} {$app->getCliente()->getCognome()}</div>
                    <div class="im-pag-card-meta">
                        {$app->getData()|date_format:'%d/%m/%Y'}
                        · {$app->getTatuatore()->getNome()} {$app->getTatuatore()->getCognome()}
                    </div>
                </div>
                <div class="im-pag-form">
                    <input type="number" class="im-pag-input" placeholder="€ 0.00"
                           min="1" step="0.01" id="costo-{$app->getId()}">
                    <button class="im-pag-btn" onclick="abilitaPagamento({$app->getId()})">
                        Abilita pagamento
                    </button>
                </div>
            </div>
            {/foreach}
        </div>
        {else}
        <div class="im-pag-empty">Nessun lavoro concluso in attesa di pagamento.</div>
        {/if}
    </div>

</div>

<script>
function abilitaPagamento(id) {
    var costo = parseFloat(document.getElementById('costo-' + id).value);
    if (!costo || costo <= 0) { alert('Inserisci un importo valido.'); return; }
    fetch('/abilita_pagamento', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id=' + id + '&costo=' + costo
    })
    .then(function(r){ return r.json(); })
    .then(function(data){
        if (data.status === 'success') {
            var card = document.getElementById('card-' + id);
            if (card) {
                card.style.transition = 'opacity .3s';
                card.style.opacity = '0';
                setTimeout(function(){ card.remove(); }, 300);
            }
        } else {
            alert(data.message || 'Errore.');
        }
    });
}

(function(){
    function aggiornaTab() {
        var hash = window.location.hash;
        var tabConf = document.getElementById('tab-conf');
        var tabPaga = document.getElementById('tab-paga');
        if (!tabConf || !tabPaga) return;
        if (hash === '#da-pagare') {
            tabPaga.classList.add('im-pag-tab--active');
            tabConf.classList.remove('im-pag-tab--active');
        } else {
            tabConf.classList.add('im-pag-tab--active');
            tabPaga.classList.remove('im-pag-tab--active');
        }
    }
    aggiornaTab();
    window.addEventListener('hashchange', aggiornaTab);
})();
</script>
{/block}