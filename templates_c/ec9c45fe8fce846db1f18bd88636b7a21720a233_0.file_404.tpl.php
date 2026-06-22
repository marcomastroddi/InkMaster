<?php
/* Smarty version 5.8.0, created on 2026-06-22 16:06:25
  from 'file:pages/errori/404.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a395d81ef2ee0_27740793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec9c45fe8fce846db1f18bd88636b7a21720a233' => 
    array (
      0 => 'pages/errori/404.tpl',
      1 => 1782142937,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a395d81ef2ee0_27740793 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\errori';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10241484186a395d81eeee41_29056921', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6402754506a395d81ef27b0_85138272', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_10241484186a395d81eeee41_29056921 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\errori';
?>
Pagina non trovata — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_6402754506a395d81ef27b0_85138272 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\errori';
?>

    <h1>404 — Pagina non trovata</h1>
    <p>La pagina che cerchi non esiste. <a href="/home">Torna alla home</a>.</p>
<?php
}
}
/* {/block "content"} */
}
