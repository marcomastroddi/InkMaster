<?php
/* Smarty version 5.8.0, created on 2026-06-24 14:32:57
  from 'file:pages/ricerca/risultati.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3bea99226031_79641069',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '108716771a6dc83d37e46fc8d15b664f1f71363a' => 
    array (
      0 => 'pages/ricerca/risultati.tpl',
      1 => 1782142884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3bea99226031_79641069 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_632001946a3bea9921bf09_54461622', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3163606756a3bea99224a32_45024133', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_632001946a3bea9921bf09_54461622 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
?>
Risultati — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_3163606756a3bea99224a32_45024133 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
?>

    <h1>Risultati della ricerca</h1>
    <?php
}
}
/* {/block "content"} */
}
