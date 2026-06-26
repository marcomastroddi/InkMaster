<?php
/* Smarty version 5.8.0, created on 2026-06-26 09:05:37
  from 'file:pages/studio/clienti.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e24c10fee06_07797976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c39e49baf30866069bf5d0eb462d34b90ac2e7a' => 
    array (
      0 => 'pages/studio/clienti.tpl',
      1 => 1782145692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e24c10fee06_07797976 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16509058856a3e24c10fd124_75990865', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11499441086a3e24c10fe8c0_70159308', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_16509058856a3e24c10fd124_75990865 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>
I miei clienti — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_11499441086a3e24c10fe8c0_70159308 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>

    <h1>I miei clienti</h1>
    <?php
}
}
/* {/block "content"} */
}
