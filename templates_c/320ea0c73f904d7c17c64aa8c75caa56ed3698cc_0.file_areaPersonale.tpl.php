<?php
/* Smarty version 5.8.0, created on 2026-06-26 21:53:10
  from 'file:pages/profilo/areaPersonale.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3ef4c6d146f6_53741205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '320ea0c73f904d7c17c64aa8c75caa56ed3698cc' => 
    array (
      0 => 'pages/profilo/areaPersonale.tpl',
      1 => 1782510123,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3ef4c6d146f6_53741205 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\profilo';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13056485126a3ef4c6b45e99_55663402', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20954548946a3ef4c6b75e00_45905700', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19169032976a3ef4c6b78e21_43825054', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_13056485126a3ef4c6b45e99_55663402 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\profilo';
?>
Area Personale — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_20954548946a3ef4c6b75e00_45905700 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\profilo';
?>

    <link rel="stylesheet" href="/CSS/areaPersonale.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_19169032976a3ef4c6b78e21_43825054 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\profilo';
?>


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

        <div class="im-ap-header-card">
        <div class="im-ap-avatar"><?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('_sessione')['username'], (int) 0, (int) 1) ?? '', 'UTF-8');?>
</div>
        <div class="im-ap-header-info">
            <div class="im-ap-eyebrow">Area Personale</div>
            <h1 class="im-ap-name">Bentornato, <?php echo $_smarty_tpl->getValue('_sessione')['username'];?>
</h1>
        </div>
        <a href="/visualizza_profilo" class="im-ap-btn-gestisci">Gestisci profilo</a>
    </div>

        <div class="im-ap-section-title">Le mie prenotazioni</div>

    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('appuntamenti')) > 0) {?>
    <div class="im-ap-lista">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('appuntamenti'), 'app');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('app')->value) {
$foreach0DoElse = false;
?>
        <?php $_smarty_tpl->assign('stato', $_smarty_tpl->getValue('app')->getStato(), false, NULL);?>
        <div class="im-ap-card" id="apcard-<?php echo $_smarty_tpl->getValue('app')->getId();?>
">
            <div class="im-ap-card-avatar"><?php if ($_smarty_tpl->getValue('app')->getStudio()) {
echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('app')->getStudio()->getNome(), (int) 0, (int) 1) ?? '', 'UTF-8');
} else { ?>?<?php }?></div>
            <div class="im-ap-card-info">
                <div class="im-ap-card-name"><?php if ($_smarty_tpl->getValue('app')->getStudio()) {
echo $_smarty_tpl->getValue('app')->getStudio()->getNome();
} else { ?>—<?php }?></div>
                <div class="im-ap-card-meta"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('app')->getNote(),60,'…');?>
</div>
            </div>
            <div class="im-ap-card-date">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('app')->getData(),'%d/%m/%Y');?>

                <span class="im-ap-card-city"><?php if ($_smarty_tpl->getValue('app')->getStudio() && $_smarty_tpl->getValue('app')->getStudio()->getPosizione()) {
echo $_smarty_tpl->getValue('app')->getStudio()->getPosizione()->value;
}?></span>
            </div>
            <div class="im-ap-card-actions">
                <?php if ($_smarty_tpl->getValue('stato') === 'IN_ATTESA') {?>
                    <span class="im-ap-badge im-ap-badge--attesa">In attesa</span>
                <?php } elseif ($_smarty_tpl->getValue('stato') === 'CONFERMATO') {?>
                    <span class="im-ap-badge im-ap-badge--confermato">Confermato</span>
                <?php } elseif ($_smarty_tpl->getValue('stato') === 'DA_PAGARE') {?>
                    <span class="im-ap-badge im-ap-badge--pagare">Da pagare</span>
                    <button class="im-ap-btn-pay"
                            onclick="apriPagamento(<?php echo $_smarty_tpl->getValue('app')->getId();?>
, <?php echo $_smarty_tpl->getValue('app')->getCosto();?>
)">
                        Paga €<?php echo sprintf("%.2f",$_smarty_tpl->getValue('app')->getCosto());?>

                    </button>
                <?php } elseif ($_smarty_tpl->getValue('stato') === 'COMPLETATO') {?>
                    <span class="im-ap-badge im-ap-badge--completato">Completato</span>
                    <span class="im-ap-badge-paid">✓ Pagato</span>
                <?php } elseif ($_smarty_tpl->getValue('stato') === 'ANNULLATO') {?>
                    <span class="im-ap-badge im-ap-badge--annullato">Annullato</span>
                <?php }?>
                
            </div>
        </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
    <?php } else { ?>
    <div class="im-ap-empty">Nessuna prenotazione trovata.</div>
    <?php }?>

        <div class="im-ap-section-title" style="margin-top:56px;">Le mie recensioni</div>

    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('recensioni')) > 0) {?>
    <div class="im-ap-rec-grid">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recensioni'), 'rec');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('rec')->value) {
$foreach1DoElse = false;
?>
        <div class="im-ap-rec-card">
            <div class="im-ap-rec-header">
                <div class="im-ap-rec-avatar"><?php if ($_smarty_tpl->getValue('rec')->getStudio()) {
echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('rec')->getStudio()->getNome(), (int) 0, (int) 1) ?? '', 'UTF-8');
} else { ?>?<?php }?></div>
                <div>
                    <div class="im-ap-rec-studio"><?php if ($_smarty_tpl->getValue('rec')->getStudio()) {
echo $_smarty_tpl->getValue('rec')->getStudio()->getNome();
} else { ?>—<?php }?></div>
                    <div class="im-ap-rec-date"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('rec')->getData(),'%b %Y');?>
</div>
                </div>
            </div>
            <div class="im-ap-stars">
                <?php
$_smarty_tpl->assign('s', null);$_smarty_tpl->tpl_vars['s']->step = 1;$_smarty_tpl->tpl_vars['s']->total = (int) ceil(($_smarty_tpl->tpl_vars['s']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['s']->step));
if ($_smarty_tpl->tpl_vars['s']->total > 0) {
for ($_smarty_tpl->tpl_vars['s']->value = 1, $_smarty_tpl->tpl_vars['s']->iteration = 1;$_smarty_tpl->tpl_vars['s']->iteration <= $_smarty_tpl->tpl_vars['s']->total;$_smarty_tpl->tpl_vars['s']->value += $_smarty_tpl->tpl_vars['s']->step, $_smarty_tpl->tpl_vars['s']->iteration++) {
$_smarty_tpl->tpl_vars['s']->first = $_smarty_tpl->tpl_vars['s']->iteration === 1;$_smarty_tpl->tpl_vars['s']->last = $_smarty_tpl->tpl_vars['s']->iteration === $_smarty_tpl->tpl_vars['s']->total;?>
                    <?php if ($_smarty_tpl->getValue('s') <= $_smarty_tpl->getValue('rec')->getVoto()) {?><span class="im-ap-star im-ap-star--on">★</span><?php } else { ?><span class="im-ap-star">★</span><?php }?>
                <?php }
}
?>
            </div>
            <?php if ($_smarty_tpl->getValue('rec')->getTitolo()) {?><div class="im-ap-rec-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
            <?php if ($_smarty_tpl->getValue('rec')->getDescrizione()) {?><div class="im-ap-rec-desc"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')(htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getDescrizione(), ENT_QUOTES, 'UTF-8', true),120,'…');?>
</div><?php }?>
        </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
    <?php } else { ?>
    <div class="im-ap-empty">Nessuna recensione ancora.</div>
    <?php }?>

</div>

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

<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>

<?php
}
}
/* {/block "content"} */
}
