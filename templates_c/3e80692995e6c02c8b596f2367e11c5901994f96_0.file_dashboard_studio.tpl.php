<?php
/* Smarty version 5.8.0, created on 2026-06-24 09:37:56
  from 'file:pages/studio/dashboard_studio.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3ba5743ca985_32686721',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e80692995e6c02c8b596f2367e11c5901994f96' => 
    array (
      0 => 'pages/studio/dashboard_studio.tpl',
      1 => 1782142928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3ba5743ca985_32686721 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\studio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11218276376a3ba5743c6756_58148405', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4547873826a3ba5743ca253_42917217', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_11218276376a3ba5743c6756_58148405 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\studio';
?>
Dashboard studio — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_4547873826a3ba5743ca253_42917217 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\studio';
?>

    <h1>Dashboard studio</h1>
    <?php
}
}
/* {/block "content"} */
}
