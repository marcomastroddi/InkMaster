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
            <div class="adm-topbar-avatar">{$smarty.session.username|default:'A'|substr:0:1|upper}</div>
            <span class="adm-topbar-uname">{$smarty.session.username|default:'Admin'|escape}</span>
            <a href="/logout" class="adm-topbar-logout">Esci</a>
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
                            data-iniziali="{$iniziali|upper}"
                            data-seg-id="{$seg->getId()}">Banna</button>
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
                            <button type="button" class="adm-btn-info"
                                data-motivo="{$seg->getMotivo()|escape}"
                                data-desc="{$seg->getDescrizione()|default:''|escape}"
                                data-data="{$seg->getData()->format('d M Y')}"
                                data-nome="{$nomeUtente|escape}"
                                data-iniziali="{$iniziali|upper}"
                                data-tipo="{$tipo}">Info</button>
                            <button type="button" class="adm-btn-sban"
                                data-id="{$utente->getId()}"
                                data-tipo="{$tipo}"
                                data-nome="{$nomeUtente|escape}"
                                data-iniziali="{$iniziali|upper}">Sbanna</button>
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
            <input type="hidden" name="seg_id" id="banSegId">

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

            <div class="adm-modal-footer">
                <button type="button" class="adm-btn-annulla" id="closeBan2">Annulla</button>
                <button type="button" class="adm-btn-scarta" id="btnScarta">✕ Scarta</button>
                <button type="submit" class="adm-btn-conferma">✓ Conferma ban</button>
            </div>
        </form>
    </div>
</div>

<form id="scartaForm" method="POST" action="/scarta_segnalazione" style="display:none">
    <input type="hidden" name="seg_id" id="scartaSegId">
</form>

{* ── MODAL INFO ── *}
<div class="adm-overlay" id="infoModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h2 class="adm-modal-title">Dettagli segnalazione</h2>
            <button class="adm-modal-close" id="closeInfo">✕</button>
        </div>

        <div class="adm-modal-user">
            <div class="adm-user-av" id="infoAvatar"></div>
            <div>
                <div class="adm-user-name" id="infoNome"></div>
                <div class="adm-user-email" id="infoTipo"></div>
            </div>
        </div>

        <div class="adm-modal-field">
            <label class="adm-modal-label">MOTIVO SEGNALAZIONE</label>
            <div id="infoMotivo" style="font-size:13px;color:#eef1f0;background:rgba(255,255,255,.05);border-radius:8px;padding:10px 14px;"></div>
        </div>

        <div class="adm-modal-field" id="infoDescField">
            <label class="adm-modal-label">DESCRIZIONE</label>
            <div id="infoDesc" style="font-size:13px;color:#9aa3a0;background:rgba(255,255,255,.04);border-radius:8px;padding:10px 14px;"></div>
        </div>

        <div class="adm-modal-field">
            <label class="adm-modal-label">DATA SEGNALAZIONE</label>
            <div id="infoData" style="font-size:13px;color:#6b736f;font-family:ui-monospace,monospace;"></div>
        </div>

        <div class="adm-modal-footer">
            <button type="button" class="adm-btn-annulla" style="flex:1" id="closeInfo2">Chiudi</button>
        </div>
    </div>
</div>

{* ── MODAL SBANNA ── *}
<div class="adm-overlay" id="sbanModal">
    <div class="adm-modal" style="max-width:400px">
        <div class="adm-modal-header">
            <h2 class="adm-modal-title">Rimuovi ban</h2>
            <button class="adm-modal-close" id="closeSban">✕</button>
        </div>

        <div class="adm-modal-user">
            <div class="adm-user-av" id="sbanAvatar"></div>
            <div>
                <div class="adm-user-name" id="sbanNome"></div>
            </div>
        </div>

        <p style="font-size:14px;color:#9aa3a0;margin:0 0 4px;">
            Sei sicuro di voler rimuovere il ban per questo utente?<br>
            <span style="font-size:12px;color:#4b534f;">L'utente potrà accedere nuovamente alla piattaforma.</span>
        </p>

        <form id="sbanForm" method="POST" action="/rimuovi_ban">
            <input type="hidden" name="id" id="sbanId">
            <input type="hidden" name="tipo" id="sbanTipo">
            <div class="adm-modal-footer">
                <button type="button" class="adm-btn-annulla" id="closeSban2">Annulla</button>
                <button type="submit" class="adm-btn-conferma">✓ Conferma sbanna</button>
            </div>
        </form>
    </div>
</div>

<script>
{literal}
const modal = document.getElementById('banModal');

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
        document.getElementById('banSegId').value         = this.dataset.segId;
        fetch('/seleziona_utente?id=' + this.dataset.id + '&tipo=' + this.dataset.tipo);
        modal.classList.add('adm-overlay--open');
    });
});

document.getElementById('btnScarta').addEventListener('click', () => {
    document.getElementById('scartaSegId').value = document.getElementById('banSegId').value;
    modal.classList.remove('adm-overlay--open');
    document.getElementById('scartaForm').submit();
});

[document.getElementById('closeBan'), document.getElementById('closeBan2')].forEach(el => {
    el.addEventListener('click', () => modal.classList.remove('adm-overlay--open'));
});
modal.addEventListener('click', e => { if (e.target === modal) modal.classList.remove('adm-overlay--open'); });

const infoModal = document.getElementById('infoModal');
document.querySelectorAll('.adm-btn-info').forEach(btn => {
    btn.addEventListener('click', function() {
        const av = document.getElementById('infoAvatar');
        av.textContent = this.dataset.iniziali;
        av.className = 'adm-user-av adm-user-av--' + this.dataset.tipo;
        document.getElementById('infoNome').textContent   = this.dataset.nome;
        document.getElementById('infoTipo').textContent   = this.dataset.tipo === 'studio' ? 'Studio' : 'Cliente';
        document.getElementById('infoMotivo').textContent = this.dataset.motivo;
        document.getElementById('infoData').textContent   = this.dataset.data;
        const desc = this.dataset.desc;
        const descField = document.getElementById('infoDescField');
        if (desc) { document.getElementById('infoDesc').textContent = desc; descField.style.display = ''; }
        else { descField.style.display = 'none'; }
        infoModal.classList.add('adm-overlay--open');
    });
});
[document.getElementById('closeInfo'), document.getElementById('closeInfo2')].forEach(el => {
    el.addEventListener('click', () => infoModal.classList.remove('adm-overlay--open'));
});
infoModal.addEventListener('click', e => { if (e.target === infoModal) infoModal.classList.remove('adm-overlay--open'); });

const sbanModal = document.getElementById('sbanModal');
document.querySelectorAll('.adm-btn-sban').forEach(btn => {
    btn.addEventListener('click', function() {
        const av = document.getElementById('sbanAvatar');
        av.textContent = this.dataset.iniziali;
        av.className = 'adm-user-av adm-user-av--' + this.dataset.tipo;
        document.getElementById('sbanNome').textContent = this.dataset.nome;
        document.getElementById('sbanId').value         = this.dataset.id;
        document.getElementById('sbanTipo').value       = this.dataset.tipo;
        sbanModal.classList.add('adm-overlay--open');
    });
});
[document.getElementById('closeSban'), document.getElementById('closeSban2')].forEach(el => {
    el.addEventListener('click', () => sbanModal.classList.remove('adm-overlay--open'));
});
sbanModal.addEventListener('click', e => { if (e.target === sbanModal) sbanModal.classList.remove('adm-overlay--open'); });
{/literal}
</script>
{/block}