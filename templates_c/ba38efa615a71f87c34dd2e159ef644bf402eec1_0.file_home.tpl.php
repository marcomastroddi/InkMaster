<?php
/* Smarty version 5.8.0, created on 2026-06-24 18:17:46
  from 'file:pages/ricerca/home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3c032ad42ec8_24937353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba38efa615a71f87c34dd2e159ef644bf402eec1' => 
    array (
      0 => 'pages/ricerca/home.tpl',
      1 => 1782317858,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3c032ad42ec8_24937353 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19663859706a3c032ad22af2_89514019', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12401108666a3c032ad254b2_52624299', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4069860686a3c032ad25a44_49834536', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_19663859706a3c032ad22af2_89514019 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>
Home — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_12401108666a3c032ad254b2_52624299 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>

    <link rel="stylesheet" href="/CSS/home.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_4069860686a3c032ad25a44_49834536 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/ricerca';
?>


<div class="im-page">

    <div class="im-hero">
    <div class="im-hero-bg">
      <div class="im-blob im-blob-1"></div>
      <div class="im-blob im-blob-2"></div>
      <svg class="im-lines" viewBox="0 0 1440 620" preserveAspectRatio="none">
        <path class="im-l1" d="M-60,140 C 320,30 520,290 780,190 S 1220,50 1520,210"></path>
        <path class="im-l2" d="M-60,300 C 280,200 560,420 820,320 S 1180,200 1520,360"></path>
        <path class="im-l3" d="M-60,460 C 360,360 540,560 800,470 S 1240,360 1520,500"></path>
        <path class="im-l4" d="M-60,60 C 300,140 620,-10 880,90 S 1200,180 1520,90"></path>
      </svg>
    </div>

    <div class="im-hero-content">
      <div class="im-eyebrow">Inchiostro che resta · prenotazione facile</div>
      <h1 class="im-title">Cerca il tuo tatuatore a
        <a href="/cerca" class="im-city"><?php echo (($tmp = $_smarty_tpl->getValue('citta_corrente') ?? null)===null||$tmp==='' ? 'Roma' ?? null : $tmp);?>
 <span class="im-caret">▾</span>
          <span class="im-underline"></span>
        </a>
      </h1>

      <form action="/avvia_ricerca" method="get" class="im-search">
        <div class="im-search-row">
          <div class="im-search-field">
            <div class="im-search-box">
              <span class="im-search-icon">⌕</span>
              <input type="text" name="testo" autocomplete="off" placeholder="es. DanInk — nome, studio o parola chiave…">
            </div>
          </div>
          <button type="submit" class="im-search-submit">Cerca</button>
        </div>
      </form>

      <div class="im-styles">
        <div class="im-styles-label">Sfoglia per stile</div>
        <div class="im-chips">
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('stili'), 'stile');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('stile')->value) {
$foreach0DoElse = false;
?>
            <a href="/seleziona_stile?stile=<?php echo rawurlencode((string)$_smarty_tpl->getValue('stile')->getNome());?>
" class="im-chip"><?php echo $_smarty_tpl->getValue('stile')->getNome();?>
</a>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
      </div>
    </div>
  </div>

    <div class="im-band">
    <div class="im-ticker">
      <?php $_smarty_tpl->assign('citta_ticker', array('ROMA','MILANO','NAPOLI','TORINO','BOLOGNA','FIRENZE','PALERMO','GENOVA','VENEZIA','BARI','POPOLI','AVEZZANO','PESCARA','MONTESILVANO','AGNONE','ANTROSANO','CORVARO','L\'QUILA'), false, NULL);?>
      <?php
$_smarty_tpl->tpl_vars['__smarty_section_rep'] = new \Smarty\Variable(array());
if (true) {
for ($__section_rep_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_rep']->value['index'] = 0; $__section_rep_0_iteration <= 2; $__section_rep_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_rep']->value['index']++){
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('citta_ticker'), 'c');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('c')->value) {
$foreach1DoElse = false;
?><span><?php echo $_smarty_tpl->getValue('c');?>
</span><?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}
}
?>
    </div>
  </div>

    <div class="im-section">
    <div class="im-section-head">
      <h2 class="im-h2">Tatuatori suggeriti</h2>
      <a href="/avvia_ricerca" class="im-link">Vedi tutti →</a>
    </div>
    <div class="im-grid">
      <?php $_smarty_tpl->assign('mostrati', 0, false, NULL);?>
      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('studi'), 'studio');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('studio')->value) {
$foreach2DoElse = false;
?>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('studio')->getTatuatori(), 'tatuatore');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('tatuatore')->value) {
$foreach3DoElse = false;
?>
          <?php if ($_smarty_tpl->getValue('mostrati') < 5) {?>
            <a href="/scegli_studio?id=<?php echo $_smarty_tpl->getValue('studio')->getId();?>
" class="im-card">
              <div class="im-avatar"><?php echo substr((string) $_smarty_tpl->getValue('tatuatore')->getNome(), (int) 0, (int) 1);
echo substr((string) $_smarty_tpl->getValue('tatuatore')->getCognome(), (int) 0, (int) 1);?>
</div>
              <div class="im-card-name"><?php echo $_smarty_tpl->getValue('tatuatore')->getNome();?>
 <?php echo $_smarty_tpl->getValue('tatuatore')->getCognome();?>
</div>
              <div class="im-card-studio"><?php echo $_smarty_tpl->getValue('studio')->getNome();?>
</div>
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tatuatore')->getStili(), 'st');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('st')->value) {
$foreach4DoElse = false;
?>
                <div class="im-tag"><?php echo $_smarty_tpl->getValue('st')->getNome();?>
</div>
                <?php break 1;?>
              <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
              <div class="im-card-city"><?php echo $_smarty_tpl->getValue('studio')->getPosizione()->value;?>
</div>
            </a>
            <?php $_smarty_tpl->assign('mostrati', $_smarty_tpl->getValue('mostrati')+1, false, NULL);?>
          <?php }?>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
    <div class="im-more-wrap">
      <a href="/avvia_ricerca" class="im-more">Altro »</a>
    </div>
  </div>

    <div class="im-reviews">
    <h2 class="im-reviews-title">Recensioni</h2>
    <div class="im-revscroll">
      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recensioni'), 'rec');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('rec')->value) {
$foreach5DoElse = false;
?>
        <div class="im-review">
          <div class="im-review-main">
            <div class="im-review-top">
              <span class="im-review-avatar"><?php echo substr((string) $_smarty_tpl->getValue('rec')->getCliente()->getNome(), (int) 0, (int) 1);
echo substr((string) $_smarty_tpl->getValue('rec')->getCliente()->getCognome(), (int) 0, (int) 1);?>
</span>
              <div>
                <div class="im-review-name-row">
                  <span class="im-review-name"><?php echo $_smarty_tpl->getValue('rec')->getCliente()->getNome();?>
 <?php echo substr((string) $_smarty_tpl->getValue('rec')->getCliente()->getCognome(), (int) 0, (int) 1);?>
.</span>
                  <span class="im-badge">✓ verificato</span>
                </div>
                <div class="im-stars">
                  <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
if ($_smarty_tpl->getValue('i') <= $_smarty_tpl->getValue('rec')->getVoto()) {?>★<?php } else { ?><span class="im-star-off">★</span><?php }
}
}
?>
                </div>
              </div>
            </div>
            <div class="im-review-title"><?php echo $_smarty_tpl->getValue('rec')->getTitolo();?>
</div>
            <p class="im-review-text"><?php echo $_smarty_tpl->getValue('rec')->getDescrizione();?>
</p>
            <div class="im-review-meta">
              <?php echo $_smarty_tpl->getValue('rec')->getStile();?>
 · <?php echo $_smarty_tpl->getValue('rec')->getTatuatore()->getNome();?>
 <?php echo $_smarty_tpl->getValue('rec')->getTatuatore()->getCognome();?>
 · <?php echo $_smarty_tpl->getValue('rec')->getData()->format('M Y');?>

            </div>
          </div>
          <div class="im-review-photo im-hatch">
            <?php if ($_smarty_tpl->getValue('rec')->getFoto()) {?>
              <img src="<?php echo $_smarty_tpl->getValue('rec')->getFoto();?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
">
            <?php } else { ?>
              <span class="im-review-mono"><?php echo substr((string) $_smarty_tpl->getValue('rec')->getTatuatore()->getNome(), (int) 0, (int) 1);
echo substr((string) $_smarty_tpl->getValue('rec')->getTatuatore()->getCognome(), (int) 0, (int) 1);?>
</span>
            <?php }?>
          </div>
        </div>
      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
    <div class="im-scroll-hint">‹ scorri per vedere tutte le recensioni ›</div>
  </div>

</div>
<?php
}
}
/* {/block "content"} */
}
