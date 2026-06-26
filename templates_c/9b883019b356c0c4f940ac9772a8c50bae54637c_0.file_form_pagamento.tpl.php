<?php
/* Smarty version 5.8.0, created on 2026-06-26 22:11:46
  from 'file:pages/prenotazione/form_pagamento.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3edd02d277d6_51006413',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b883019b356c0c4f940ac9772a8c50bae54637c' => 
    array (
      0 => 'pages/prenotazione/form_pagamento.tpl',
      1 => 1782145692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3edd02d277d6_51006413 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/prenotazione';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12420172346a3edd02d23503_19675430', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15696914076a3edd02d26da2_85733178', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_12420172346a3edd02d23503_19675430 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/prenotazione';
?>
Pagamento — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_15696914076a3edd02d26da2_85733178 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/prenotazione';
?>

    <h1>Dati di pagamento</h1>
    <?php
}
}
/* {/block "content"} */
}
