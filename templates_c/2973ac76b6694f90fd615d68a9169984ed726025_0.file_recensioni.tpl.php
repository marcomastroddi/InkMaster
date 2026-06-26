<?php
/* Smarty version 5.8.0, created on 2026-06-26 16:43:02
  from 'file:pages/ricerca/recensioni.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e8ff67c41e0_21852153',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2973ac76b6694f90fd615d68a9169984ed726025' => 
    array (
      0 => 'pages/ricerca/recensioni.tpl',
      1 => 1782484937,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e8ff67c41e0_21852153 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7685582616a3e8ff678dc46_39710114', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11670040056a3e8ff67956b4_86611476', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11075722276a3e8ff6796174_11871212', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_7685582616a3e8ff678dc46_39710114 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>
Recensioni — <?php if ($_smarty_tpl->getValue('studio')) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('studio')->getNome(), ENT_QUOTES, 'UTF-8', true);
}?> — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_11670040056a3e8ff67956b4_86611476 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>

    <link rel="stylesheet" href="/CSS/studio.css">
    <link rel="stylesheet" href="/CSS/recensioni.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_11075722276a3e8ff6796174_11871212 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>

<div class="rec-page">

        <div class="rec-header">
        <a href="/scegli_studio?id=<?php echo $_smarty_tpl->getValue('studioId');?>
" class="rec-back">← Torna allo studio</a>
        <?php if ($_smarty_tpl->getValue('studio')) {?>
            <h1 class="rec-title">Recensioni — <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('studio')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
</h1>
            <p class="rec-subtitle"><?php echo $_smarty_tpl->getValue('totale');?>
 recension<?php if ($_smarty_tpl->getValue('totale') == 1) {?>e<?php } else { ?>i<?php }?> totali</p>
        <?php }?>
    </div>

        <?php if ($_smarty_tpl->getValue('recensioni')) {?>
        <div class="st-reviews-list rec-list">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recensioni'), 'rec');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('rec')->value) {
$foreach0DoElse = false;
?>
                <?php $_smarty_tpl->assign('fotoArr', $_smarty_tpl->getValue('rec')->getFotoArray(), false, NULL);?>
                <div class="st-review rec-item"
                     data-id="<?php echo $_smarty_tpl->getValue('rec')->getId();?>
"
                     data-titolo="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
"
                     data-testo="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getDescrizione(), ENT_QUOTES, 'UTF-8', true);?>
"
                     data-voto="<?php echo $_smarty_tpl->getValue('rec')->getVoto();?>
"
                     data-data="<?php echo $_smarty_tpl->getValue('rec')->getData()->format('M Y');?>
"
                     data-nome="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getCliente()->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo substr((string) $_smarty_tpl->getValue('rec')->getCliente()->getCognome(), (int) 0, (int) 1);?>
."
                     data-iniziali="<?php echo substr((string) $_smarty_tpl->getValue('rec')->getCliente()->getNome(), (int) 0, (int) 1);
echo substr((string) $_smarty_tpl->getValue('rec')->getCliente()->getCognome(), (int) 0, (int) 1);?>
"
                     data-stile="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getStile(), ENT_QUOTES, 'UTF-8', true);?>
"
                     data-artista="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getTatuatore()->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getTatuatore()->getCognome(), ENT_QUOTES, 'UTF-8', true);?>
"
                     data-foto="<?php if ($_smarty_tpl->getValue('fotoArr')) {
echo htmlspecialchars((string)json_encode($_smarty_tpl->getValue('fotoArr')), ENT_QUOTES, 'UTF-8', true);
}?>">

                    <div class="st-rev-content">
                        <div class="st-rev-top">
                            <span class="st-rev-av">
                                <?php echo substr((string) $_smarty_tpl->getValue('rec')->getCliente()->getNome(), (int) 0, (int) 1);
echo substr((string) $_smarty_tpl->getValue('rec')->getCliente()->getCognome(), (int) 0, (int) 1);?>

                            </span>
                            <div class="st-rev-meta">
                                <div class="st-rev-nameline">
                                    <span class="st-rev-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getCliente()->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo substr((string) $_smarty_tpl->getValue('rec')->getCliente()->getCognome(), (int) 0, (int) 1);?>
.</span>
                                    <span class="st-rev-badge">✓ verificato</span>
                                </div>
                                <div class="st-rev-stars">
                                    <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
if ($_smarty_tpl->getValue('i') <= $_smarty_tpl->getValue('rec')->getVoto()) {?>★<?php } else { ?><span class="st-star-off">★</span><?php }
}
}
?>
                                </div>
                            </div>
                            <span class="st-rev-date"><?php echo $_smarty_tpl->getValue('rec')->getData()->format('M Y');?>
</span>
                        </div>
                        <div class="st-rev-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
</div>
                        <p class="st-rev-text"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getDescrizione(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                        <div class="st-rev-footer">
                            <span class="st-rev-stile"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getStile(), ENT_QUOTES, 'UTF-8', true);?>
</span>
                            · <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getTatuatore()->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getTatuatore()->getCognome(), ENT_QUOTES, 'UTF-8', true);?>

                        </div>
                    </div>

                    <div class="st-rev-photo-box rec-photo-clickable" data-foto="<?php if ($_smarty_tpl->getValue('fotoArr')) {
echo htmlspecialchars((string)json_encode($_smarty_tpl->getValue('fotoArr')), ENT_QUOTES, 'UTF-8', true);
}?>">
                        <?php if ($_smarty_tpl->getValue('fotoArr')) {?>
                            <img src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('fotoArr')[0], ENT_QUOTES, 'UTF-8', true);?>
" alt="Foto tatuaggio" class="st-rev-photo">
                            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('fotoArr')) > 1) {?>
                                <span class="st-rev-photo-count">+<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('fotoArr'));?>
</span>
                            <?php }?>
                        <?php } else { ?>
                            <span class="st-rev-photo-ph"><?php echo substr((string) $_smarty_tpl->getValue('rec')->getTatuatore()->getNome(), (int) 0, (int) 1);
echo substr((string) $_smarty_tpl->getValue('rec')->getTatuatore()->getCognome(), (int) 0, (int) 1);?>
</span>
                        <?php }?>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>

                <?php if ($_smarty_tpl->getValue('totPagine') > 1) {?>
            <nav class="rec-pagination">
                <?php if ($_smarty_tpl->getValue('pagina') > 1) {?>
                    <a href="/visualizza_recensioni?id=<?php echo $_smarty_tpl->getValue('studioId');?>
&page=<?php echo $_smarty_tpl->getValue('pagina')-1;?>
" class="rec-pag-btn">← Prec</a>
                <?php } else { ?>
                    <span class="rec-pag-btn rec-pag-disabled">← Prec</span>
                <?php }?>

                <?php
$_smarty_tpl->assign('p', null);$_smarty_tpl->tpl_vars['p']->step = 1;$_smarty_tpl->tpl_vars['p']->total = (int) ceil(($_smarty_tpl->tpl_vars['p']->step > 0 ? $_smarty_tpl->getValue('totPagine')+1 - (1) : 1-($_smarty_tpl->getValue('totPagine'))+1)/abs($_smarty_tpl->tpl_vars['p']->step));
if ($_smarty_tpl->tpl_vars['p']->total > 0) {
for ($_smarty_tpl->tpl_vars['p']->value = 1, $_smarty_tpl->tpl_vars['p']->iteration = 1;$_smarty_tpl->tpl_vars['p']->iteration <= $_smarty_tpl->tpl_vars['p']->total;$_smarty_tpl->tpl_vars['p']->value += $_smarty_tpl->tpl_vars['p']->step, $_smarty_tpl->tpl_vars['p']->iteration++) {
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration === 1;$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration === $_smarty_tpl->tpl_vars['p']->total;?>
                    <?php if ($_smarty_tpl->getValue('p') == $_smarty_tpl->getValue('pagina')) {?>
                        <span class="rec-pag-btn rec-pag-active"><?php echo $_smarty_tpl->getValue('p');?>
</span>
                    <?php } else { ?>
                        <a href="/visualizza_recensioni?id=<?php echo $_smarty_tpl->getValue('studioId');?>
&page=<?php echo $_smarty_tpl->getValue('p');?>
" class="rec-pag-btn"><?php echo $_smarty_tpl->getValue('p');?>
</a>
                    <?php }?>
                <?php }
}
?>

                <?php if ($_smarty_tpl->getValue('pagina') < $_smarty_tpl->getValue('totPagine')) {?>
                    <a href="/visualizza_recensioni?id=<?php echo $_smarty_tpl->getValue('studioId');?>
&page=<?php echo $_smarty_tpl->getValue('pagina')+1;?>
" class="rec-pag-btn">Succ →</a>
                <?php } else { ?>
                    <span class="rec-pag-btn rec-pag-disabled">Succ →</span>
                <?php }?>
            </nav>
        <?php }?>

    <?php } else { ?>
        <p class="st-muted" style="margin-top:40px;">Ancora nessuna recensione per questo studio.</p>
    <?php }?>

</div>

<div id="rec-modal" class="rec-modal-backdrop" style="display:none">
    <div class="rec-modal-card">
        <button class="rec-modal-close" id="rec-modal-close">✕</button>
        <div class="rec-modal-top">
            <span class="st-rev-av rec-modal-av" id="modal-iniziali"></span>
            <div class="st-rev-meta">
                <div class="st-rev-nameline">
                    <span class="st-rev-name" id="modal-nome"></span>
                    <span class="st-rev-badge">✓ verificato</span>
                </div>
                <div class="st-rev-stars" id="modal-stelle"></div>
            </div>
            <span class="st-rev-date" id="modal-data"></span>
        </div>
        <div class="rec-modal-photos" id="modal-photos"></div>
        <div class="st-rev-title" id="modal-titolo" style="font-size:16px;margin-bottom:8px;"></div>
        <p class="st-rev-text" id="modal-testo"></p>
        <div class="st-rev-footer">
            <span class="st-rev-stile" id="modal-stile"></span>
            · <span id="modal-artista"></span>
        </div>
    </div>
</div>

<div id="foto-modal" class="foto-modal-backdrop" style="display:none">
    <button class="foto-modal-close" id="foto-modal-close">✕</button>
    <button class="foto-nav foto-nav-prev" id="foto-prev">‹</button>
    <div class="foto-modal-img-wrap">
        <img id="foto-modal-img" src="" alt="Foto tatuaggio">
    </div>
    <button class="foto-nav foto-nav-next" id="foto-next">›</button>
    <span class="foto-modal-counter" id="foto-counter"></span>
</div>

<?php echo '<script'; ?>
>
(function () {
    /* ── dati ── */
    var items = document.querySelectorAll('.rec-item');
    var recModal = document.getElementById('rec-modal');
    var fotoModal = document.getElementById('foto-modal');
    var currentFoto = [];
    var fotoIdx = 0;

    /* helpers */
    function stelle(n) {
        var s = '';
        for (var i = 1; i <= 5; i++) {
            s += i <= n ? '★' : '<span class="st-star-off">★</span>';
        }
        return s;
    }

    /* apri modal recensione */
    function apriRecensione(el) {
        document.getElementById('modal-iniziali').textContent = el.dataset.iniziali;
        document.getElementById('modal-nome').textContent     = el.dataset.nome;
        document.getElementById('modal-stelle').innerHTML     = stelle(parseInt(el.dataset.voto));
        document.getElementById('modal-data').textContent     = el.dataset.data;
        document.getElementById('modal-titolo').textContent   = el.dataset.titolo;
        document.getElementById('modal-testo').textContent    = el.dataset.testo;
        document.getElementById('modal-stile').textContent    = el.dataset.stile;
        document.getElementById('modal-artista').textContent  = el.dataset.artista;

        var foto = el.dataset.foto ? JSON.parse(el.dataset.foto) : [];
        var box = document.getElementById('modal-photos');
        box.innerHTML = '';
        foto.forEach(function (src, idx) {
            var img = document.createElement('img');
            img.src = src;
            img.className = 'rec-modal-photo';
            img.addEventListener('click', function (e) { e.stopPropagation(); apriFoto(foto, idx); });
            box.appendChild(img);
        });

        recModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    /* click su card → apri modal recensione */
    items.forEach(function (el) {
        el.addEventListener('click', function (e) {
            if (e.target.closest('.rec-photo-clickable')) return;
            apriRecensione(el);
        });
    });

    /* click su foto-box → apri lightbox foto */
    document.querySelectorAll('.rec-photo-clickable').forEach(function (box) {
        box.addEventListener('click', function (e) {
            e.stopPropagation();
            var foto = box.dataset.foto ? JSON.parse(box.dataset.foto) : [];
            if (foto.length) apriFoto(foto, 0);
        });
    });

    /* modal recensione — chiusura */
    document.getElementById('rec-modal-close').addEventListener('click', chiudiRec);
    recModal.addEventListener('click', function (e) { if (e.target === recModal) chiudiRec(); });
    function chiudiRec() { recModal.style.display = 'none'; document.body.style.overflow = ''; }

    /* lightbox foto */
    function apriFoto(foto, idx) {
        currentFoto = foto;
        fotoIdx = idx;
        aggiornaFoto();
        fotoModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    function aggiornaFoto() {
        document.getElementById('foto-modal-img').src = currentFoto[fotoIdx];
        document.getElementById('foto-counter').textContent = (fotoIdx + 1) + ' / ' + currentFoto.length;
        document.getElementById('foto-prev').style.display = fotoIdx > 0 ? '' : 'none';
        document.getElementById('foto-next').style.display = fotoIdx < currentFoto.length - 1 ? '' : 'none';
    }
    document.getElementById('foto-modal-close').addEventListener('click', chiudiFoto);
    fotoModal.addEventListener('click', function (e) { if (e.target === fotoModal) chiudiFoto(); });
    function chiudiFoto() { fotoModal.style.display = 'none'; document.body.style.overflow = ''; }
    document.getElementById('foto-prev').addEventListener('click', function (e) { e.stopPropagation(); if (fotoIdx > 0) { fotoIdx--; aggiornaFoto(); } });
    document.getElementById('foto-next').addEventListener('click', function (e) { e.stopPropagation(); if (fotoIdx < currentFoto.length - 1) { fotoIdx++; aggiornaFoto(); } });

    /* tasto ESC */
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') { chiudiRec(); chiudiFoto(); }
    });
})();
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
