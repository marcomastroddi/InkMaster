<?php
/* Smarty version 5.8.0, created on 2026-06-22 23:29:18
  from 'file:pages/auth/login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a39a92ec083b8_31852091',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9968a0de5db30c78b2d23aa0f017ce3ee9075116' => 
    array (
      0 => 'pages/auth/login.tpl',
      1 => 1782145692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a39a92ec083b8_31852091 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15147765996a39a92ec06686_56292877', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15692093486a39a92ec07e36_74127710', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_15147765996a39a92ec06686_56292877 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
?>
Accedi — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_15692093486a39a92ec07e36_74127710 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
?>

    <h1>Accedi</h1>
    <?php
}
}
/* {/block "content"} */
}
