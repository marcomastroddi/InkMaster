<?php
/* Smarty version 5.8.0, created on 2026-06-24 23:10:41
  from 'file:layouts/base_ricerca.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3c47d1b7d135_17332327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b2afe68730c3616f41a12bc78ccc2c9d02fc2e1' => 
    array (
      0 => 'layouts/base_ricerca.tpl',
      1 => 1782335192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header_ricerca.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_6a3c47d1b7d135_17332327 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_14461732966a3c47d1b79316_00893993', "title");
?>
</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/CSS/layout.css">
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_14572597516a3c47d1b7a0a4_40522154', "extra_css");
?>

</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate('file:partials/header_ricerca.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <main class="content">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10337768396a3c47d1b7c576_83332080', "content");
?>

    </main>

    <?php $_smarty_tpl->renderSubTemplate('file:partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
</body>
</html><?php }
/* {block "title"} */
class Block_14461732966a3c47d1b79316_00893993 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/layouts';
?>
InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_14572597516a3c47d1b7a0a4_40522154 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/layouts';
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_10337768396a3c47d1b7c576_83332080 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/layouts';
}
}
/* {/block "content"} */
}
