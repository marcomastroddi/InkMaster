{extends file='layouts/base.tpl'}

{block name="title"}Richieste — InkMaster Studio{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/AccettazioneClienti.css">
{/block}

{block name="content"}
<div class="im-page im-richieste-page">

    {* ── Sfondo blob + disegno ── *}
    <div class="im-hero-bg">
        <div class="im-blob im-blob-1"></div>
        <div class="im-blob im-blob-2"></div>
        <div class="im-blob im-blob-3"></div>
    </div>

    {* ── Disegno decorativo: check e X stilizzati ── *}
    <svg class="im-richieste-deco" viewBox="0 0 600 500" xmlns="http://www.w3.org/2000/svg" fill="none">
        {* Cerchio check *}
        <circle cx="150" cy="200" r="90" stroke="#2fd8aa" stroke-width="1.5" opacity="0.12"/>
        <circle cx="150" cy="200" r="60" stroke="#2fd8aa" stroke-width="1" opacity="0.08"/>
        <polyline points="112,200 138,226 192,170" stroke="#2fd8aa" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round" opacity="0.2"/>

        {* Cerchio X *}
        <circle cx="420" cy="280" r="80" stroke="#2fd8aa" stroke-width="1.5" opacity="0.08"/>
        <circle cx="420" cy="280" r="52" stroke="#2fd8aa" stroke-width="1" opacity="0.06"/>
        <line x1="392" y1="252" x2="448" y2="308" stroke="#2fd8aa" stroke-width="2"
              stroke-linecap="round" opacity="0.14"/>
        <line x1="448" y1="252" x2="392" y2="308" stroke="#2fd8aa" stroke-width="2"
              stroke-linecap="round" opacity="0.14"/>

        {* Linee connettore tra i due *}
        <path d="M240,200 Q300,160 340,280" stroke="#2fd8aa" stroke-width="1"
              opacity="0.08" stroke-dasharray="6 4"/>

        {* Documento stilizzato in basso *}
        <rect x="240" y="340" width="120" height="150" rx="10"
              stroke="#2fd8aa" stroke-width="1.2" opacity="0.1"/>
        <line x1="260" y1="375" x2="340" y2="375" stroke="#2fd8aa" stroke-width="1" opacity="0.1"/>
        <line x1="260" y1="400" x2="340" y2="400" stroke="#2fd8aa" stroke-width="1" opacity="0.08"/>
        <line x1="260" y1="425" x2="310" y2="425" stroke="#2fd8aa" stroke-width="1" opacity="0.08"/>
        {* Firma *}
        <path d="M260,455 C 275,440 285,465 300,450 S 320,438 335,452"
              stroke="#2fd8aa" stroke-width="1.5" stroke-linecap="round" opacity="0.15"/>
    </svg>

    {* ── Contenuto ── *}
    <div class="im-richieste-content">
        <div class="im-dash-eyebrow">Dashboard Studio</div>
        <h1 class="im-dash-title">Richieste di appuntamento</h1>

        {if empty($data)}
            <p class="im-nessuna">Nessuna richiesta in attesa.</p>
        {else}
            <div class="im-richieste-lista">
                {foreach $data as $app}
                    {if $app->getStato() === 'in_attesa'}
                    <div class="im-richiesta-card" id="card-{$app->getId()}">

                        <div class="im-richiesta-avatar">
                            {$app->getCliente()->getNome()|substr:0:1|upper}{$app->getCliente()->getCognome()|substr:0:1|upper}
                        </div>

                        <div class="im-richiesta-cliente">
                            <div class="im-richiesta-nome">{$app->getCliente()->getNome()} {$app->getCliente()->getCognome()}</div>
                            <div class="im-richiesta-username">@{$app->getCliente()->getUsername()}</div>
                        </div>

                        <div class="im-richiesta-campo">
                            <div class="im-richiesta-label">Giorno richiesta</div>
                            <div class="im-richiesta-valore">{$app->getData()->format('d/m/Y')}</div>
                        </div>

                        <div class="im-richiesta-campo">
                            <div class="im-richiesta-label">Orario</div>
                            <div class="im-richiesta-valore">{$app->getOraInizio()->format('H:i')} – {$app->getOraFine()->format('H:i')}</div>
                        </div>

                        <div class="im-richiesta-campo im-richiesta-idea">
                            <div class="im-richiesta-label">Idea proposta</div>
                            <div class="im-richiesta-valore">{$app->getNote()|default:'—'|escape}</div>
                        </div>

                        <div class="im-richiesta-azioni">
                            <button class="im-btn-accetta" onclick="gestisciRichiesta({$app->getId()}, 'accetta')">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                Accetta
                            </button>
                            <button class="im-btn-rifiuta" onclick="gestisciRichiesta({$app->getId()}, 'rifiuta')">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                Rifiuta
                            </button>
                        </div>

                    </div>
                    {/if}
                {/foreach}
            </div>
        {/if}

        <a href="/dashboardStudio" class="im-btn-back">← Torna alla dashboard</a>
    </div>
</div>

<script>
function gestisciRichiesta(id, azione) {
    var url = azione === 'accetta' ? '/accetta_richiesta' : '/rifiuta_richiesta';
    fetch(url + '?id=' + id)
        .then(function(r) { return r.json(); })
        .then(function(d) {
            if (d.status === 'success') {
                var card = document.getElementById('card-' + id);
                card.classList.add('im-richiesta-rimossa');
                setTimeout(function() { card.remove(); }, 400);
            } else {
                alert(d.message ?? 'Errore durante l\'operazione.');
            }
        })
        .catch(function() { alert('Errore di rete.'); });
}
</script>
{/block}