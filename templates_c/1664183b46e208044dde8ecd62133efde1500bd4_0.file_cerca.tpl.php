<?php
/* Smarty version 5.8.0, created on 2026-06-24 15:46:49
  from 'file:pages/ricerca/cerca.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3bfbe9bba469_26428813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1664183b46e208044dde8ecd62133efde1500bd4' => 
    array (
      0 => 'pages/ricerca/cerca.tpl',
      1 => 1782144036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3bfbe9bba469_26428813 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6139043026a3bfbe9bb50a4_63544678', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5372854216a3bfbe9bb9a50_10965313', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_6139043026a3bfbe9bb50a4_63544678 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\ricerca';
?>
Cerca — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_5372854216a3bfbe9bb9a50_10965313 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\ricerca';
?>

    <h1>Cerca</h1>
    <?php
}
}
/* {/block "content"} */
}
