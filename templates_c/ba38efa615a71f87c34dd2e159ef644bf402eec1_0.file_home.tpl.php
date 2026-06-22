<?php
/* Smarty version 5.8.0, created on 2026-06-22 23:29:12
  from 'file:pages/ricerca/home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a39a928f2f538_90962116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba38efa615a71f87c34dd2e159ef644bf402eec1' => 
    array (
      0 => 'pages/ricerca/home.tpl',
      1 => 1782145692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a39a928f2f538_90962116 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4893282396a39a928f2d5a1_82287245', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4150098036a39a928f2f028_35821786', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_4893282396a39a928f2d5a1_82287245 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>
Home — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_4150098036a39a928f2f028_35821786 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>

    <h1>Home</h1>
    <?php
}
}
/* {/block "content"} */
}
