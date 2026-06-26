<?php
/* Smarty version 5.8.0, created on 2026-06-26 10:15:21
  from 'file:pages/moderatore/utente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e5139c38969_46212574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac1636eb5be53c6481a33cac1b8e543eff82734e' => 
    array (
      0 => 'pages/moderatore/utente.tpl',
      1 => 1782142926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e5139c38969_46212574 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5870652276a3e5139c34842_05999596', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20452501096a3e5139c38244_93565642', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_5870652276a3e5139c34842_05999596 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
?>
Profilo utente — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_20452501096a3e5139c38244_93565642 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
?>

    <h1>Profilo utente</h1>
    <?php
}
}
/* {/block "content"} */
}
