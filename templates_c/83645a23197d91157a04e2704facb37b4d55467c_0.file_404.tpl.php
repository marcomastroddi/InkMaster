<?php
/* Smarty version 5.8.0, created on 2026-06-24 16:12:40
  from 'file:pages/errori/404.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3c01f8c382e1_27479812',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83645a23197d91157a04e2704facb37b4d55467c' => 
    array (
      0 => 'pages/errori/404.tpl',
      1 => 1782144036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3c01f8c382e1_27479812 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\errori';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13058561526a3c01f8c32fe8_48482076', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16846334236a3c01f8c37921_57030660', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_13058561526a3c01f8c32fe8_48482076 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\errori';
?>
Pagina non trovata — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_16846334236a3c01f8c37921_57030660 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\errori';
?>

    <h1>404 — Pagina non trovata</h1>
    <p>La pagina che cerchi non esiste. <a href="/home">Torna alla home</a>.</p>
<?php
}
}
/* {/block "content"} */
}
