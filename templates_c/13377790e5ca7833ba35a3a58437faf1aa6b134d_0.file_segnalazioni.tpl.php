<?php
/* Smarty version 5.8.0, created on 2026-06-26 13:17:08
  from 'file:pages/moderatore/segnalazioni.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e7bd4ec3e62_46422462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13377790e5ca7833ba35a3a58437faf1aa6b134d' => 
    array (
      0 => 'pages/moderatore/segnalazioni.tpl',
      1 => 1782479742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e7bd4ec3e62_46422462 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3388780886a3e7bd4d88304_77061847', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_21403976986a3e7bd4d97be0_62599417', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11202212916a3e7bd4d98646_96656903', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_3388780886a3e7bd4d88304_77061847 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
?>
Segnalazioni — InkMaster Admin<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_21403976986a3e7bd4d97be0_62599417 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
?>

    <link rel="stylesheet" href="/CSS/home.css">
    <link rel="stylesheet" href="/CSS/admin.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_11202212916a3e7bd4d98646_96656903 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
?>

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
            <div class="adm-topbar-avatar"><?php echo mb_strtoupper((string) substr((string) (($tmp = $_SESSION['username'] ?? null)===null||$tmp==='' ? 'A' ?? null : $tmp), (int) 0, (int) 1) ?? '', 'UTF-8');?>
</div>
            <span class="adm-topbar-uname"><?php echo htmlspecialchars((string)(($tmp = $_SESSION['username'] ?? null)===null||$tmp==='' ? 'Admin' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span>
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
                <span class="adm-table-count">👥 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('data'));?>
 segnalazioni</span>
            </div>

            <?php if ($_smarty_tpl->getValue('data')) {?>
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
                                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'seg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('seg')->value) {
$foreach0DoElse = false;
?>
                    <?php if ($_smarty_tpl->getValue('seg')->getStato() != 'APERTA') {
continue 1;
}?>
                    <?php if ($_smarty_tpl->getValue('seg')->getCliente()) {?>
                        <?php $_smarty_tpl->assign('utente', $_smarty_tpl->getValue('seg')->getCliente(), false, NULL);?>
                        <?php $_smarty_tpl->assign('tipo', 'cliente', false, NULL);?>
                        <?php $_smarty_tpl->assign('nomeUtente', ((string)$_smarty_tpl->getValue('utente')->getNome())." ".((string)$_smarty_tpl->getValue('utente')->getCognome()), false, NULL);?>
                        <?php $_smarty_tpl->assign('iniziali', ((string)(substr((string) $_smarty_tpl->getValue('utente')->getNome(), (int) 0, (int) 1))).((string)(substr((string) $_smarty_tpl->getValue('utente')->getCognome(), (int) 0, (int) 1))), false, NULL);?>
                    <?php } elseif ($_smarty_tpl->getValue('seg')->getStudio()) {?>
                        <?php $_smarty_tpl->assign('utente', $_smarty_tpl->getValue('seg')->getStudio(), false, NULL);?>
                        <?php $_smarty_tpl->assign('tipo', 'studio', false, NULL);?>
                        <?php $_smarty_tpl->assign('nomeUtente', $_smarty_tpl->getValue('utente')->getNome(), false, NULL);?>
                        <?php $_smarty_tpl->assign('iniziali', mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('utente')->getNome(), (int) 0, (int) 2) ?? '', 'UTF-8'), false, NULL);?>
                    <?php } else { ?>
                        <?php continue 1;?>
                    <?php }?>
                    <tr>
                        <td>
                            <div class="adm-user-cell">
                                <div class="adm-user-av adm-user-av--<?php echo $_smarty_tpl->getValue('tipo');?>
"><?php echo mb_strtoupper((string) $_smarty_tpl->getValue('iniziali') ?? '', 'UTF-8');?>
</div>
                                <div>
                                    <div class="adm-user-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('nomeUtente'), ENT_QUOTES, 'UTF-8', true);?>
</div>
                                    <div class="adm-user-email"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('utente')->getEmail(), ENT_QUOTES, 'UTF-8', true);?>
</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="adm-motivo"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('seg')->getMotivo(), ENT_QUOTES, 'UTF-8', true);?>
</span></td>
                        <td><span class="adm-badge adm-badge--red">Aperta</span></td>
                        <td class="adm-date"><?php echo $_smarty_tpl->getValue('seg')->getData()->format('d M Y');?>
</td>
                        <td>
                            <button type="button" class="adm-btn-ban"
                            data-id="<?php echo $_smarty_tpl->getValue('utente')->getId();?>
"
                            data-tipo="<?php echo $_smarty_tpl->getValue('tipo');?>
"
                            data-nome="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('nomeUtente'), ENT_QUOTES, 'UTF-8', true);?>
"
                            data-email="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('utente')->getEmail(), ENT_QUOTES, 'UTF-8', true);?>
"
                            data-iniziali="<?php echo mb_strtoupper((string) $_smarty_tpl->getValue('iniziali') ?? '', 'UTF-8');?>
"
                            data-seg-id="<?php echo $_smarty_tpl->getValue('seg')->getId();?>
">Banna</button>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

                                <tr class="adm-table-sep-row">
                    <td colspan="5"><span class="adm-table-sep-label">Già gestite</span></td>
                </tr>

                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'seg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('seg')->value) {
$foreach1DoElse = false;
?>
                    <?php if ($_smarty_tpl->getValue('seg')->getStato() == 'APERTA') {
continue 1;
}?>
                    <?php if ($_smarty_tpl->getValue('seg')->getCliente()) {?>
                        <?php $_smarty_tpl->assign('utente', $_smarty_tpl->getValue('seg')->getCliente(), false, NULL);?>
                        <?php $_smarty_tpl->assign('tipo', 'cliente', false, NULL);?>
                        <?php $_smarty_tpl->assign('nomeUtente', ((string)$_smarty_tpl->getValue('utente')->getNome())." ".((string)$_smarty_tpl->getValue('utente')->getCognome()), false, NULL);?>
                        <?php $_smarty_tpl->assign('iniziali', ((string)(substr((string) $_smarty_tpl->getValue('utente')->getNome(), (int) 0, (int) 1))).((string)(substr((string) $_smarty_tpl->getValue('utente')->getCognome(), (int) 0, (int) 1))), false, NULL);?>
                    <?php } elseif ($_smarty_tpl->getValue('seg')->getStudio()) {?>
                        <?php $_smarty_tpl->assign('utente', $_smarty_tpl->getValue('seg')->getStudio(), false, NULL);?>
                        <?php $_smarty_tpl->assign('tipo', 'studio', false, NULL);?>
                        <?php $_smarty_tpl->assign('nomeUtente', $_smarty_tpl->getValue('utente')->getNome(), false, NULL);?>
                        <?php $_smarty_tpl->assign('iniziali', mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('utente')->getNome(), (int) 0, (int) 2) ?? '', 'UTF-8'), false, NULL);?>
                    <?php } else { ?>
                        <?php continue 1;?>
                    <?php }?>
                    <tr class="adm-row-chiusa">
                        <td>
                            <div class="adm-user-cell">
                                <div class="adm-user-av adm-user-av--<?php echo $_smarty_tpl->getValue('tipo');?>
"><?php echo mb_strtoupper((string) $_smarty_tpl->getValue('iniziali') ?? '', 'UTF-8');?>
</div>
                                <div>
                                    <div class="adm-user-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('nomeUtente'), ENT_QUOTES, 'UTF-8', true);?>
</div>
                                    <div class="adm-user-email"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('utente')->getEmail(), ENT_QUOTES, 'UTF-8', true);?>
</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="adm-motivo"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('seg')->getMotivo(), ENT_QUOTES, 'UTF-8', true);?>
</span></td>
                        <td><span class="adm-badge adm-badge--muted">Chiusa</span></td>
                        <td class="adm-date"><?php echo $_smarty_tpl->getValue('seg')->getData()->format('d M Y');?>
</td>
                        <td class="adm-actions-cell">
                            <button type="button" class="adm-btn-info"
                                data-motivo="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('seg')->getMotivo(), ENT_QUOTES, 'UTF-8', true);?>
"
                                data-desc="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('seg')->getDescrizione() ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                                data-data="<?php echo $_smarty_tpl->getValue('seg')->getData()->format('d M Y');?>
"
                                data-nome="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('nomeUtente'), ENT_QUOTES, 'UTF-8', true);?>
"
                                data-iniziali="<?php echo mb_strtoupper((string) $_smarty_tpl->getValue('iniziali') ?? '', 'UTF-8');?>
"
                                data-tipo="<?php echo $_smarty_tpl->getValue('tipo');?>
">Info</button>
                            <button type="button" class="adm-btn-sban"
                                data-id="<?php echo $_smarty_tpl->getValue('utente')->getId();?>
"
                                data-tipo="<?php echo $_smarty_tpl->getValue('tipo');?>
"
                                data-nome="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('nomeUtente'), ENT_QUOTES, 'UTF-8', true);?>
"
                                data-iniziali="<?php echo mb_strtoupper((string) $_smarty_tpl->getValue('iniziali') ?? '', 'UTF-8');?>
">Sbanna</button>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
            <?php } else { ?>
            <div class="adm-empty">
                <div class="adm-empty-icon">✓</div>
                <p>Nessuna segnalazione aperta.</p>
            </div>
            <?php }?>
        </div>
    </div>
</div>

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
                <button type="button" class="adm-btn-scarta" id="btnScarta">✕ Scarta</button>
                <button type="submit" class="adm-btn-conferma">✓ Conferma ban</button>
            </div>
        </form>
    </div>
</div>

<form id="scartaForm" method="POST" action="/scarta_segnalazione" style="display:none">
    <input type="hidden" name="seg_id" id="scartaSegId">
</form>

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

<?php echo '<script'; ?>
>

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

<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
