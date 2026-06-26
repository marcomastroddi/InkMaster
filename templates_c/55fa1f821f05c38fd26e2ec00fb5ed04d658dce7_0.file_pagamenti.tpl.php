<?php
/* Smarty version 5.8.0, created on 2026-06-26 22:09:04
  from 'file:pages/studio/pagamenti.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3edc607cb838_58189196',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55fa1f821f05c38fd26e2ec00fb5ed04d658dce7' => 
    array (
      0 => 'pages/studio/pagamenti.tpl',
      1 => 1782504536,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3edc607cb838_58189196 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18913030466a3edc607a4530_25045289', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18497308366a3edc607a77d0_16058984', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_14102261396a3edc607a8880_98983208', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_18913030466a3edc607a4530_25045289 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>
Pagamenti — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_18497308366a3edc607a77d0_16058984 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>

    <link rel="stylesheet" href="/CSS/pagamenti.css">
    <style>
        .im-nav { background: rgba(8,14,12,0.96); backdrop-filter: blur(12px); position: sticky; top: 0; z-index: 100; }
    </style>
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_14102261396a3edc607a8880_98983208 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>

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
            <div class="im-pag-kpi-value">€<?php echo sprintf("%.2f",$_smarty_tpl->getValue('tot_mese'));?>
</div>
            <div class="im-pag-kpi-sub"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),'%B %Y');?>
</div>
        </div>
        <div class="im-pag-kpi-card">
            <div class="im-pag-kpi-label">Quest'anno</div>
            <div class="im-pag-kpi-value">€<?php echo sprintf("%.2f",$_smarty_tpl->getValue('tot_anno'));?>
</div>
            <div class="im-pag-kpi-sub"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),'%Y');?>
</div>
        </div>
        <div class="im-pag-kpi-card">
            <div class="im-pag-kpi-label">Totale storico</div>
            <div class="im-pag-kpi-value">€<?php echo sprintf("%.2f",$_smarty_tpl->getValue('tot_sempre'));?>
</div>
            <div class="im-pag-kpi-sub">da sempre</div>
        </div>
        <div class="im-pag-kpi-card">
            <div class="im-pag-kpi-label">Completati</div>
            <div class="im-pag-kpi-value"><?php echo $_smarty_tpl->getValue('n_completati');?>
</div>
            <div class="im-pag-kpi-sub">tatuaggi pagati</div>
        </div>
    </div>

    <?php $_smarty_tpl->assign('n_conf', $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('confermati')), false, NULL);?>
    <?php $_smarty_tpl->assign('n_paga', $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('da_pagare')), false, NULL);?>

    <div class="im-pag-tabs">
        <a href="#confermati" class="im-pag-tab im-pag-tab--active" id="tab-conf">
            Lavori conclusi
            <?php if ($_smarty_tpl->getValue('n_conf') > 0) {?><span>(<?php echo $_smarty_tpl->getValue('n_conf');?>
)</span><?php }?>
        </a>
        <a href="#da-pagare" class="im-pag-tab" id="tab-paga">
            In attesa dal cliente
            <?php if ($_smarty_tpl->getValue('n_paga') > 0) {?><span>(<?php echo $_smarty_tpl->getValue('n_paga');?>
)</span><?php }?>
        </a>
    </div>

    
    <div class="im-pag-section" id="da-pagare">
        <div class="im-pag-section-title">Il cliente deve ancora effettuare il pagamento</div>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('da_pagare')) > 0) {?>
        <div class="im-pag-lista">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('da_pagare'), 'app');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('app')->value) {
$foreach0DoElse = false;
?>
            <div class="im-pag-card">
                <div class="im-pag-card-avatar">
                    <?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('app')->getCliente()->getUsername(), (int) 0, (int) 2) ?? '', 'UTF-8');?>

                </div>
                <div class="im-pag-card-info">
                    <div class="im-pag-card-name"><?php echo $_smarty_tpl->getValue('app')->getCliente()->getNome();?>
 <?php echo $_smarty_tpl->getValue('app')->getCliente()->getCognome();?>
</div>
                    <div class="im-pag-card-meta">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('app')->getData(),'%d/%m/%Y');?>

                        · <?php echo $_smarty_tpl->getValue('app')->getTatuatore()->getNome();?>
 <?php echo $_smarty_tpl->getValue('app')->getTatuatore()->getCognome();?>

                    </div>
                </div>
                <span class="im-pag-badge">In attesa</span>
                <?php if ($_smarty_tpl->getValue('app')->getCosto()) {?>
                <span class="im-pag-badge im-pag-badge--amount">€<?php echo sprintf("%.2f",$_smarty_tpl->getValue('app')->getCosto());?>
</span>
                <?php }?>
            </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
        <?php } else { ?>
        <div class="im-pag-empty">Nessun pagamento in attesa dal cliente.</div>
        <?php }?>
    </div>

    <div class="im-pag-section" id="confermati">
        <div class="im-pag-section-title">Imposta il prezzo e abilita il pagamento</div>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('confermati')) > 0) {?>
        <div class="im-pag-lista">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('confermati'), 'app');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('app')->value) {
$foreach1DoElse = false;
?>
            <div class="im-pag-card" id="card-<?php echo $_smarty_tpl->getValue('app')->getId();?>
">
                <div class="im-pag-card-avatar">
                    <?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('app')->getCliente()->getUsername(), (int) 0, (int) 2) ?? '', 'UTF-8');?>

                </div>
                <div class="im-pag-card-info">
                    <div class="im-pag-card-name"><?php echo $_smarty_tpl->getValue('app')->getCliente()->getNome();?>
 <?php echo $_smarty_tpl->getValue('app')->getCliente()->getCognome();?>
</div>
                    <div class="im-pag-card-meta">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('app')->getData(),'%d/%m/%Y');?>

                        · <?php echo $_smarty_tpl->getValue('app')->getTatuatore()->getNome();?>
 <?php echo $_smarty_tpl->getValue('app')->getTatuatore()->getCognome();?>

                    </div>
                </div>
                <div class="im-pag-form">
                    <input type="number" class="im-pag-input" placeholder="€ 0.00"
                           min="1" step="0.01" id="costo-<?php echo $_smarty_tpl->getValue('app')->getId();?>
">
                    <button class="im-pag-btn" onclick="abilitaPagamento(<?php echo $_smarty_tpl->getValue('app')->getId();?>
)">
                        Abilita pagamento
                    </button>
                </div>
            </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
        <?php } else { ?>
        <div class="im-pag-empty">Nessun lavoro concluso in attesa di pagamento.</div>
        <?php }?>
    </div>

</div>

<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
