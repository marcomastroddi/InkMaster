<?php
/* Smarty version 5.8.0, created on 2026-06-25 15:05:52
  from 'file:pages/profilo/profilo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d43d03c73b1_87496521',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '969469d28e0e579db3ac341a9a6d52fa7d6845de' => 
    array (
      0 => 'pages/profilo/profilo.tpl',
      1 => 1782144036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3d43d03c73b1_87496521 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\profilo';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18218499286a3d43d03b2113_72116639', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13576347146a3d43d03c6360_76470651', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_18218499286a3d43d03b2113_72116639 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\profilo';
?>
Profilo — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_13576347146a3d43d03c6360_76470651 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\profilo';
?>

    <h1>Il mio profilo</h1>
    <?php
}
}
/* {/block "content"} */
}
