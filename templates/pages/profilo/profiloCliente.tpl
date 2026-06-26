{extends file='layouts/base.tpl'}

{block name="title"}Il mio profilo — InkMaster{/block}

{block name="extra_css"}
<link rel="stylesheet" href="/CSS/auth.css">
<style>
.pr-wrap { width: 100%; max-width: 700px; padding-top: 16px; }
.pr-header { text-align: center; margin-bottom: 36px; }
.pr-avatar {
    width: 80px; height: 80px; border-radius: 50%;
    background: #2fd8aa; color: #0a0c0d;
    font-size: 28px; font-weight: 900;
    display: inline-flex; align-items: center; justify-content: center;
    margin-bottom: 14px;
}
.pr-badge {
    display: inline-block; font-size: 10px; font-weight: 800; letter-spacing: .18em;
    text-transform: uppercase; color: #2fd8aa;
    background: rgba(47,216,170,.1); border: 1px solid rgba(47,216,170,.25);
    padding: 4px 12px; border-radius: 999px; margin-bottom: 10px;
}
.pr-name { font-size: 1.6rem; font-weight: 900; letter-spacing: -.02em; }
.pr-card {
    background: rgba(8,10,12,0.94);
    border: 1px solid rgba(255,255,255,.13);
    border-radius: 16px; padding: 32px; margin-bottom: 20px;
    box-shadow: 0 8px 32px rgba(0,0,0,.55);
}
.pr-section-label {
    font-size: 10px; font-weight: 800; letter-spacing: .16em; text-transform: uppercase;
    color: #2fd8aa; margin-bottom: 22px; text-align: center;
}
.pr-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
.pr-full { grid-column: 1 / -1; }
.pr-group { display: flex; flex-direction: column; gap: 7px; }
.pr-label { font-size: 12px; font-weight: 600; color: #9aa3a0; }
.pr-input {
    background: #0e1215; border: 1px solid #1e2529; color: #eef1f0;
    font-family: inherit; font-size: 15px; padding: 12px 14px;
    border-radius: 8px; outline: none; width: 100%; box-sizing: border-box;
    transition: border-color .18s;
}
.pr-input:focus { border-color: #2fd8aa; }
.pr-input[readonly] { color: #6b736f; cursor: not-allowed; }
.pr-textarea { resize: vertical; min-height: 90px; }
.pr-select { appearance: none; cursor: pointer; }
.pr-pwd-wrap { position: relative; }
.pr-pwd-wrap .pr-input { padding-right: 46px; }
.pr-eye {
    position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
    background: none; border: none; cursor: pointer; font-size: 18px;
    padding: 0; line-height: 1; user-select: none;
}
.pr-btn {
    width: 100%; padding: 14px; margin-top: 24px;
    background: #2fd8aa; color: #0a0c0d; border: none;
    border-radius: 8px; font-size: 15px; font-weight: 700;
    cursor: pointer; font-family: inherit; transition: background .18s;
}
.pr-btn:hover { background: #37eec0; }
.pr-btn-outline {
    width: 100%; padding: 12px; margin-top: 12px;
    background: transparent; color: #cdd3d1;
    border: 1px solid rgba(255,255,255,.18); border-radius: 8px;
    font-size: 14px; font-weight: 700; cursor: pointer; font-family: inherit;
    text-align: center; display: block; transition: border-color .18s, color .18s;
    text-decoration: none;
}
.pr-btn-outline:hover { border-color: rgba(47,216,170,.5); color: #2fd8aa; }
.pr-team-list { display: flex; flex-direction: column; gap: 10px; margin-bottom: 16px; }
.pr-member {
    display: flex; align-items: center; gap: 12px;
    background: #0e1215; border-radius: 10px; padding: 12px 14px;
}
.pr-member-av {
    width: 38px; height: 38px; border-radius: 50%; flex-shrink: 0;
    background: rgba(47,216,170,.15); border: 1px solid rgba(47,216,170,.3);
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; font-weight: 800; color: #2fd8aa;
}
.pr-member-name { font-size: 14px; font-weight: 700; }
.pr-member-tags { font-size: 11px; color: #6b736f; margin-top: 2px; }
.pr-feedback {
    font-size: 13px; font-weight: 600; padding: 10px 14px;
    border-radius: 8px; margin-top: 14px; display: none;
}
.pr-feedback.ok  { background: rgba(47,216,170,.12); color: #2fd8aa; }
.pr-feedback.err { background: rgba(255,80,80,.10);  color: #f87171; }
@media (max-width: 580px) { .pr-grid { grid-template-columns: 1fr; } }
</style>
{/block}

{block name="content"}
<div class="im-auth-wrapper im-studio-theme" style="align-items:flex-start;padding-top:48px;padding-bottom:80px;">
<div class="pr-wrap">

{if $status === 'error'}
  <div class="pr-card" style="text-align:center;color:#f87171;">{$message|escape}</div>
{else}

  {* ── HEADER ── *}
  <div class="pr-header">
    <div class="pr-avatar">{$data.nome|substr:0:1|upper}</div>
    <div><div class="pr-badge">{$data.ruolo|upper|escape}</div></div>
    <div class="pr-name">{$data.nome|escape}</div>
  </div>

  {* ══════════════ STUDIO ══════════════ *}
  {if $data.ruolo === 'studio'}

  <div class="pr-card">
    <div class="pr-section-label">Dati studio</div>
    <div class="pr-grid">
      <div class="pr-group">
        <label class="pr-label">Nome studio</label>
        <input class="pr-input" type="text" id="pr-nome" value="{$data.nome|escape}">
      </div>
      <div class="pr-group">
        <label class="pr-label">Username</label>
        <input class="pr-input" type="text" id="pr-username" value="{$data.username|escape}">
      </div>
      <div class="pr-group">
        <label class="pr-label">Email</label>
        <input class="pr-input" type="email" id="pr-email" value="{$data.email|default:''|escape}">
      </div>
      <div class="pr-group">
        <label class="pr-label">Telefono</label>
        <input class="pr-input" type="tel" id="pr-telefono" value="{$data.telefono|default:''|escape}" placeholder="es. +39 333 1234567">
      </div>
      <div class="pr-group">
        <label class="pr-label">Città</label>
        <select class="pr-input pr-select" id="pr-posizione">
          {foreach ['Milano','Roma','Napoli','Torino','Palermo','Genova','Bologna','Firenze','Bari','Catania','Venezia','Pescara','Avezzano','Popoli','Catanzaro'] as $citta}
            <option value="{$citta}" {if $data.posizione === $citta}selected{/if}>{$citta}</option>
          {/foreach}
        </select>
      </div>
      <div class="pr-group">
        <label class="pr-label">Partita IVA</label>
        <input class="pr-input" type="text" value="{$data.partita_iva|default:''|escape}" readonly title="Non modificabile">
      </div>
      <div class="pr-group pr-full">
        <label class="pr-label">Descrizione</label>
        <textarea class="pr-input pr-textarea" id="pr-descrizione">{$data.descrizione|default:''|escape}</textarea>
      </div>
    </div>
    <button class="pr-btn" id="pr-btn-dati">Salva modifiche</button>
    <div class="pr-feedback" id="pr-feedback-dati"></div>
  </div>

  <div class="pr-card">
    <div class="pr-section-label">Membri del team</div>
    {if $data.tatuatori && $data.tatuatori|count > 0}
      <div class="pr-team-list">
        {foreach $data.tatuatori as $tat}
        <div class="pr-member">
          <div class="pr-member-av">{$tat->getNome()|substr:0:1|upper}{$tat->getCognome()|substr:0:1|upper}</div>
          <div>
            <div class="pr-member-name">{$tat->getNome()|escape} {$tat->getCognome()|escape}</div>
            <div class="pr-member-tags">{foreach $tat->getStili() as $st}{$st->getNome()|escape}{if !$st@last} · {/if}{/foreach}</div>
          </div>
        </div>
        {/foreach}
      </div>
    {else}
      <p style="color:#6b736f;font-size:14px;margin-bottom:16px;">Nessun membro nel team ancora.</p>
    {/if}
    <a href="/gestisci_team" class="pr-btn-outline">✏ Modifica membri team</a>
  </div>

  {* ══════════════ CLIENTE ══════════════ *}
  {elseif $data.ruolo === 'cliente'}

  <div class="pr-card">
    <div class="pr-section-label">Dati personali</div>
    <div class="pr-grid">
      <div class="pr-group">
        <label class="pr-label">Nome</label>
        <input class="pr-input" type="text" id="pr-nome" value="{$data.nome|escape}">
      </div>
      <div class="pr-group">
        <label class="pr-label">Cognome</label>
        <input class="pr-input" type="text" id="pr-cognome" value="{$data.cognome|default:''|escape}">
      </div>
      <div class="pr-group">
        <label class="pr-label">Username</label>
        <input class="pr-input" type="text" id="pr-username" value="{$data.username|escape}">
      </div>
    </div>
    <button class="pr-btn" id="pr-btn-dati">Salva modifiche</button>
    <div class="pr-feedback" id="pr-feedback-dati"></div>
  </div>

  {* ══════════════ AMMINISTRATORE ══════════════ *}
  {elseif $data.ruolo === 'amministratore'}

  <div class="pr-card">
    <div class="pr-section-label">Dati account</div>
    <div class="pr-grid">
      <div class="pr-group">
        <label class="pr-label">Nome</label>
        <input class="pr-input" type="text" id="pr-nome" value="{$data.nome|escape}">
      </div>
      <div class="pr-group">
        <label class="pr-label">Cognome</label>
        <input class="pr-input" type="text" id="pr-cognome" value="{$data.cognome|default:''|escape}">
      </div>
      <div class="pr-group">
        <label class="pr-label">Username</label>
        <input class="pr-input" type="text" id="pr-username" value="{$data.username|escape}">
      </div>
    </div>
    <button class="pr-btn" id="pr-btn-dati">Salva modifiche</button>
    <div class="pr-feedback" id="pr-feedback-dati"></div>
  </div>

  {/if}

  {* ══════════════ SICUREZZA (tutti) ══════════════ *}
  <div class="pr-card">
    <div class="pr-section-label">Sicurezza</div>
    <div class="pr-grid">
      <div class="pr-group">
        <label class="pr-label">Password attuale</label>
        <div class="pr-pwd-wrap">
          <input class="pr-input" type="password" id="pr-pwd-old" autocomplete="current-password">
          <button type="button" class="pr-eye" data-target="pr-pwd-old">👁</button>
        </div>
      </div>
      <div class="pr-group">
        <label class="pr-label">Nuova password</label>
        <div class="pr-pwd-wrap">
          <input class="pr-input" type="password" id="pr-pwd-new" autocomplete="new-password">
          <button type="button" class="pr-eye" data-target="pr-pwd-new">👁</button>
        </div>
      </div>
    </div>
    <button class="pr-btn" id="pr-btn-pwd" style="margin-top:20px;">Aggiorna password</button>
    <div class="pr-feedback" id="pr-feedback-pwd"></div>
  </div>

{/if}
</div>
</div>

<script>
(function () {
  /* ── toggle occhio/scimmietta ── */
  document.querySelectorAll('.pr-eye').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var inp = document.getElementById(btn.dataset.target);
      if (inp.type === 'password') {
        inp.type = 'text';
        btn.textContent = '🙈';
      } else {
        inp.type = 'password';
        btn.textContent = '👁';
      }
    });
  });

  function showFeedback(el, ok, msg) {
    el.className = 'pr-feedback ' + (ok ? 'ok' : 'err');
    el.textContent = msg;
    el.style.display = 'block';
    setTimeout(function () { el.style.display = 'none'; }, 4000);
  }
  function postJSON(url, body, cb) {
    var fd = new FormData();
    Object.keys(body).forEach(function (k) { fd.append(k, body[k] || ''); });
    fetch(url, { method: 'POST', body: fd })
      .then(function (r) { return r.json(); })
      .then(cb)
      .catch(function () { cb({ status: 'error', message: 'Errore di rete.' }); });
  }

  /* ── salva dati ── */
  var btnDati = document.getElementById('pr-btn-dati');
  if (btnDati) {
    btnDati.addEventListener('click', function () {
      postJSON('/modifica_dati', {
        nome:        (document.getElementById('pr-nome')        || {}).value || '',
        cognome:     (document.getElementById('pr-cognome')     || {}).value || '',
        username:    (document.getElementById('pr-username')    || {}).value || '',
        email:       (document.getElementById('pr-email')       || {}).value || '',
        telefono:    (document.getElementById('pr-telefono')    || {}).value || '',
        posizione:   (document.getElementById('pr-posizione')   || {}).value || '',
        descrizione: (document.getElementById('pr-descrizione') || {}).value || '',
      }, function (r) {
        showFeedback(document.getElementById('pr-feedback-dati'), r.status === 'success', r.message);
      });
    });
  }

  /* ── cambia password ── */
  var btnPwd = document.getElementById('pr-btn-pwd');
  if (btnPwd) {
    btnPwd.addEventListener('click', function () {
      postJSON('/cambia_password', {
        vecchia_password: document.getElementById('pr-pwd-old').value,
        nuova_password:   document.getElementById('pr-pwd-new').value,
      }, function (r) {
        showFeedback(document.getElementById('pr-feedback-pwd'), r.status === 'success', r.message);
        if (r.status === 'success') {
          document.getElementById('pr-pwd-old').value = '';
          document.getElementById('pr-pwd-new').value = '';
          /* ripristina occhi */
          document.querySelectorAll('.pr-eye').forEach(function (b) {
            document.getElementById(b.dataset.target).type = 'password';
            b.textContent = '👁';
          });
        }
      });
    });
  }
})();
</script>
{/block}