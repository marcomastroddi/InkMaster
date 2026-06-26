<?php
/* Smarty version 5.8.0, created on 2026-06-26 22:17:23
  from 'file:pages/portfolio/portfolioLatoStudio.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3efa73679fb3_26903026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '017e2c5b0af24360847db7d7eedcc3d67e29bd31' => 
    array (
      0 => 'pages/portfolio/portfolioLatoStudio.tpl',
      1 => 1782510227,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3efa73679fb3_26903026 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\portfolio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11555962746a3efa735c13a7_04646612', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1758992586a3efa73624a22_71530702', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11635421156a3efa73625f99_10738905', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_11555962746a3efa735c13a7_04646612 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\portfolio';
?>
Portfolio — <?php if ($_smarty_tpl->getValue('nome_studio')) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('nome_studio'), ENT_QUOTES, 'UTF-8', true);
} else { ?>Studio<?php }?> — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_1758992586a3efa73624a22_71530702 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\portfolio';
?>

    <link rel="stylesheet" href="/CSS/portfolioLatoStudio.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_11635421156a3efa73625f99_10738905 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\portfolio';
?>

<div class="im-portfolio-page">
    <div class="im-portfolio-deco"></div>

    <div class="im-portfolio-container">

        <div class="im-portfolio-header">
            <div>
                <div class="im-port-eyebrow">Portfolio</div>
                <h1 class="im-portfolio-title"><?php if ($_smarty_tpl->getValue('nome_studio')) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('nome_studio'), ENT_QUOTES, 'UTF-8', true);
} else { ?>Il mio Studio<?php }?></h1>
                <p class="im-portfolio-subtitle">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('data'));?>
 <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('data')) == 1) {?>opera pubblicata<?php } else { ?>opere pubblicate<?php }?>
                </p>
            </div>
            <a href="/form_pubblicazione" class="im-btn-add">+ Aggiungi opera</a>
        </div>

        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('data')) > 0) {?>
        <div class="im-portfolio-grid">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'pub');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('pub')->value) {
$foreach0DoElse = false;
?>
            <div class="im-pub-card" id="card-<?php echo $_smarty_tpl->getValue('pub')->getId();?>
">
                <div class="im-pub-img-wrap">
                    <img src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getPercorsoImmagine(), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
" class="im-pub-img">
                    <button class="im-pub-delete" data-id="<?php echo $_smarty_tpl->getValue('pub')->getId();?>
" title="Elimina">✕</button>
                </div>
                <div class="im-pub-info">
                    <div class="im-pub-titolo"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
</div>
                    <?php if ($_smarty_tpl->getValue('pub')->getDescrizione()) {?>
                    <div class="im-pub-desc"><?php echo htmlspecialchars((string)$_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('pub')->getDescrizione(),80,'...'), ENT_QUOTES, 'UTF-8', true);?>
</div>
                    <?php }?>
                    <div class="im-pub-data"><?php if ($_smarty_tpl->getValue('pub')->getData()) {
echo $_smarty_tpl->getValue('pub')->getData()->format('d/m/Y');
} else { ?>—<?php }?></div>
                </div>
            </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
        <?php } else { ?>
        <div class="im-portfolio-empty">
            <div class="im-empty-icon">✦</div>
            <p>Nessuna opera pubblicata ancora.<br>Aggiungi il tuo primo lavoro!</p>
        </div>
        <?php }?>

    </div>
</div>

<?php echo '<script'; ?>
>
(function () {
    document.querySelectorAll('.im-pub-delete').forEach(function (btn) {
        btn.addEventListener('click', function () {
            if (!confirm('Eliminare questa opera dal portfolio?')) return;
            var id = btn.dataset.id;
            var fd = new FormData();
            fd.append('id', id);
            fetch('/elimina_pubblicazione', { method: 'POST', body: fd })
                .then(function (r) { return r.json(); })
                .then(function (res) {
                    if (res.status === 'success') {
                        var card = document.getElementById('card-' + id);
                        card.style.transition = 'opacity 0.3s, transform 0.3s';
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.95)';
                        setTimeout(function () { card.remove(); }, 300);
                    } else {
                        alert(res.message || 'Impossibile eliminare.');
                    }
                });
        });
    });
})();
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
