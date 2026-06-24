<?php
/* Smarty version 5.8.0, created on 2026-06-24 18:19:59
  from 'file:pages/ricerca/risultati.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3c03af642232_83485368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa82d20c2753d391a628fc4eae696e5a04c58ec9' => 
    array (
      0 => 'pages/ricerca/risultati.tpl',
      1 => 1782145692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3c03af642232_83485368 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7937709516a3c03af6404b2_27306156', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10843969916a3c03af641d36_76493627', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_7937709516a3c03af6404b2_27306156 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>
Risultati — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_10843969916a3c03af641d36_76493627 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>

    <h1>Risultati della ricerca</h1>
    <?php
}
}
/* {/block "content"} */
}
