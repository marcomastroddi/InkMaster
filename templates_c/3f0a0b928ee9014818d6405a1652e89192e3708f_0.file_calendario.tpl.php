<?php
/* Smarty version 5.8.0, created on 2026-06-25 22:35:35
  from 'file:pages/studio/calendario.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3dad37188c20_51257193',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f0a0b928ee9014818d6405a1652e89192e3708f' => 
    array (
      0 => 'pages/studio/calendario.tpl',
      1 => 1782144036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3dad37188c20_51257193 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\studio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13599632556a3dad371701c4_52256238', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15645904656a3dad37185e68_15294885', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_13599632556a3dad371701c4_52256238 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\studio';
?>
Calendario — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_15645904656a3dad37185e68_15294885 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\studio';
?>

    <h1>Calendario</h1>
    <?php
}
}
/* {/block "content"} */
}
