<?php
/* Smarty version 5.8.0, created on 2026-06-26 20:13:27
  from 'file:pages/profilo/areaPersonale.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3ec147400df7_78100794',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5de946ccceb8c79f319ae29d96ac644ad3018d8' => 
    array (
      0 => 'pages/profilo/areaPersonale.tpl',
      1 => 1782497119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3ec147400df7_78100794 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/profilo';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_871531556a3ec1473cbf86_82590598', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4596059806a3ec1473cff11_14190921', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8025055596a3ec1473d0990_86636587', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_871531556a3ec1473cbf86_82590598 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/profilo';
?>
Area personale — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_4596059806a3ec1473cff11_14190921 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/profilo';
?>

    <link rel="stylesheet" href="/CSS/areaPersonale.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_8025055596a3ec1473d0990_86636587 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/profilo';
?>

<div class="im-ap-page">
<div class="im-ap-inner">

        <div class="im-ap-header">
        <div class="im-ap-avatar">
            <?php echo mb_strtoupper((string) substr((string) $_SESSION['username'], (int) 0, (int) 1) ?? '', 'UTF-8');?>

        </div>
        <div class="im-ap-header-info">
            <div class="im-ap-welcome">Bentornato, <?php echo $_SESSION['username'];?>
</div>
            <div class="im-ap-meta">
                <span>✉ <?php echo (($tmp = $_SESSION['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</span>
                <span>📍 <?php echo (($tmp = $_SESSION['posizione'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</span>
            </div>
        </div>
        <a href="/visualizza_profilo" class="im-ap-gestisci">Gestisci profilo</a>
    </div>

        <div class="im-ap-bookings">
        <div class="im-ap-section-title">Le mie prenotazioni</div>

        <?php if (( !$_smarty_tpl->hasVariable('appuntamenti') || empty($_smarty_tpl->getValue('appuntamenti')))) {?>
            <div class="im-ap-empty">Nessuna prenotazione ancora. <a href="/home" style="color:#2fd8aa">Cerca uno studio</a></div>
        <?php } else { ?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('appuntamenti'), 'app');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('app')->value) {
$foreach0DoElse = false;
?>
            <?php $_smarty_tpl->assign('stato', $_smarty_tpl->getValue('app')->getStato(), false, NULL);?>
            <div class="im-ap-booking-card">

                                <div class="im-ap-studio-avatar">
                    <?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('app')->getStudio()->getNome(), (int) 0, (int) 1) ?? '', 'UTF-8');?>

                </div>

                                <div class="im-ap-booking-info">
                    <div class="im-ap-studio-name"><?php echo $_smarty_tpl->getValue('app')->getStudio()->getNome();?>
</div>
                    <div class="im-ap-booking-note"><?php echo (($tmp = $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('app')->getNote(),60,'...') ?? null)===null||$tmp==='' ? '—' ?? null : $tmp);?>
</div>
                </div>

                                <div class="im-ap-booking-meta">
                    <div class="im-ap-booking-date"><?php echo $_smarty_tpl->getValue('app')->getData()->format('d/m/Y');?>
</div>
                    <div class="im-ap-booking-city"><?php echo (($tmp = $_smarty_tpl->getValue('app')->getStudio()->getPosizione() ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</div>
                </div>

                                <?php if ($_smarty_tpl->getValue('stato') === 'IN_ATTESA') {?>
                    <span class="im-ap-badge im-ap-badge--attesa">In attesa</span>
                <?php } elseif ($_smarty_tpl->getValue('stato') === 'CONFERMATO') {?>
                    <span class="im-ap-badge im-ap-badge--confermato">Confermato</span>
                <?php } elseif ($_smarty_tpl->getValue('stato') === 'DA_PAGARE') {?>
                    <span class="im-ap-badge im-ap-badge--pagare">Da pagare</span>
                <?php } elseif ($_smarty_tpl->getValue('stato') === 'COMPLETATO') {?>
                    <span class="im-ap-badge im-ap-badge--completato">Completato</span>
                <?php } elseif ($_smarty_tpl->getValue('stato') === 'ANNULLATO') {?>
                    <span class="im-ap-badge im-ap-badge--annullato">Annullato</span>
                <?php }?>

                                <div class="im-ap-actions">
                    <?php if ($_smarty_tpl->getValue('stato') === 'DA_PAGARE') {?>
                        <a href="/avvia_pagamento?id=<?php echo $_smarty_tpl->getValue('app')->getId();?>
" class="im-ap-btn-pay">
                            PAGA <?php if ($_smarty_tpl->getValue('app')->getCosto()) {?>€<?php echo sprintf("%.2f",$_smarty_tpl->getValue('app')->getCosto());
} else { ?>€<?php }?>
                        </a>
                    <?php } elseif ($_smarty_tpl->getValue('stato') === 'COMPLETATO') {?>
                        <span class="im-ap-btn-paid">✓ Pagato</span>
                    <?php }?>
                    <a href="#" class="im-ap-btn-chat" title="Chat">
                        💬 Chat
                    </a>
                </div>

            </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        <?php }?>
    </div>

        <div class="im-ap-reviews">
        <div class="im-ap-section-title">Le mie recensioni</div>

        <?php if (( !$_smarty_tpl->hasVariable('recensioni') || empty($_smarty_tpl->getValue('recensioni')))) {?>
            <div class="im-ap-empty">Non hai ancora scritto recensioni.</div>
        <?php } else { ?>
            <div class="im-ap-review-grid">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recensioni'), 'rec');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('rec')->value) {
$foreach1DoElse = false;
?>
            <div class="im-ap-review-card">
                <div class="im-ap-review-head">
                    <div class="im-ap-review-avatar">
                        <?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('rec')->getStudio()->getNome(), (int) 0, (int) 1) ?? '', 'UTF-8');?>

                    </div>
                    <div class="im-ap-review-meta">
                        <div class="im-ap-review-studio"><?php echo $_smarty_tpl->getValue('rec')->getStudio()->getNome();?>
</div>
                        <div class="im-ap-review-date"><?php echo $_smarty_tpl->getValue('rec')->getData()->format('M Y');?>
</div>
                    </div>
                </div>
                <div class="im-ap-stars">
                    <?php
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new \Smarty\Variable(array());
if (true) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= 5; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <?php if (($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null) < $_smarty_tpl->getValue('rec')->getVoto()) {?>★<?php } else { ?>☆<?php }?>
                    <?php
}
}
?>
                </div>
                <div class="im-ap-review-title"><?php echo $_smarty_tpl->getValue('rec')->getTitolo();?>
</div>
                <?php if ($_smarty_tpl->getValue('rec')->getDescrizione()) {?>
                    <div class="im-ap-review-desc"><?php echo $_smarty_tpl->getValue('rec')->getDescrizione();?>
</div>
                <?php }?>
                <span class="im-ap-review-tag"><?php echo $_smarty_tpl->getValue('rec')->getStile();?>
</span>
            </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
        <?php }?>
    </div>

</div>
</div>
<?php
}
}
/* {/block "content"} */
}
