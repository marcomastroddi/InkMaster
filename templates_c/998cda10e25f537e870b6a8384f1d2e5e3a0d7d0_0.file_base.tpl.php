<?php
/* Smarty version 5.8.0, created on 2026-06-25 17:31:05
  from 'file:layouts/base.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d49b93a92b3_02005083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '998cda10e25f537e870b6a8384f1d2e5e3a0d7d0' => 
    array (
      0 => 'layouts/base.tpl',
      1 => 1782401355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_6a3d49b93a92b3_02005083 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_528801596a3d49b939de69_36513275', "title");
?>
</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/CSS/layout.css">
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2983762036a3d49b93a3a78_37494270', "extra_css");
?>
</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate('file:partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <main class="content">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_585136556a3d49b93a7bf8_57609750', "content");
?>

    </main>

    <?php $_smarty_tpl->renderSubTemplate('file:partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

        <?php echo '<script'; ?>
>
    (function () {
        var btn = document.getElementById('im-logout-btn');
        var overlay = document.getElementById('im-logout-overlay');
        var cancel = document.getElementById('im-logout-cancel');
        if (!btn || !overlay) return;

        btn.addEventListener('click', function (e) {
            e.preventDefault();
            overlay.classList.add('aperto');
        });
        if (cancel) {
            cancel.addEventListener('click', function () {
                overlay.classList.remove('aperto');
            });
        }
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) overlay.classList.remove('aperto');
        });
    })();
    <?php echo '</script'; ?>
>
</body>
</html><?php }
/* {block "title"} */
class Block_528801596a3d49b939de69_36513275 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/layouts';
?>
InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_2983762036a3d49b93a3a78_37494270 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/layouts';
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_585136556a3d49b93a7bf8_57609750 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/layouts';
}
}
/* {/block "content"} */
}
