<?php
/* Smarty version 5.8.0, created on 2026-06-26 13:23:44
  from 'file:pages/ricerca/studio.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e7d60a5d029_36692395',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cef03bb30dc7cdfa28f811485da33bff93b9223a' => 
    array (
      0 => 'pages/ricerca/studio.tpl',
      1 => 1782480110,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/overlay_recensione.tpl' => 1,
  ),
))) {
function content_6a3e7d60a5d029_36692395 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_14884970306a3e7d6083fde3_88852425', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5324169746a3e7d60850313_22992476', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4031030726a3e7d608545c7_28142768', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_14884970306a3e7d6083fde3_88852425 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
echo htmlspecialchars((string)$_smarty_tpl->getValue('data')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_5324169746a3e7d60850313_22992476 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
?>

    <link rel="stylesheet" href="/CSS/studio.css">
    <link rel="stylesheet" href="/CSS/recensione.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_4031030726a3e7d608545c7_28142768 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\ricerca';
?>

<div class="st-bg">
    <div class="st-blob st-blob-1"></div>
    <div class="st-blob st-blob-2"></div>
    <svg class="st-tribal" viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice">
        <g class="st-fish st-f1">
            <path d="M 70,0 C 65,-30 15,-30 0,0 C 15,30 65,30 70,0"/>
            <path d="M 2,0 L -22,-18 L -8,0 L -22,18 Z"/>
            <circle cx="52" cy="-7" r="3.5"/>
            <path d="M 35,-29 C 44,-46 60,-41 64,-28"/>
        </g>
        <g class="st-fish st-f2">
            <path d="M 0,0 C 5,-38 55,-38 70,0 C 55,38 5,38 0,0"/>
            <path d="M 68,0 L 92,-22 L 78,0 L 92,22 Z"/>
            <circle cx="18" cy="-9" r="4.5"/>
            <path d="M 35,-37 C 46,-55 62,-50 66,-36"/>
        </g>
        <g class="st-fish st-f3">
            <path d="M 50,0 C 46,-20 10,-20 0,0 C 10,20 46,20 50,0"/>
            <path d="M 1,0 L -16,-13 L -6,0 L -16,13 Z"/>
            <circle cx="37" cy="-5" r="2.5"/>
        </g>
        <g class="st-fish st-f4">
            <path d="M 60,0 C 56,-25 12,-25 0,0 C 12,25 56,25 60,0"/>
            <path d="M 1,0 L -18,-15 L -7,0 L -18,15 Z"/>
            <circle cx="44" cy="-6" r="3"/>
            <path d="M 28,-24 C 36,-38 50,-35 54,-24"/>
        </g>
        <g class="st-fish st-f5">
            <path d="M 42,0 C 38,-17 8,-17 0,0 C 8,17 38,17 42,0"/>
            <path d="M 1,0 L -13,-11 L -5,0 L -13,11 Z"/>
            <circle cx="31" cy="-4" r="2"/>
        </g>
        <g class="st-fish st-f6">
            <path d="M 0,0 C 4,-32 48,-32 62,0 C 48,32 4,32 0,0"/>
            <path d="M 60,0 L 82,-19 L 70,0 L 82,19 Z"/>
            <circle cx="14" cy="-8" r="3.5"/>
        </g>
        <path class="st-w1" d="M-100,180 C 200,100 450,280 750,160 S 1150,80 1540,200"/>
        <path class="st-w2" d="M-100,340 C 180,240 480,440 780,300 S 1180,200 1540,360"/>
        <path class="st-w3" d="M-100,500 C 220,400 500,580 800,460 S 1200,360 1540,520"/>
        <path class="st-w4" d="M-100,650 C 160,560 460,720 760,600 S 1160,500 1540,660"/>
        <path class="st-w5" d="M-100,820 Q200,760 500,820 Q800,880 1100,820 Q1300,760 1600,820"/>
        <path class="st-w6" d="M-100,860 Q200,800 500,860 Q800,920 1100,860 Q1300,800 1600,860"/>
    </svg>
</div>

<?php $_smarty_tpl->assign('pubVisibili', $_smarty_tpl->getValue('pub_visibili'), false, NULL);
$_smarty_tpl->assign('pubTotali', $_smarty_tpl->getValue('pub_totali'), false, NULL);?>

<div class="st-strip">
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('pubVisibili'), 'pub');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('pub')->value) {
$foreach0DoElse = false;
?>
        <div class="st-strip-slot">
            <a href="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getPercorsoImmagine(), ENT_QUOTES, 'UTF-8', true);?>
" target="_blank">
                <img src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getPercorsoImmagine(), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
">
                <div class="st-strip-label"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
</div>
            </a>
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
<?php if ($_smarty_tpl->getValue('pubTotali') > 0) {?>
<div class="st-strip-footer">
    <a href="/portfolio_pubblico?id=<?php echo $_smarty_tpl->getValue('data')->getId();?>
" class="st-strip-portfolio-btn">
        Vedi portfolio <?php if ($_smarty_tpl->getValue('pubTotali') > 4) {?>+<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('math')->handle(array('equation'=>"x-4",'x'=>$_smarty_tpl->getValue('pubTotali')), $_smarty_tpl);
}?>
    </a>
</div>
<?php }?>

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
                <a href="/prenota?id=<?php echo $_smarty_tpl->getValue('data')->getId();?>
" class="st-cta">Prenota</a>
            </div>

            <?php if ($_smarty_tpl->getValue('_sessione')['ruolo'] == 'cliente') {?>
            <div class="st-divider"></div>
            <a href="/form_segnalazione?tipo=studio&id=<?php echo $_smarty_tpl->getValue('data')->getId();?>
"
               style="display:block;text-align:center;font-size:11px;font-weight:700;color:#4b534f;text-decoration:none;padding:6px 0;letter-spacing:.05em;transition:color .2s;"
               onmouseover="this.style.color='#e05252'" onmouseout="this.style.color='#4b534f'">
                ⚑ Segnala questo studio
            </a>
            <?php }?>
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
                        <a href="/visualizzaRecensione?id=<?php echo $_smarty_tpl->getValue('rec')->getId();?>
" class="st-review">
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
                            <div class="st-rev-photo-box">
                                <?php $_smarty_tpl->assign('fotoArr', $_smarty_tpl->getValue('rec')->getFotoArray(), false, NULL);?>
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
                        </a>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
            <?php } else { ?>
                <p class="st-muted">Ancora nessuna recensione.</p>
            <?php }?>
            <div style="margin-top:20px">
                <a href="/avviaRecensione?id=<?php echo $_smarty_tpl->getValue('data')->getId();?>
" class="st-cta-outline">✍ Scrivi una recensione</a>
            </div>
        </section>

    </main>
</div>

<?php if ($_smarty_tpl->getValue('mostra_overlay')) {?>
<div class="pb-backdrop">
    <div class="pb-card">

        <div class="pb-card-header">
            <span class="pb-studio-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
</span>
            <a href="/scegli_studio?id=<?php echo $_smarty_tpl->getValue('data')->getId();?>
" class="pb-close">✕</a>
        </div>

        <?php if (!$_smarty_tpl->getValue('overlay_step') || $_smarty_tpl->getValue('overlay_step') === 'tatuatore') {?>
            <div class="pb-step-indicator">
                <span class="pb-dot pb-dot--active"></span>
                <span class="pb-dot"></span>
                <span class="pb-dot"></span>
                <span class="pb-dot"></span>
            </div>
            <p class="pb-title">Scegli uno di noi</p>
            <div class="pb-grid">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tatuatori'), 't');
$foreach8DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('t')->value) {
$foreach8DoElse = false;
?>
                    <a href="/scegliTatuatore?id=<?php echo $_smarty_tpl->getValue('t')->getId();?>
" class="pb-item">
                        <div class="pb-avatar"><?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('t')->getNome(), (int) 0, (int) 1) ?? '', 'UTF-8');
echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('t')->getCognome(), (int) 0, (int) 1) ?? '', 'UTF-8');?>
</div>
                        <div class="pb-item-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('t')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('t')->getCognome(), ENT_QUOTES, 'UTF-8', true);?>
</div>
                    </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
            <p class="pb-hint">Clicca su un tatuatore per proseguire</p>

        <?php } elseif ($_smarty_tpl->getValue('overlay_step') === 'stile') {?>
            <div class="pb-step-indicator">
                <span class="pb-dot pb-dot--done"></span>
                <span class="pb-dot pb-dot--active"></span>
                <span class="pb-dot"></span>
                <span class="pb-dot"></span>
            </div>
            <p class="pb-title">Scegli tra i miei stili</p>
            <div class="pb-grid">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('stili'), 's');
$foreach9DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('s')->value) {
$foreach9DoElse = false;
?>
                    <a href="/scegliStile?id=<?php echo $_smarty_tpl->getValue('s')->getId();?>
" class="pb-item">
                        <div class="pb-item-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('s')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
</div>
                    </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
            <p class="pb-hint">Clicca su uno stile per proseguire</p>

        <?php } elseif ($_smarty_tpl->getValue('overlay_step') === 'data') {?>
            <div class="pb-step-indicator">
                <span class="pb-dot pb-dot--done"></span>
                <span class="pb-dot pb-dot--done"></span>
                <span class="pb-dot pb-dot--active"></span>
                <span class="pb-dot"></span>
            </div>
            <p class="pb-title">Quando sei libero?</p>
            <form action="/scegliData" method="post" class="pb-form">
                <input type="date" name="data" class="pb-date-input" min="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),'%Y-%m-%d');?>
">
                <div class="pb-nav">
                    <button type="submit" class="pb-btn">Avanti →</button>
                </div>
            </form>

        <?php } elseif ($_smarty_tpl->getValue('overlay_step') === 'descrizione') {?>
            <div class="pb-step-indicator">
                <span class="pb-dot pb-dot--done"></span>
                <span class="pb-dot pb-dot--done"></span>
                <span class="pb-dot pb-dot--done"></span>
                <span class="pb-dot pb-dot--active"></span>
            </div>
            <p class="pb-title">Descrivi la tua idea</p>
            <form action="/mostraRiepilogo" method="post" class="pb-form">
                <textarea name="descrizione" class="pb-textarea" placeholder="Es. vorrei un tatuaggio tribale sul braccio sinistro..." rows="5"></textarea>
                <div class="pb-nav">
                    <button type="submit" class="pb-btn">Vedi riepilogo →</button>
                </div>
            </form>

        <?php } elseif ($_smarty_tpl->getValue('overlay_step') === 'riepilogo') {?>
            <p class="pb-title">Riepilogo prenotazione</p>
            <div class="pb-riepilogo">
                <div class="pb-riepilogo-row">
                    <span class="pb-riepilogo-label">Membro team</span>
                    <span class="pb-riepilogo-value"><?php echo $_smarty_tpl->getValue('riepilogo')['tatuatore'];?>
</span>
                </div>
                <div class="pb-riepilogo-row">
                    <span class="pb-riepilogo-label">Stile</span>
                    <span class="pb-riepilogo-value"><?php echo $_smarty_tpl->getValue('riepilogo')['stile'];?>
</span>
                </div>
                <div class="pb-riepilogo-row">
                    <span class="pb-riepilogo-label">Giorno</span>
                    <span class="pb-riepilogo-value"><?php echo $_smarty_tpl->getValue('riepilogo')['data'];?>
</span>
                </div>
                <div class="pb-riepilogo-row">
                    <span class="pb-riepilogo-label">Descrizione</span>
                    <span class="pb-riepilogo-value"><?php echo $_smarty_tpl->getValue('riepilogo')['descrizione'];?>
</span>
                </div>
            </div>
            <div class="pb-nav">
                <form action="/richiediAppuntamento" method="post">
                    <button type="submit" class="pb-btn">Conferma prenotazione →</button>
                </form>
            </div>

        <?php } elseif ($_smarty_tpl->getValue('overlay_step') === 'conferma') {?>
            <p class="pb-title">Prenotazione inviata ✓</p>
            <div class="pb-riepilogo">
                <div class="pb-riepilogo-row">
                    <span class="pb-riepilogo-label">Membro team</span>
                    <span class="pb-riepilogo-value"><?php echo $_smarty_tpl->getValue('riepilogo')['tatuatore'];?>
</span>
                </div>
                <div class="pb-riepilogo-row">
                    <span class="pb-riepilogo-label">Stile</span>
                    <span class="pb-riepilogo-value"><?php echo $_smarty_tpl->getValue('riepilogo')['stile'];?>
</span>
                </div>
                <div class="pb-riepilogo-row">
                    <span class="pb-riepilogo-label">Giorno</span>
                    <span class="pb-riepilogo-value"><?php echo $_smarty_tpl->getValue('riepilogo')['data'];?>
</span>
                </div>
                <div class="pb-riepilogo-row">
                    <span class="pb-riepilogo-label">Descrizione</span>
                    <span class="pb-riepilogo-value"><?php echo $_smarty_tpl->getValue('riepilogo')['descrizione'];?>
</span>
                </div>
                <div class="pb-riepilogo-row">
                    <span class="pb-riepilogo-label">Stato</span>
                    <span class="pb-riepilogo-value pb-status">In attesa di conferma</span>
                </div>
            </div>
            <div class="pb-nav">
                <a href="/home" class="pb-btn">Torna alla home</a>
            </div>
        <?php }?>

    </div>
</div>
<?php }?>

<?php $_smarty_tpl->renderSubTemplate('file:partials/overlay_recensione.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<?php
}
}
/* {/block "content"} */
}
