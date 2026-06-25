<?php
/* Smarty version 5.8.0, created on 2026-06-25 12:43:57
  from 'file:pages/prenotazione/scelta_stile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d066dc7fc70_76936712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f93df6d421ae9fa238fcbe8c519db096d3d9d60' => 
    array (
      0 => 'pages/prenotazione/scelta_stile.tpl',
      1 => 1782145692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3d066dc7fc70_76936712 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/prenotazione';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7799698926a3d066dc7dee0_07529643', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11064989676a3d066dc7f714_18536849', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_7799698926a3d066dc7dee0_07529643 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/prenotazione';
?>
Scegli lo stile — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_11064989676a3d066dc7f714_18536849 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/prenotazione';
?>

    <h1>Scegli lo stile</h1>
    <?php
}
}
/* {/block "content"} */
}
