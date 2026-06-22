<?php
/* Smarty version 5.8.0, created on 2026-06-22 23:29:22
  from 'file:pages/ricerca/cerca.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a39a9323159e6_79556645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c258cc7d682908f7578f7ede32ecdc68d99535f9' => 
    array (
      0 => 'pages/ricerca/cerca.tpl',
      1 => 1782145692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a39a9323159e6_79556645 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19160948886a39a932314257_98458490', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19068965656a39a9323155b3_35857986', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_19160948886a39a932314257_98458490 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>
Cerca — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_19068965656a39a9323155b3_35857986 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>

    <h1>Cerca</h1>
    <?php
}
}
/* {/block "content"} */
}
