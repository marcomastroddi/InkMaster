<?php
/* Smarty version 5.8.0, created on 2026-06-22 23:29:13
  from 'file:pages/errori/404.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a39a92907b0b8_63358586',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ffef815694d6e0f8836c8f9d0c633774b3cc2ac' => 
    array (
      0 => 'pages/errori/404.tpl',
      1 => 1782145692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a39a92907b0b8_63358586 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/errori';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18525477336a39a929079687_82863292', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17761053416a39a92907aca9_34823594', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_18525477336a39a929079687_82863292 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/errori';
?>
Pagina non trovata — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_17761053416a39a92907aca9_34823594 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/errori';
?>

    <h1>404 — Pagina non trovata</h1>
    <p>La pagina che cerchi non esiste. <a href="/home">Torna alla home</a>.</p>
<?php
}
}
/* {/block "content"} */
}
