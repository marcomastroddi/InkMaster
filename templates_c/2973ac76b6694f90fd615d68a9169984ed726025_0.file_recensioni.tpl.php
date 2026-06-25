<?php
/* Smarty version 5.8.0, created on 2026-06-25 23:35:48
  from 'file:pages/ricerca/recensioni.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d9f3412bc11_56085774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2973ac76b6694f90fd615d68a9169984ed726025' => 
    array (
      0 => 'pages/ricerca/recensioni.tpl',
      1 => 1782145692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3d9f3412bc11_56085774 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19492648006a3d9f34129f64_24004476', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13201113986a3d9f3412b529_11732530', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_19492648006a3d9f34129f64_24004476 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>
Recensioni — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_13201113986a3d9f3412b529_11732530 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>

    <h1>Recensioni</h1>
    <?php
}
}
/* {/block "content"} */
}
