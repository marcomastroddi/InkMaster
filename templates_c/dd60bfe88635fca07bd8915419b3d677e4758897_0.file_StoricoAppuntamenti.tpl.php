<?php
/* Smarty version 5.8.0, created on 2026-06-26 13:25:29
  from 'file:pages/studio/StoricoAppuntamenti.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e7dc96c2d35_56057226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd60bfe88635fca07bd8915419b3d677e4758897' => 
    array (
      0 => 'pages/studio/StoricoAppuntamenti.tpl',
      1 => 1782469138,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e7dc96c2d35_56057226 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\studio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5462228966a3e7dc9530538_20040427', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18809896166a3e7dc954a883_01901421', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13860664336a3e7dc954c900_38657369', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_5462228966a3e7dc9530538_20040427 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\studio';
?>
Storico Appuntamenti — InkMaster Studio<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_18809896166a3e7dc954a883_01901421 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\studio';
?>

    <link rel="stylesheet" href="/CSS/StoricoAppuntamenti.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_13860664336a3e7dc954c900_38657369 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\studio';
?>

<div class="im-storico-page">

    <div class="im-hero-bg">
        <div class="im-blob im-blob-1"></div>
        <div class="im-blob im-blob-2"></div>
        <div class="im-blob im-blob-3"></div>
    </div>

    <div class="im-storico-content">
        <div class="im-dash-eyebrow">Dashboard Studio</div>
        <h1 class="im-dash-title">I miei clienti</h1>

        <div class="im-storico-filtri">
            <a href="/storico_appuntamenti" class="im-filtro<?php if (!(true && (true && null !== ($_GET['stato'] ?? null)))) {?> im-filtro-attivo<?php }?>">Tutti</a>
            <a href="/storico_appuntamenti?stato=CONFERMATO" class="im-filtro<?php if ((true && (true && null !== ($_GET['stato'] ?? null))) && $_GET['stato'] === 'CONFERMATO') {?> im-filtro-attivo<?php }?>">Confermati</a>
            <a href="/storico_appuntamenti?stato=IN_CORSO" class="im-filtro<?php if ((true && (true && null !== ($_GET['stato'] ?? null))) && $_GET['stato'] === 'IN_CORSO') {?> im-filtro-attivo<?php }?>">In corso</a>
            <a href="/storico_appuntamenti?stato=COMPLETATO" class="im-filtro<?php if ((true && (true && null !== ($_GET['stato'] ?? null))) && $_GET['stato'] === 'COMPLETATO') {?> im-filtro-attivo<?php }?>">Completati</a>
            <a href="/storico_appuntamenti?stato=ANNULLATO" class="im-filtro<?php if ((true && (true && null !== ($_GET['stato'] ?? null))) && $_GET['stato'] === 'ANNULLATO') {?> im-filtro-attivo<?php }?>">Annullati</a>
            <a href="/storico_appuntamenti?stato=IN_ATTESA" class="im-filtro<?php if ((true && (true && null !== ($_GET['stato'] ?? null))) && $_GET['stato'] === 'IN_ATTESA') {?> im-filtro-attivo<?php }?>">In attesa</a>
        </div>

        <?php if (( !$_smarty_tpl->hasVariable('data') || empty($_smarty_tpl->getValue('data')))) {?>
            <p class="im-nessuna">Nessun appuntamento trovato.</p>
        <?php } else { ?>
            <div class="im-storico-lista">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'app');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('app')->value) {
$foreach0DoElse = false;
?>
                <?php $_smarty_tpl->assign('stato', $_smarty_tpl->getValue('app')->getStato(), false, NULL);?>
                <?php if (!(true && (true && null !== ($_GET['stato'] ?? null))) || $_GET['stato'] === $_smarty_tpl->getValue('stato')) {?>
                <div class="im-storico-card">

                    <div class="im-richiesta-avatar">
                        <?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('app')->getCliente()->getNome(), (int) 0, (int) 1) ?? '', 'UTF-8');
echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('app')->getCliente()->getCognome(), (int) 0, (int) 1) ?? '', 'UTF-8');?>

                    </div>

                    <div class="im-storico-info">
                        <div class="im-richiesta-nome"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('app')->getCliente()->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('app')->getCliente()->getCognome(), ENT_QUOTES, 'UTF-8', true);?>
</div>
                        <div class="im-richiesta-username">@<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('app')->getCliente()->getUsername(), ENT_QUOTES, 'UTF-8', true);?>
</div>
                    </div>

                    <div class="im-richiesta-campo">
                        <div class="im-richiesta-label">Data</div>
                        <div class="im-richiesta-valore"><?php echo $_smarty_tpl->getValue('app')->getData()->format('d/m/Y');?>
</div>
                    </div>

                    <div class="im-richiesta-campo">
                        <div class="im-richiesta-label">Orario</div>
                        <div class="im-richiesta-valore"><?php echo $_smarty_tpl->getValue('app')->getOraInizio()->format('H:i');?>
 – <?php echo $_smarty_tpl->getValue('app')->getOraFine()->format('H:i');?>
</div>
                    </div>

                    <div class="im-richiesta-campo">
                        <div class="im-richiesta-label">Note</div>
                        <div class="im-richiesta-valore"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('app')->getNote() ?? null)===null||$tmp==='' ? '—' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</div>
                    </div>

                    <div class="im-storico-stato im-stato-<?php echo mb_strtolower((string) $_smarty_tpl->getValue('stato'), 'UTF-8');?>
">
                        <?php if ($_smarty_tpl->getValue('stato') === 'CONFERMATO') {?>Confermato
                        <?php } elseif ($_smarty_tpl->getValue('stato') === 'IN_CORSO') {?>In corso
                        <?php } elseif ($_smarty_tpl->getValue('stato') === 'COMPLETATO') {?>Completato
                        <?php } elseif ($_smarty_tpl->getValue('stato') === 'ANNULLATO') {?>Annullato
                        <?php } elseif ($_smarty_tpl->getValue('stato') === 'IN_ATTESA') {?>In attesa
                        <?php } else {
echo htmlspecialchars((string)$_smarty_tpl->getValue('stato'), ENT_QUOTES, 'UTF-8', true);?>

                        <?php }?>
                    </div>

                </div>
                <?php }?>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
        <?php }?>

        <a href="/dashboardStudio" class="im-btn-back">← Torna alla dashboard</a>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
