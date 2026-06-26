{extends file='layouts/base.tpl'}

{block name="title"}Area Personale — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/areaPersonale.css">
{/block}

{block name="content"}

{* ── Sfondo ── *}
<div class="im-ap-bg-layer">
    <div class="im-ap-blob im-ap-blob-1"></div>
    <div class="im-ap-blob im-ap-blob-2"></div>
    <div class="im-ap-blob im-ap-blob-3"></div>
    <svg class="im-ap-svg" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg"
         fill="none" stroke="#2fd8aa" stroke-width="0.6">
        <g style="transform-origin:170px 250px; animation:im-geo-spin 80s linear infinite;">
            <circle cx="170" cy="250" r="140"/>
            <circle cx="170" cy="250" r="100"/>
            <circle cx="170" cy="250" r="60"/>
            <line x1="170" y1="110" x2="170"   y2="390"/>
            <line x1="170" y1="110" x2="291.2" y2="180"/>
            <line x1="170" y1="110" x2="291.2" y2="320"/>
            <line x1="170" y1="110" x2="48.8"  y2="320"/>
            <line x1="170" y1="110" x2="48.8"  y2="180"/>
        </g>
        <g style="transform-origin:360px 200px; animation:im-geo-spin 120s linear infinite reverse; opacity:.6">
            <circle cx="360" cy="200" r="80"/>
            <circle cx="360" cy="200" r="50"/>
            <circle cx="360" cy="200" r="25"/>
            <line x1="360" y1="120" x2="360"   y2="280"/>
            <line x1="360" y1="120" x2="429.3" y2="160"/>
            <line x1="360" y1="120" x2="429.3" y2="240"/>
            <line x1="360" y1="120" x2="290.7" y2="240"/>
            <line x1="360" y1="120" x2="290.7" y2="160"/>
        </g>
    </svg>
</div>

<div class="im-ap-inner">

    {* ── Header card ── *}
    <div class="im-ap-header-card">
        <div class="im-ap-avatar">{$_sessione.username|substr:0:1|upper}</div>
        <div class="im-ap-header-info">
            <div class="im-ap-eyebrow">Area Personale</div>
            <h1 class="im-ap-name">Bentornato, {$_sessione.username}</h1>
        </div>
        <a href="/visualizza_profilo" class="im-ap-btn-gestisci">Gestisci profilo</a>
    </div>

    {* ── Prenotazioni ── *}
    <div class="im-ap-section-title">Le mie prenotazioni</div>

    {if $appuntamenti|count > 0}
    <div class="im-ap-lista">
        {foreach $appuntamenti as $app}
        {assign var="stato" value=$app->getStato()}
        <div class="im-ap-card" id="apcard-{$app->getId()}">
            <div class="im-ap-card-avatar">{$app->getStudio()->getNome()|substr:0:1|upper}</div>
            <div class="im-ap-card-info">
                <div class="im-ap-card-name">{$app->getStudio()->getNome()}</div>
                <div class="im-ap-card-meta">{$app->getNote()|truncate:60:'…'}</div>
            </div>
            <div class="im-ap-card-date">
                {$app->getData()|date_format:'%d/%m/%Y'}
                <span class="im-ap-card-city">{$app->getStudio()->getPosizione()->value}</span>
            </div>
            <div class="im-ap-card-actions">
                {if $stato === 'IN_ATTESA'}
                    <span class="im-ap-badge im-ap-badge--attesa">In attesa</span>
                {elseif $stato === 'CONFERMATO'}
                    <span class="im-ap-badge im-ap-badge--confermato">Confermato</span>
                {elseif $stato === 'DA_PAGARE'}
                    <span class="im-ap-badge im-ap-badge--pagare">Da pagare</span>
                    <button class="im-ap-btn-pay"
                            onclick="apriPagamento({$app->getId()}, {$app->getCosto()})">
                        Paga €{$app->getCosto()|string_format:"%.2f"}
                    </button>
                {elseif $stato === 'COMPLETATO'}
                    <span class="im-ap-badge im-ap-badge--completato">Completato</span>
                    <span class="im-ap-badge-paid">✓ Pagato</span>
                {elseif $stato === 'ANNULLATO'}
                    <span class="im-ap-badge im-ap-badge--annullato">Annullato</span>
                {/if}
                
            </div>
        </div>
        {/foreach}
    </div>
    {else}
    <div class="im-ap-empty">Nessuna prenotazione trovata.</div>
    {/if}

    {* ── Recensioni ── *}
    <div class="im-ap-section-title" style="margin-top:56px;">Le mie recensioni</div>

    {if $recensioni|count > 0}
    <div class="im-ap-rec-grid">
        {foreach $recensioni as $rec}
        <div class="im-ap-rec-card">
            <div class="im-ap-rec-header">
                <div class="im-ap-rec-avatar">{$rec->getStudio()->getNome()|substr:0:1|upper}</div>
                <div>
                    <div class="im-ap-rec-studio">{$rec->getStudio()->getNome()}</div>
                    <div class="im-ap-rec-date">{$rec->getData()|date_format:'%b %Y'}</div>
                </div>
            </div>
            <div class="im-ap-stars">
                {for $s=1 to 5}
                    {if $s <= $rec->getVoto()}<span class="im-ap-star im-ap-star--on">★</span>{else}<span class="im-ap-star">★</span>{/if}
                {/for}
            </div>
            {if $rec->getTitolo()}<div class="im-ap-rec-title">{$rec->getTitolo()|escape}</div>{/if}
            {if $rec->getDescrizione()}<div class="im-ap-rec-desc">{$rec->getDescrizione()|escape|truncate:120:'…'}</div>{/if}
        </div>
        {/foreach}
    </div>
    {else}
    <div class="im-ap-empty">Nessuna recensione ancora.</div>
    {/if}

