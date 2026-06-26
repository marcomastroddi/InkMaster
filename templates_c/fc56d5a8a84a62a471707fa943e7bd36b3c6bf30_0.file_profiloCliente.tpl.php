<?php
/* Smarty version 5.8.0, created on 2026-06-26 20:54:42
  from 'file:pages/profilo/profiloCliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3ee71208cbf0_46819732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc56d5a8a84a62a471707fa943e7bd36b3c6bf30' => 
    array (
      0 => 'pages/profilo/profiloCliente.tpl',
      1 => 1782507274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3ee71208cbf0_46819732 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\profilo';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7300417216a3ee712016f08_42574042', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12368191016a3ee71201d9a1_71131444', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13719038536a3ee712022d39_84536292', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_7300417216a3ee712016f08_42574042 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\profilo';
?>
Il mio profilo — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_12368191016a3ee71201d9a1_71131444 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\profilo';
?>

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
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_13719038536a3ee712022d39_84536292 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\profilo';
?>

<div class="im-auth-wrapper im-studio-theme" style="align-items:flex-start;padding-top:48px;padding-bottom:80px;">
<div class="pr-wrap">

<?php if ($_smarty_tpl->getValue('status') === 'error') {?>
  <div class="pr-card" style="text-align:center;color:#f87171;"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('message'), ENT_QUOTES, 'UTF-8', true);?>
</div>
<?php } else { ?>

    <div class="pr-header">
    <div class="pr-avatar"><?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('data')['nome'], (int) 0, (int) 1) ?? '', 'UTF-8');?>
</div>
    <div><div class="pr-badge"><?php echo htmlspecialchars((string)mb_strtoupper((string) $_smarty_tpl->getValue('data')['ruolo'] ?? '', 'UTF-8'), ENT_QUOTES, 'UTF-8', true);?>
</div></div>
    <div class="pr-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['nome'], ENT_QUOTES, 'UTF-8', true);?>
</div>
  </div>

    <?php if ($_smarty_tpl->getValue('data')['ruolo'] === 'studio') {?>

  <div class="pr-card">
    <div class="pr-section-label">Dati studio</div>
    <div class="pr-grid">
      <div class="pr-group">
        <label class="pr-label">Nome studio</label>
        <input class="pr-input" type="text" id="pr-nome" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['nome'], ENT_QUOTES, 'UTF-8', true);?>
">
      </div>
      <div class="pr-group">
        <label class="pr-label">Username</label>
        <input class="pr-input" type="text" id="pr-username" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['username'], ENT_QUOTES, 'UTF-8', true);?>
">
      </div>
      <div class="pr-group">
        <label class="pr-label">Email</label>
        <input class="pr-input" type="email" id="pr-email" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('data')['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
      </div>
      <div class="pr-group">
        <label class="pr-label">Telefono</label>
        <input class="pr-input" type="tel" id="pr-telefono" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('data')['telefono'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" placeholder="es. +39 333 1234567">
      </div>
      <div class="pr-group">
        <label class="pr-label">Città</label>
        <select class="pr-input pr-select" id="pr-posizione">
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, array('Milano','Roma','Napoli','Torino','Palermo','Genova','Bologna','Firenze','Bari','Catania','Venezia','Pescara','Avezzano','Popoli','Catanzaro'), 'citta');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('citta')->value) {
$foreach0DoElse = false;
?>
            <option value="<?php echo $_smarty_tpl->getValue('citta');?>
" <?php if ($_smarty_tpl->getValue('data')['posizione'] === $_smarty_tpl->getValue('citta')) {?>selected<?php }?>><?php echo $_smarty_tpl->getValue('citta');?>
</option>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
      </div>
      <div class="pr-group">
        <label class="pr-label">Partita IVA</label>
        <input class="pr-input" type="text" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('data')['partita_iva'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" readonly title="Non modificabile">
      </div>
      <div class="pr-group pr-full">
        <label class="pr-label">Descrizione</label>
        <textarea class="pr-input pr-textarea" id="pr-descrizione"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('data')['descrizione'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</textarea>
      </div>
    </div>
    <button class="pr-btn" id="pr-btn-dati">Salva modifiche</button>
    <div class="pr-feedback" id="pr-feedback-dati"></div>
  </div>

  <div class="pr-card">
    <div class="pr-section-label">Membri del team</div>
    <?php if ($_smarty_tpl->getValue('data')['tatuatori'] && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('data')['tatuatori']) > 0) {?>
      <div class="pr-team-list">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data')['tatuatori'], 'tat');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('tat')->value) {
$foreach1DoElse = false;
?>
        <div class="pr-member">
          <div class="pr-member-av"><?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('tat')->getNome(), (int) 0, (int) 1) ?? '', 'UTF-8');
echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('tat')->getCognome(), (int) 0, (int) 1) ?? '', 'UTF-8');?>
</div>
          <div>
            <div class="pr-member-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('tat')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('tat')->getCognome(), ENT_QUOTES, 'UTF-8', true);?>
</div>
            <div class="pr-member-tags"><?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tat')->getStili(), 'st', true);
$_smarty_tpl->getVariable('st')->iteration = 0;
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('st')->value) {
$foreach2DoElse = false;
$_smarty_tpl->getVariable('st')->iteration++;
$_smarty_tpl->getVariable('st')->last = $_smarty_tpl->getVariable('st')->iteration === $_smarty_tpl->getVariable('st')->total;
$foreach2Backup = clone $_smarty_tpl->getVariable('st');
echo htmlspecialchars((string)$_smarty_tpl->getValue('st')->getNome(), ENT_QUOTES, 'UTF-8', true);
if (!$_smarty_tpl->getVariable('st')->last) {?> · <?php }
$_smarty_tpl->setVariable('st', $foreach2Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?></div>
          </div>
        </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
      </div>
    <?php } else { ?>
      <p style="color:#6b736f;font-size:14px;margin-bottom:16px;">Nessun membro nel team ancora.</p>
    <?php }?>
    <a href="/gestisci_team" class="pr-btn-outline">✏ Modifica membri team</a>
  </div>

    <?php } elseif ($_smarty_tpl->getValue('data')['ruolo'] === 'cliente') {?>

  <div class="pr-card">
    <div class="pr-section-label">Dati personali</div>
    <div class="pr-grid">
      <div class="pr-group">
        <label class="pr-label">Nome</label>
        <input class="pr-input" type="text" id="pr-nome" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['nome'], ENT_QUOTES, 'UTF-8', true);?>
">
      </div>
      <div class="pr-group">
        <label class="pr-label">Cognome</label>
        <input class="pr-input" type="text" id="pr-cognome" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('data')['cognome'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
      </div>
      <div class="pr-group">
        <label class="pr-label">Username</label>
        <input class="pr-input" type="text" id="pr-username" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['username'], ENT_QUOTES, 'UTF-8', true);?>
">
      </div>
    </div>
    <button class="pr-btn" id="pr-btn-dati">Salva modifiche</button>
    <div class="pr-feedback" id="pr-feedback-dati"></div>
  </div>

    <?php } elseif ($_smarty_tpl->getValue('data')['ruolo'] === 'amministratore') {?>

  <div class="pr-card">
    <div class="pr-section-label">Dati account</div>
    <div class="pr-grid">
      <div class="pr-group">
        <label class="pr-label">Nome</label>
        <input class="pr-input" type="text" id="pr-nome" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['nome'], ENT_QUOTES, 'UTF-8', true);?>
">
      </div>
      <div class="pr-group">
        <label class="pr-label">Cognome</label>
        <input class="pr-input" type="text" id="pr-cognome" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('data')['cognome'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
      </div>
      <div class="pr-group">
        <label class="pr-label">Username</label>
        <input class="pr-input" type="text" id="pr-username" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['username'], ENT_QUOTES, 'UTF-8', true);?>
">
      </div>
    </div>
    <button class="pr-btn" id="pr-btn-dati">Salva modifiche</button>
    <div class="pr-feedback" id="pr-feedback-dati"></div>
  </div>

  <?php }?>

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

<?php }?>
</div>
</div>

<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
