<?php
/* Smarty version 5.8.0, created on 2026-06-24 22:37:10
  from 'file:layouts/base.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3c5c160dbc79_54840810',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66e28463df2a9c86a7b975c7d1bc289852410fe6' => 
    array (
      0 => 'layouts/base.tpl',
      1 => 1782340415,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_6a3c5c160dbc79_54840810 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10111377536a3c5c15e554f7_70959247', "title");
?>
</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/CSS/layout.css">
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10530019476a3c5c1608b272_62694027', "extra_css");
?>
</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate('file:partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <main class="content">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20273644066a3c5c160da7d5_31313510', "content");
?>

    </main>

    <?php $_smarty_tpl->renderSubTemplate('file:partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
</body>
</html>
<?php }
/* {block "title"} */
class Block_10111377536a3c5c15e554f7_70959247 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\layouts';
?>
InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_10530019476a3c5c1608b272_62694027 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\layouts';
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_20273644066a3c5c160da7d5_31313510 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\layouts';
}
}
/* {/block "content"} */
}