</div>

{* ── Overlay pagamento ── *}
<div class="im-pay-overlay" id="im-pay-overlay">
    <div class="im-pay-modal">

        <div id="im-pay-step-form">
            <div class="im-pay-eyebrow">Pagamento sicuro</div>
            <h2 class="im-pay-title">Inserisci i dati della carta</h2>
            <div class="im-pay-amount" id="im-pay-amount-display">€0.00</div>

            <input type="hidden" id="im-pay-app-id" value="">

            <div class="im-pay-field">
                <label>Numero carta</label>
                <input type="text" id="im-pay-numero" class="im-pay-input"
                    placeholder="1234567890123456" maxlength="16"
                    inputmode="numeric" autocomplete="cc-number">
            </div>
            <div class="im-pay-row">
                <div class="im-pay-field">
                    <label>Scadenza (MM/YYYY)</label>
                    <input type="text" id="im-pay-scadenza" class="im-pay-input"
                        placeholder="MM/YYYY" maxlength="7"
                        autocomplete="cc-exp">
                </div>
                <div class="im-pay-field">
                    <label>CVV</label>
                    <input type="text" id="im-pay-cvv" class="im-pay-input"
                        placeholder="123" maxlength="4"
                        inputmode="numeric" autocomplete="cc-csc">
                </div>
            </div>
            <div class="im-pay-field">
                <label>Intestatario</label>
                <input type="text" id="im-pay-intestatario" class="im-pay-input"
                       placeholder="Nome Cognome" autocomplete="cc-name">
            </div>

            <div class="im-pay-error" id="im-pay-error"></div>

            <div class="im-pay-actions">
                <button type="button" class="im-pay-btn-cancel" onclick="chiudiPagamento()">Annulla</button>
                <button type="button" class="im-pay-btn-confirm" id="im-pay-btn-submit" onclick="confermaPagamento()">
                    Paga ora
                </button>
            </div>
        </div>

        <div id="im-pay-step-success" style="display:none; text-align:center;">
            <div class="im-pay-success-icon">✓</div>
            <div class="im-pay-eyebrow" style="margin-top:16px;">Pagamento completato</div>
            <h2 class="im-pay-title">Tutto fatto!</h2>
            <p class="im-pay-success-desc">Il tuo tatuaggio è ora contrassegnato come <strong>Completato</strong>.<br>Grazie per aver scelto InkMaster.</p>
            <button type="button" class="im-pay-btn-confirm" style="margin-top:28px;" onclick="chiudiSuccesso()">Torna alle prenotazioni</button>
        </div>

    </div>
