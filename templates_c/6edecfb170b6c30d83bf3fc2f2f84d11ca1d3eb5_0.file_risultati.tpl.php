<?php
/* Smarty version 5.8.0, created on 2026-06-24 15:46:44
  from 'file:pages/ricerca/risultati.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3bfbe4697db4_66001731',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6edecfb170b6c30d83bf3fc2f2f84d11ca1d3eb5' => 
    array (
      0 => 'pages/ricerca/risultati.tpl',
      1 => 1782144036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3bfbe4697db4_66001731 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11099752176a3bfbe4682e08_64766439', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15947680996a3bfbe46970b0_68805492', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_11099752176a3bfbe4682e08_64766439 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\ricerca';
?>
Risultati — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_15947680996a3bfbe46970b0_68805492 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\ricerca';
?>

    <h1>Risultati della ricerca</h1>
    <?php
}
}
/* {/block "content"} */
}
