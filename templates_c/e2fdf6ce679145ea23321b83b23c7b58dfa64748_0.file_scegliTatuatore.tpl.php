<?php
/* Smarty version 5.8.0, created on 2026-06-25 13:37:48
  from 'file:pages/prenotazione/scegliTatuatore.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d130cc90753_03271900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e2fdf6ce679145ea23321b83b23c7b58dfa64748' => 
    array (
      0 => 'pages/prenotazione/scegliTatuatore.tpl',
      1 => 1782387364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3d130cc90753_03271900 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/prenotazione';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11990478336a3d130cc88db7_63932330', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16592635046a3d130cc8a9d8_17470123', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20450821306a3d130cc8aff3_58259213', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base_ricerca.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_11990478336a3d130cc88db7_63932330 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/prenotazione';
?>
Prenota — <?php echo $_smarty_tpl->getValue('studio')->getNome();
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_16592635046a3d130cc8a9d8_17470123 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/prenotazione';
?>

<link rel="stylesheet" href="/CSS/prenotazione.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_20450821306a3d130cc8aff3_58259213 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/prenotazione';
?>

<div class="pb-overlay">
    <div class="pb-card">

        <div class="pb-card-header">
            <div>
                <span class="pb-studio-name"><?php echo $_smarty_tpl->getValue('studio')->getNome();?>
</span>
            </div>
            <a href="/scegli_studio?id=<?php echo $_smarty_tpl->getValue('studio')->getId();?>
" class="pb-close">✕</a>
        </div>

        <div class="pb-step-indicator">
            <span class="pb-dot pb-dot--active"></span>
            <span class="pb-dot"></span>
            <span class="pb-dot"></span>
            <span class="pb-dot"></span>
        </div>

        <p class="pb-title">Scegli uno di noi</p>

        <div class="pb-grid">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tatuatori'), 't');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('t')->value) {
$foreach0DoElse = false;
?>
            <a href="/scegliTatuatore?id=<?php echo $_smarty_tpl->getValue('t')->getId();?>
" class="pb-item">
                <div class="pb-avatar"><?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('t')->getNome(), (int) 0, (int) 1) ?? '', 'UTF-8');
echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('t')->getCognome(), (int) 0, (int) 1) ?? '', 'UTF-8');?>
</div>
                <div class="pb-item-name"><?php echo $_smarty_tpl->getValue('t')->getNome();?>
 <?php echo $_smarty_tpl->getValue('t')->getCognome();?>
</div>
            </a>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
        <p class="pb-hint">Clicca su un tatuatore per proseguire</p>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