</div>

<script>
var _payAppId = 0;

function apriPagamento(id, costo) {
    _payAppId = id;
    document.getElementById('im-pay-app-id').value = id;
    document.getElementById('im-pay-amount-display').textContent = '\u20ac' + parseFloat(costo).toFixed(2);
    document.getElementById('im-pay-step-form').style.display = '';
    document.getElementById('im-pay-step-success').style.display = 'none';
    document.getElementById('im-pay-error').textContent = '';
    document.getElementById('im-pay-numero').value = '';
    document.getElementById('im-pay-scadenza').value = '';
    document.getElementById('im-pay-cvv').value = '';
    document.getElementById('im-pay-intestatario').value = '';
    document.getElementById('im-pay-overlay').classList.add('aperta');
}

function chiudiPagamento() {
    document.getElementById('im-pay-overlay').classList.remove('aperta');
}

function confermaPagamento() {
    var numero       = document.getElementById('im-pay-numero').value.trim();
    var scadenza     = document.getElementById('im-pay-scadenza').value.trim();
    var cvv          = document.getElementById('im-pay-cvv').value.trim();
    var intestatario = document.getElementById('im-pay-intestatario').value.trim();
    var errEl        = document.getElementById('im-pay-error');

        if (!numero || !scadenza || !cvv || !intestatario) { errEl.textContent = 'Compila tutti i campi.'; return; }
        errEl.textContent = '';

    var btn = document.getElementById('im-pay-btn-submit');
    btn.textContent = 'Elaborazione\u2026';
    btn.disabled = true;

    var fd = new FormData();
    fd.append('id_appuntamento', _payAppId);
    fd.append('numero', numero);
    fd.append('scadenza', scadenza);
    fd.append('cvv', cvv);
    fd.append('intestatario', intestatario);

    fetch('/inserisci_dati_pagamento', { method: 'POST', body: fd })
        .then(function(r){
            if (!r.ok) return r.text().then(function(t){ throw new Error(t); });
            return r.json();
        })
        .then(function(data){
            btn.textContent = 'Paga ora';
            btn.disabled = false;
            if (data.status === 'success') {
                var card = document.getElementById('apcard-' + _payAppId);
                if (card) {
                    var actions = card.querySelector('.im-ap-card-actions');
                    if (actions) {
                        actions.innerHTML =
                            '<span class="im-ap-badge im-ap-badge--completato">Completato</span>' +
                            '<span class="im-ap-badge-paid">\u2713 Pagato</span>' +
                            '<a href="#" class="im-ap-chat-link">\uD83D\uDCAC Chat</a>';
                    }
                }
                document.getElementById('im-pay-step-form').style.display = 'none';
                document.getElementById('im-pay-step-success').style.display = '';
            } else {
                errEl.textContent = data.message || 'Errore durante il pagamento.';
            }
        })
        .catch(function(e){
            btn.textContent = 'Paga ora';
            btn.disabled = false;
            errEl.textContent = 'Errore server. Controlla i log PHP.';
            console.error(e);
        });
}

function chiudiSuccesso() { chiudiPagamento(); }

document.getElementById('im-pay-overlay').addEventListener('click', function(e){
    if (e.target === this) chiudiPagamento();
});
</script>

{/block}