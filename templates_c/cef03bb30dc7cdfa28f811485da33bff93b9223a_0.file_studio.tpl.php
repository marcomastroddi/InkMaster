<?php
/* Smarty version 5.8.0, created on 2026-06-25 10:46:45
  from 'file:pages/ricerca/studio.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d0715ceaf45_17678972',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cef03bb30dc7cdfa28f811485da33bff93b9223a' => 
    array (
      0 => 'pages/ricerca/studio.tpl',
      1 => 1782384344,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3d0715ceaf45_17678972 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13488381136a3d0715c60c63_77742596', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9906373266a3d0715c76d40_62189217', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2759292076a3d0715c77767_33398303', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_13488381136a3d0715c60c63_77742596 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
echo htmlspecialchars((string)$_smarty_tpl->getValue('data')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_9906373266a3d0715c76d40_62189217 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
?>

    <link rel="stylesheet" href="/CSS/studio.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_2759292076a3d0715c77767_33398303 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
?>

<div class="st-page">
        <div class="st-page">
    <div class="st-bg">
        <div class="st-blob st-blob-1"></div>
        <div class="st-blob st-blob-2"></div>
    </div>

    <div class="st-strip">
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data')->getPubblicazioni(), 'pub');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('pub')->value) {
$foreach0DoElse = false;
?>
      <div class="st-strip-slot">
        <img src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getPercorsoImmagine(), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
">
        <div class="st-strip-label"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
</div>
      </div>
    <?php
}
if ($foreach0DoElse) {
?>
      <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
        <div class="st-strip-slot st-strip-ph">
          <div class="st-strip-ph-inner">
            <span class="st-strip-ph-icon">🖼</span>
            <span class="st-strip-ph-text">Portfolio</span>
          </div>
        </div>
      <?php }
}
?>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
  </div>

    <div class="st-layout">

        <aside class="st-sidebar">
      <div class="st-sidebar-card">

        <div class="st-avatar"><?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('data')->getNome(), (int) 0, (int) 2) ?? '', 'UTF-8');?>
</div>
        <h1 class="st-nome"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
</h1>
        <div class="st-city">📍 <?php echo $_smarty_tpl->getValue('data')->getPosizione()->value;?>
</div>

        <?php if ($_smarty_tpl->getValue('n_recensioni') > 0) {?>
          <div class="st-rating">
            <span class="st-rating-stars">
              <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
if ($_smarty_tpl->getValue('i') <= round((float) $_smarty_tpl->getValue('media_voto'), (int) 0, (int) 1)) {?>★<?php } else { ?><span class="st-star-off">★</span><?php }
}
}
?>
            </span>
            <span class="st-rating-num"><?php echo $_smarty_tpl->getValue('media_voto');?>
</span>
            <span class="st-rating-count">(<?php echo $_smarty_tpl->getValue('n_recensioni');?>
)</span>
          </div>
        <?php }?>

        <div class="st-tags">
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data')->getTatuatori(), 'tat');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('tat')->value) {
$foreach1DoElse = false;
?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tat')->getStili(), 'st');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('st')->value) {
$foreach2DoElse = false;
?>
              <span class="st-tag"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('st')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
</span>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>

        <div class="st-divider"></div>

        <div class="st-appt-box">
          <h3 class="st-appt-title">Richiedi appuntamento</h3>
          <?php if ($_smarty_tpl->getValue('data')->getTelefono()) {?>
            <div class="st-contact-row"><span class="st-ci">📞</span><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')->getTelefono(), ENT_QUOTES, 'UTF-8', true);?>
</div>
          <?php }?>
          <div class="st-contact-row"><span class="st-ci">✉</span><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')->getEmail(), ENT_QUOTES, 'UTF-8', true);?>
</div>
          <a href="/scegli_tatuatore?id=<?php echo $_smarty_tpl->getValue('data')->getId();?>
" class="st-cta">Prenota</a>
        </div>

      </div>
    </aside>

        <main class="st-main">

            <section class="st-section">
        <h2 class="st-h2">About us</h2>
        <?php if ($_smarty_tpl->getValue('data')->getDescrizione()) {?>
          <p class="st-desc"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')->getDescrizione(), ENT_QUOTES, 'UTF-8', true);?>
</p>
        <?php } else { ?>
          <p class="st-muted">Nessuna descrizione disponibile.</p>
        <?php }?>
      </section>

            <section class="st-section">
        <h2 class="st-h2">Il nostro Team</h2>
        <div class="st-team">
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data')->getTatuatori(), 'tat');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('tat')->value) {
$foreach3DoElse = false;
?>
            <div class="st-member">
              <div class="st-member-av"><?php echo substr((string) $_smarty_tpl->getValue('tat')->getNome(), (int) 0, (int) 1);
echo substr((string) $_smarty_tpl->getValue('tat')->getCognome(), (int) 0, (int) 1);?>
</div>
              <div class="st-member-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('tat')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('tat')->getCognome(), ENT_QUOTES, 'UTF-8', true);?>
</div>
              <div class="st-member-tags">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tat')->getStili(), 'st');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('st')->value) {
$foreach4DoElse = false;
?>
                  <span class="st-tag st-tag--sm"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('st')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
</span>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
              </div>
            </div>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
      </section>

            <section class="st-section">
        <h2 class="st-h2">Orari di apertura</h2>
        <div class="st-orari-card">
                    <?php if ($_smarty_tpl->getValue('data')->getOrariApertura()) {?>
            <?php $_smarty_tpl->assign('orariCh', $_smarty_tpl->getValue('data')->getOrariChiusura(), false, NULL);?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data')->getOrariApertura(), 'apertura', false, 'giorno');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('giorno')->value => $_smarty_tpl->getVariable('apertura')->value) {
$foreach5DoElse = false;
?>
              <?php $_smarty_tpl->assign('chiusura', (($tmp = $_smarty_tpl->getValue('orariCh')[$_smarty_tpl->getValue('giorno')] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), false, NULL);?>
              <div class="st-orari-row <?php if ($_smarty_tpl->getValue('chiusura') === 'Chiuso') {?>st-orari-chiuso<?php }?>">
                <span class="st-orari-day"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('giorno'), ENT_QUOTES, 'UTF-8', true);?>
</span>
                <?php if ($_smarty_tpl->getValue('chiusura') === 'Chiuso') {?>
                  <span class="st-orari-time st-muted-inline">—</span>
                  <span class="st-orari-badge st-badge-chiuso">Chiuso</span>
                <?php } else { ?>
                  <span class="st-orari-time"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('apertura'), ENT_QUOTES, 'UTF-8', true);?>
 – <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('chiusura'), ENT_QUOTES, 'UTF-8', true);?>
</span>
                  <span class="st-orari-badge st-badge-aperto">● Aperto</span>
                <?php }?>
              </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          <?php } else { ?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, array('Lun','Mar','Mer','Gio','Ven'), 'g');
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('g')->value) {
$foreach6DoElse = false;
?>
              <div class="st-orari-row">
                <span class="st-orari-day"><?php echo $_smarty_tpl->getValue('g');?>
</span>
                <span class="st-orari-time">9:00 – 18:00</span>
                <span class="st-orari-badge st-badge-aperto">● Aperto</span>
              </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <div class="st-orari-row">
              <span class="st-orari-day">Sab</span>
              <span class="st-orari-time">9:00 – 14:00</span>
              <span class="st-orari-badge st-badge-aperto">● Aperto</span>
            </div>
            <div class="st-orari-row st-orari-chiuso">
              <span class="st-orari-day">Dom</span>
              <span class="st-orari-time st-muted-inline">—</span>
              <span class="st-orari-badge st-badge-chiuso">Chiuso</span>
            </div>
          <?php }?>
        </div>
      </section>

            <section class="st-section">
        <div class="st-reviews-head">
          <h2 class="st-h2">Recensioni</h2>
          <a href="/visualizza_recensioni?id=<?php echo $_smarty_tpl->getValue('data')->getId();?>
" class="st-reviews-link">Vedi tutte →</a>
        </div>
        <?php if ($_smarty_tpl->getValue('recensioni')) {?>
          <div class="st-reviews-list">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recensioni'), 'rec');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('rec')->value) {
$foreach7DoElse = false;
?>
              <div class="st-review">
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
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          </div>
        <?php } else { ?>
          <p class="st-muted">Ancora nessuna recensione.</p>
        <?php }?>
        <div style="margin-top:20px">
          <a href="/avvia_recensione?id=<?php echo $_smarty_tpl->getValue('data')->getId();?>
" class="st-cta-outline">✍ Scrivi una recensione</a>
        </div>
      </section>

    </main>
  </div>

</div>
<?php
}
}
/* {/block "content"} */
}
