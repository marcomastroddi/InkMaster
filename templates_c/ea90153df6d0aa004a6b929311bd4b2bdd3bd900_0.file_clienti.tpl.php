<?php
/* Smarty version 5.8.0, created on 2026-06-25 18:23:37
  from 'file:pages/studio/clienti.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d72291bc9c4_48313586',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea90153df6d0aa004a6b929311bd4b2bdd3bd900' => 
    array (
      0 => 'pages/studio/clienti.tpl',
      1 => 1782144036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3d72291bc9c4_48313586 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\studio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20721850316a3d72291b7c19_29137472', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10391725026a3d72291bc011_25148723', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_20721850316a3d72291b7c19_29137472 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\studio';
?>
I miei clienti — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_10391725026a3d72291bc011_25148723 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\studio';
?>

    <h1>I miei clienti</h1>
    <?php
}
}
/* {/block "content"} */
}
