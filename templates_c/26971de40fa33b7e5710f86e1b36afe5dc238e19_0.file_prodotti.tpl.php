<?php
/* Smarty version 5.8.0, created on 2026-06-16 16:57:14
  from 'file:prodotti.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a31806a15feb2_67028210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26971de40fa33b7e5710f86e1b36afe5dc238e19' => 
    array (
      0 => 'prodotti.tpl',
      1 => 1781627812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a31806a15feb2_67028210 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->getValue('titolo_pagina');?>
</title>
    <style>
        body { font-family: sans-serif; margin: 40px; background: #f4f4f4; }
        .prodotto-card { background: white; padding: 20px; margin-bottom: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .prezzo { color: green; font-weight: bold; }
    </style>
</head>
<body>

    <h1><?php echo $_smarty_tpl->getValue('titolo_pagina');?>
</h1>

    <div class="prodotti-container">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prodotti'), 'p');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('p')->value) {
$foreach0DoElse = false;
?>
            <div class="prodotto-card">
                <h2><?php echo $_smarty_tpl->getValue('p')['nome'];?>
</h2>
                <p><?php echo $_smarty_tpl->getValue('p')['descrizione'];?>
</p>
                <p class="prezzo">Prezzo: €<?php echo $_smarty_tpl->getValue('p')['prezzo'];?>
</p>
            </div>
        <?php
}
if ($foreach0DoElse) {
?>
            <p>Nessun prodotto disponibile.</p>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>

</body>
</html><?php }
}
