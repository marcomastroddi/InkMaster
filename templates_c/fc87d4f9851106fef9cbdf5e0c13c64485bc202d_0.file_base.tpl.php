<?php
/* Smarty version 5.8.0, created on 2026-06-24 14:41:39
  from 'file:layouts/base.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3beca32d0276_17351823',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc87d4f9851106fef9cbdf5e0c13c64485bc202d' => 
    array (
      0 => 'layouts/base.tpl',
      1 => 1782312092,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_6a3beca32d0276_17351823 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20160255296a3beca32c8352_45112752', "title");
?>
</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16681370946a3beca32ccc45_93316330', "extra_css");
?>

</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate('file:partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <main class="content">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12601307726a3beca32cf4a1_53214085', "content");
?>

    </main>

    <?php $_smarty_tpl->renderSubTemplate('file:partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
</body>
</html>
<?php }
/* {block "title"} */
class Block_20160255296a3beca32c8352_45112752 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\layouts';
?>
InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_16681370946a3beca32ccc45_93316330 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\layouts';
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_12601307726a3beca32cf4a1_53214085 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\layouts';
}
}
/* {/block "content"} */
}
