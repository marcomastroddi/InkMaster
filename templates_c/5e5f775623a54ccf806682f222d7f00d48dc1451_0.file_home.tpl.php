<?php
/* Smarty version 5.8.0, created on 2026-06-22 15:57:37
  from 'file:pages/ricerca/home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a395b7195c545_34111139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e5f775623a54ccf806682f222d7f00d48dc1451' => 
    array (
      0 => 'pages/ricerca/home.tpl',
      1 => 1782142879,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a395b7195c545_34111139 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8210632546a395b7186fb95_77899981', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15884633726a395b7195baf5_17561709', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_8210632546a395b7186fb95_77899981 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
?>
Home — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_15884633726a395b7195baf5_17561709 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
?>

    <h1>Home</h1>
    <?php
}
}
/* {/block "content"} */
}
