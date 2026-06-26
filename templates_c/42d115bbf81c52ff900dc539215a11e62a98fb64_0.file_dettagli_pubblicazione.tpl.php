<?php
/* Smarty version 5.8.0, created on 2026-06-26 17:34:55
  from 'file:pages/portfolio/dettagli_pubblicazione.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e9c1f0169b9_67601808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42d115bbf81c52ff900dc539215a11e62a98fb64' => 
    array (
      0 => 'pages/portfolio/dettagli_pubblicazione.tpl',
      1 => 1782145692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e9c1f0169b9_67601808 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/portfolio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15906244346a3e9c1f012c36_70281917', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19777705926a3e9c1f015d42_45212718', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_15906244346a3e9c1f012c36_70281917 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/portfolio';
?>
Dettagli pubblicazione — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_19777705926a3e9c1f015d42_45212718 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/portfolio';
?>

    <h1>Dettagli pubblicazione</h1>
    <?php
}
}
/* {/block "content"} */
}
