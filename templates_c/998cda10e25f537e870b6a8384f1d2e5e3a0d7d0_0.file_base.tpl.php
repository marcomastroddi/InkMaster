<?php
/* Smarty version 5.8.0, created on 2026-06-24 22:41:36
  from 'file:layouts/base.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3c41006c71d7_16024412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '998cda10e25f537e870b6a8384f1d2e5e3a0d7d0' => 
    array (
      0 => 'layouts/base.tpl',
      1 => 1782333688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_6a3c41006c71d7_16024412 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11170619596a3c41006c01b2_22149395', "title");
?>
</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/CSS/layout.css">
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8560938456a3c41006c3b82_56733344', "extra_css");
?>
</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate('file:partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <main class="content">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2530284446a3c41006c6384_17207684', "content");
?>

    </main>

    <?php $_smarty_tpl->renderSubTemplate('file:partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
</body>
</html>
<?php }
/* {block "title"} */
class Block_11170619596a3c41006c01b2_22149395 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/layouts';
?>
InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_8560938456a3c41006c3b82_56733344 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/layouts';
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_2530284446a3c41006c6384_17207684 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/layouts';
}
}
/* {/block "content"} */
}
