<?php
/* Smarty version 5.8.0, created on 2026-06-25 07:57:14
  from 'file:layouts/base_ricerca.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3cdf5a6d9ce1_24414541',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50ddb379712e02aa1bb3feb77217c07b0db0876e' => 
    array (
      0 => 'layouts/base_ricerca.tpl',
      1 => 1782373354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header_ricerca.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_6a3cdf5a6d9ce1_24414541 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1146080386a3cdf5a68bde3_24382586', "title");
?>
</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/CSS/layout.css">
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12871999326a3cdf5a68cc69_94186182', "extra_css");
?>

</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate('file:partials/header_ricerca.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <main class="content">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9016182346a3cdf5a6d8b86_02780989', "content");
?>

    </main>

    <?php $_smarty_tpl->renderSubTemplate('file:partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
</body>
</html><?php }
/* {block "title"} */
class Block_1146080386a3cdf5a68bde3_24382586 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\layouts';
?>
InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_12871999326a3cdf5a68cc69_94186182 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\layouts';
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_9016182346a3cdf5a6d8b86_02780989 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\layouts';
}
}
/* {/block "content"} */
}
