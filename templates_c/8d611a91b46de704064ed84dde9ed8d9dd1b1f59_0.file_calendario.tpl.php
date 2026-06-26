<?php
/* Smarty version 5.8.0, created on 2026-06-26 09:05:42
  from 'file:pages/studio/calendario.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e24c67316c8_78922019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d611a91b46de704064ed84dde9ed8d9dd1b1f59' => 
    array (
      0 => 'pages/studio/calendario.tpl',
      1 => 1782145692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e24c67316c8_78922019 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10884969776a3e24c672fb94_12279104', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19804047936a3e24c67311a1_23260412', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_10884969776a3e24c672fb94_12279104 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>
Calendario — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_19804047936a3e24c67311a1_23260412 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>

    <h1>Calendario</h1>
    <?php
}
}
/* {/block "content"} */
}
