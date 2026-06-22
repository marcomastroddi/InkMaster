<?php
/* Smarty version 5.8.0, created on 2026-06-22 16:06:40
  from 'file:pages/ricerca/cerca.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a395d906cd2b0_42331675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '593764b29ace6082257c0251ea0359ccc644b45d' => 
    array (
      0 => 'pages/ricerca/cerca.tpl',
      1 => 1782142881,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a395d906cd2b0_42331675 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9715861376a395d906c8d33_27794876', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_830689156a395d906ccb01_25071120', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_9715861376a395d906c8d33_27794876 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
?>
Cerca — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_830689156a395d906ccb01_25071120 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
?>

    <h1>Cerca</h1>
    <?php
}
}
/* {/block "content"} */
}
