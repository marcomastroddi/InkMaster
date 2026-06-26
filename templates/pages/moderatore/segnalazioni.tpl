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
                                {* ── APERTE prima ── *}
                {foreach $data as $seg}
                    {if $seg->getStato() != 'APERTA'}{continue}{/if}
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
                        <td><span class="adm-badge adm-badge--red">Aperta</span></td>
                        <td class="adm-date">{$seg->getData()->format('d M Y')}</td>
                        <td>
                            <button type="button" class="adm-btn-ban"
                            data-id="{$utente->getId()}"
                            data-tipo="{$tipo}"
                            data-nome="{$nomeUtente|escape}"
                            data-email="{$utente->getEmail()|escape}"
                            data-iniziali="{$iniziali|upper}">Banna</button>
                        </td>
                    </tr>
                {/foreach}

                {* ── separatore ── *}
                <tr class="adm-table-sep-row">
                    <td colspan="5"><span class="adm-table-sep-label">Già gestite</span></td>
                </tr>

                {* ── CHIUSE dopo ── *}
                {foreach $data as $seg}
                    {if $seg->getStato() == 'APERTA'}{continue}{/if}
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
                    <tr class="adm-row-chiusa">
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
                        <td><span class="adm-badge adm-badge--muted">Chiusa</span></td>
                        <td class="adm-date">{$seg->getData()->format('d M Y')}</td>
                        <td class="adm-actions-cell">
                            <a href="/seleziona_utente?id={$utente->getId()}&tipo={$tipo}" class="adm-btn-info">Info</a>
                            <a href="#" class="adm-btn-sban">Sbanna</a>
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

{* ── MODAL BANNA ── *}
<div class="adm-overlay" id="banModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h2 class="adm-modal-title">Banna utente</h2>
            <button class="adm-modal-close" id="closeBan">✕</button>
        </div>

        <div class="adm-modal-user">
            <div class="adm-user-av adm-user-av--cliente" id="banAvatar"></div>
            <div>
                <div class="adm-user-name" id="banNome"></div>
                <div class="adm-user-email" id="banEmail"></div>
            </div>
        </div>

        <form id="banForm" method="POST" action="/conferma_ban">

            <div class="adm-modal-field">
                <label class="adm-modal-label">TIPO DI BAN</label>
                <div class="adm-radio-group">
                    <label class="adm-radio-opt" id="optTemp">
                        <input type="radio" name="tipo" value="temporaneo" checked> Temporaneo
                    </label>
                    <label class="adm-radio-opt" id="optPerm">
                        <input type="radio" name="tipo" value="permanente"> Permanente
                    </label>
                </div>
            </div>

            <div class="adm-modal-field" id="durataField">
                <label class="adm-modal-label">DURATA</label>
                <div class="adm-durata-row">
                    <input type="number" id="banGiorni" value="7" min="1" max="365" class="adm-input-num">
                    <span class="adm-durata-unit">Giorni</span>
                </div>
                <div class="adm-durata-scade" id="scadeInfo"></div>
                <input type="hidden" name="durata" id="durataHidden" value="7 giorni">
            </div>

            <div class="adm-modal-field">
                <label class="adm-modal-label">CATEGORIA MOTIVAZIONE</label>
                <select name="motivazione" class="adm-select" required>
                    <option value="">— Seleziona una categoria —</option>
                    <option value="Spam">Spam</option>
                    <option value="Contenuto inappropriato">Contenuto inappropriato</option>
                    <option value="Comportamento offensivo">Comportamento offensivo</option>
                    <option value="Frode">Frode</option>
                    <option value="Violazione termini">Violazione termini</option>
                </select>
            </div>

            <div class="adm-modal-field">
                <label class="adm-modal-label">GRAVITÀ</label>
                <div class="adm-gravita-group">
                    <button type="button" class="adm-grav-btn" data-val="bassa">Bassa</button>
                    <button type="button" class="adm-grav-btn" data-val="media">Media</button>
                    <button type="button" class="adm-grav-btn adm-grav-btn--sel" data-val="alta">Alta</button>
                    <button type="button" class="adm-grav-btn" data-val="critica">Critica</button>
                </div>
                <input type="hidden" name="gravita" id="gravitaInput" value="alta">
            </div>

            <div class="adm-modal-field">
                <label class="adm-modal-label">DESCRIZIONE MOTIVAZIONE</label>
                <textarea name="descrizione" class="adm-textarea" rows="3" placeholder="Descrici il motivo del ban in dettaglio..."></textarea>
            </div>

            <div class="adm-modal-field">
                <label class="adm-modal-label">AZIONI AGGIUNTIVE</label>
                <label class="adm-check-opt"><input type="checkbox" name="nascondi_contenuti" value="1"> Nascondi contenuti esistenti</label>
            </div>

            <div class="adm-modal-footer">
                <button type="button" class="adm-btn-annulla" id="closeBan2">Annulla</button>
                <button type="submit" class="adm-btn-conferma">✓ Conferma ban</button>
            </div>
        </form>
    </div>
</div>

<script>
{literal}
const modal   = document.getElementById('banModal');
const form    = document.getElementById('banForm');
const giorni  = document.getElementById('banGiorni');
const durHid  = document.getElementById('durataHidden');
const scadeEl = document.getElementById('scadeInfo');
const durField= document.getElementById('durataField');

function updateScade() {
    const g = parseInt(giorni.value) || 1;
    durHid.value = g + ' giorni';
    const d = new Date(); d.setDate(d.getDate() + g);
    scadeEl.textContent = 'Scade il ' + d.toLocaleDateString('it-IT', {day:'numeric', month:'long', year:'numeric'});
}
updateScade();
giorni.addEventListener('input', updateScade);

document.querySelectorAll('input[name="tipo"]').forEach(r => {
    r.addEventListener('change', () => {
        const perm = r.value === 'permanente';
        durField.style.display = perm ? 'none' : '';
        if (perm) durHid.value = 'permanente';
        else updateScade();
    });
});

document.querySelectorAll('.adm-grav-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.adm-grav-btn').forEach(b => b.classList.remove('adm-grav-btn--sel'));
        btn.classList.add('adm-grav-btn--sel');
        document.getElementById('gravitaInput').value = btn.dataset.val;
    });
});

document.querySelectorAll('.adm-btn-ban').forEach(btn => {
    btn.addEventListener('click', function() {
        document.getElementById('banAvatar').textContent  = this.dataset.iniziali;
        document.getElementById('banNome').textContent    = this.dataset.nome;
        document.getElementById('banEmail').textContent   = this.dataset.email;
        fetch('/seleziona_utente?id=' + this.dataset.id + '&tipo=' + this.dataset.tipo);
        modal.classList.add('adm-overlay--open');
    });
});

[document.getElementById('closeBan'), document.getElementById('closeBan2')].forEach(el => {
    el.addEventListener('click', () => modal.classList.remove('adm-overlay--open'));
});
modal.addEventListener('click', e => { if (e.target === modal) modal.classList.remove('adm-overlay--open'); });
{/literal}
</script>
{/block}