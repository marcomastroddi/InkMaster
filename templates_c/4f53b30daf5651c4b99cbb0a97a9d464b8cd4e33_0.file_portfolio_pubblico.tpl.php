<?php
/* Smarty version 5.8.0, created on 2026-06-26 21:16:27
  from 'file:pages/portfolio/portfolio_pubblico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3eec2b40bea7_11254443',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f53b30daf5651c4b99cbb0a97a9d464b8cd4e33' => 
    array (
      0 => 'pages/portfolio/portfolio_pubblico.tpl',
      1 => 1782508570,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3eec2b40bea7_11254443 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\portfolio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1046271856a3eec2b3a9589_87713170', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3994528936a3eec2b3b57c6_70667985', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4382999826a3eec2b3c2570_78632619', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_1046271856a3eec2b3a9589_87713170 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\portfolio';
?>
Portfolio — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_3994528936a3eec2b3b57c6_70667985 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\portfolio';
?>

<link rel="stylesheet" href="/CSS/home.css">
<style>
.ppub-page { min-height: 60vh; padding: 60px; max-width: 1320px; margin: 0 auto; }
.ppub-header { margin-bottom: 42px; }
.ppub-eyebrow { font-size: 12px; font-weight: 700; letter-spacing: .18em; text-transform: uppercase; color: #2fd8aa; margin-bottom: 10px; }
.ppub-title { font-size: 2.2rem; font-weight: 900; letter-spacing: -.02em; }
.ppub-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 18px; }
.ppub-card { position: relative; border-radius: 14px; overflow: hidden; cursor: pointer; aspect-ratio: 1 / 1.1; background: #1a2120; border: 1px solid rgba(255,255,255,.10); }
.ppub-card img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .4s ease; }
.ppub-card:hover img { transform: scale(1.04); }
.ppub-card-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,.8) 0%, transparent 55%); opacity: 0; transition: opacity .3s; display: flex; align-items: flex-end; padding: 20px; }
.ppub-card:hover .ppub-card-overlay { opacity: 1; }
.ppub-card-title { font-size: 15px; font-weight: 700; color: #eef1f0; }
.ppub-empty { text-align: center; color: #6b736f; padding: 80px 0; font-size: 15px; }
.ppub-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.82); z-index: 900; align-items: center; justify-content: center; padding: 24px; }
.ppub-overlay.aperto { display: flex; }
.ppub-modal { position: relative; background: #1a2120; border: 1px solid rgba(255,255,255,.12); border-radius: 18px; max-width: 840px; width: 100%; display: grid; grid-template-columns: 1fr 1fr; overflow: hidden; max-height: 90vh; }
.ppub-modal-img { overflow: hidden; min-height: 340px; }
.ppub-modal-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
.ppub-modal-body { padding: 36px 32px; display: flex; flex-direction: column; overflow-y: auto; background: #1a2120; }
.ppub-modal-eyebrow { font-size: 11px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; color: #2fd8aa; margin-bottom: 12px; }
.ppub-modal-title { font-size: 1.6rem; font-weight: 900; letter-spacing: -.02em; margin-bottom: 16px; }
.ppub-modal-desc { font-size: 14px; color: #9aa3a0; line-height: 1.7; flex: 1; }
.ppub-modal-date { margin-top: 24px; font-family: ui-monospace, Menlo, monospace; font-size: 11px; color: #6b736f; letter-spacing: .08em; }
.ppub-modal-close { position: absolute; top: 16px; right: 20px; font-size: 22px; color: #9aa3a0; cursor: pointer; z-index: 910; line-height: 1; background: none; border: none; font-family: inherit; padding: 4px; }
.ppub-modal-close:hover { color: #eef1f0; }
@media (max-width: 640px) {
    .ppub-modal { grid-template-columns: 1fr; }
    .ppub-modal-img { min-height: 220px; max-height: 260px; }
    .ppub-page { padding: 30px 20px; }
}
</style>
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_4382999826a3eec2b3c2570_78632619 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\portfolio';
?>


<div style="position:fixed;inset:0;z-index:0;pointer-events:none;overflow:hidden;">
    <div class="im-blob im-blob-1" style="width:620px;height:620px;left:-160px;top:-160px;"></div>
    <div class="im-blob im-blob-2" style="width:520px;height:520px;right:-130px;bottom:-120px;animation-delay:-6s;"></div>
</div>

<div class="im-page" style="position:relative;z-index:1;">
    <div class="ppub-page">
        <div class="ppub-header">
            <div class="ppub-eyebrow">Portfolio</div>
            <h1 class="ppub-title">Opere realizzate</h1>
        </div>

        <?php if ($_smarty_tpl->getValue('status') === 'error' || ( !$_smarty_tpl->hasVariable('data') || empty($_smarty_tpl->getValue('data')))) {?>
            <div class="ppub-empty">Nessuna pubblicazione disponibile.</div>
        <?php } else { ?>
            <div class="ppub-grid">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'pub');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('pub')->value) {
$foreach0DoElse = false;
?>
                <div class="ppub-card"
                     data-titolo="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
"
                     data-img="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getPercorsoImmagine(), ENT_QUOTES, 'UTF-8', true);?>
"
                     data-desc="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('pub')->getDescrizione() ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                     data-data="<?php echo $_smarty_tpl->getValue('pub')->getData()->format('d/m/Y');?>
">
                    <img src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getPercorsoImmagine(), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
" loading="lazy">
                    <div class="ppub-card-overlay">
                        <span class="ppub-card-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
</span>
                    </div>
                </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
        <?php }?>
    </div>
</div>

<div id="ppub-overlay" class="ppub-overlay" role="dialog" aria-modal="true">
    <div class="ppub-modal">
        <button id="ppub-close" class="ppub-modal-close" aria-label="Chiudi">✕</button>
        <div class="ppub-modal-img">
            <img id="ppub-modal-img" src="" alt="">
        </div>
        <div class="ppub-modal-body">
            <div class="ppub-modal-eyebrow">Opera</div>
            <h2 id="ppub-modal-title" class="ppub-modal-title"></h2>
            <p id="ppub-modal-desc" class="ppub-modal-desc"></p>
            <div id="ppub-modal-date" class="ppub-modal-date"></div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
(function () {
    var overlay = document.getElementById('ppub-overlay');
    var closeBtn = document.getElementById('ppub-close');
    var imgEl    = document.getElementById('ppub-modal-img');
    var titleEl  = document.getElementById('ppub-modal-title');
    var descEl   = document.getElementById('ppub-modal-desc');
    var dateEl   = document.getElementById('ppub-modal-date');

    function openModal(card) {
        imgEl.src           = card.dataset.img;
        imgEl.alt           = card.dataset.titolo;
        titleEl.textContent = card.dataset.titolo;
        descEl.textContent  = card.dataset.desc || 'Nessuna descrizione.';
        dateEl.textContent  = card.dataset.data ? '📅 ' + card.dataset.data : '';
        overlay.classList.add('aperto');
    }
    function closeModal() {
        overlay.classList.remove('aperto');
        imgEl.src = '';
    }

    document.querySelectorAll('.ppub-card').forEach(function (card) {
        card.addEventListener('click', function () { openModal(card); });
    });
    closeBtn.addEventListener('click', closeModal);
    overlay.addEventListener('click', function (e) { if (e.target === overlay) closeModal(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeModal(); });
})();
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
