<?php
/* Smarty version 5.8.0, created on 2026-06-26 20:13:24
  from 'file:partials/header.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3ec144ccb030_65804295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b9331ff3296944963a8ea8e96c380336ccb4b48' => 
    array (
      0 => 'partials/header.tpl',
      1 => 1782497601,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3ec144ccb030_65804295 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/partials';
if ($_smarty_tpl->getValue('_sessione')['ruolo'] != 'amministratore') {?>
<div class="im-nav">
    <a href="/home" class="im-logo">INK<span>MASTER</span></a>
    <div class="im-nav-right">
        <?php if ($_smarty_tpl->getValue('_sessione')['ruolo'] != 'studio') {?>
            <a href="/registrazioneStudio">Per gli artisti</a>
        <?php }?>

        <?php if ($_smarty_tpl->getValue('_sessione')['username']) {?>
            <?php if ($_smarty_tpl->getValue('_sessione')['ruolo'] === 'cliente') {?>
                <a href="/area_personale" class="im-btn-outline">Le mie prenotazioni</a>
            <?php }?>
            <a href="/visualizza_profilo" class="im-nav-profilo">
                <div class="im-avatar">
                    <?php echo mb_strtoupper((string) $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('_sessione')['username'],1,'',true) ?? '', 'UTF-8');?>

                </div>
                <span class="im-nav-username"><?php echo $_smarty_tpl->getValue('_sessione')['username'];?>
</span>
            </a>
            <a href="#" class="im-btn-outline" id="im-logout-btn">Esci</a>
        <?php } else { ?>
            <a href="/registrazioneCliente" class="im-btn-outline">Registrati</a>
            <a href="/login" class="im-btn-outline">Accedi</a>
        <?php }?>
        </div>
        </div>

<?php if ($_smarty_tpl->getValue('_sessione')['username']) {?>
<div class="im-logout-overlay" id="im-logout-overlay">
    <div class="im-logout-modal">
        <div class="im-logout-eyebrow">CI DISPIACE VEDERTI ANDARE</div>
        <h2 class="im-logout-title">Vuoi davvero uscire?</h2>
        <p class="im-logout-desc">Accedendo al tuo profilo puoi tenere traccia delle prenotazioni, scrivere recensioni e seguire i tuoi studi preferiti. Tutto questo ti aspetta al prossimo accesso.</p>
        <div class="im-logout-actions">
            <button type="button" class="im-logout-stay" id="im-logout-cancel">Rimani con noi</button>
            <a href="/logout" class="im-logout-confirm">Esci</a>
        </div>
    </div>
</div>
<?php }?>

<?php } else { ?>
<div class="im-nav im-nav--admin">
    <a href="/home" class="im-logo">INK<span>MASTER</span></a>
    <div class="im-nav-right">
        <a href="/dashboard_moderatore" class="im-btn-outline">Dashboard Admin</a>
        <a href="/logout" class="im-btn-outline">Esci</a>
    </div>
</div>
<?php }
}
}
