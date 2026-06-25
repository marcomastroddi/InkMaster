<?php
/* Smarty version 5.8.0, created on 2026-06-24 23:13:52
  from 'file:layouts/base_ricerca.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3c64b052f031_95175216',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38ed2bbec86fcc6949d175438bb54530927280f3' => 
    array (
      0 => 'layouts/base_ricerca.tpl',
      1 => 1782342807,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header_ricerca.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_6a3c64b052f031_95175216 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18061497106a3c64b0525859_66182781', "title");
?>
</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/CSS/layout.css">
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8215589616a3c64b0526de7_28364111', "extra_css");
?>

</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate('file:partials/header_ricerca.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <main class="content">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17992733586a3c64b052d842_35185802', "content");
?>

    </main>

    <?php $_smarty_tpl->renderSubTemplate('file:partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
</body>
</html><?php }
/* {block "title"} */
class Block_18061497106a3c64b0525859_66182781 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\layouts';
?>
InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_8215589616a3c64b0526de7_28364111 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\layouts';
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_17992733586a3c64b052d842_35185802 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\layouts';
}
}
/* {/block "content"} */
}
