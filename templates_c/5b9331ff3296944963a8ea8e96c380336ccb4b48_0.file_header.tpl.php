<?php
/* Smarty version 5.8.0, created on 2026-06-25 17:31:05
  from 'file:partials/header.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d49b93b7894_27592209',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b9331ff3296944963a8ea8e96c380336ccb4b48' => 
    array (
      0 => 'partials/header.tpl',
      1 => 1782401355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3d49b93b7894_27592209 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/partials';
?><div class="im-nav">
    <a href="/home" class="im-logo">INK<span>MASTER</span></a>
    <div class="im-nav-right">
        <a href="/registrazioneStudio">Per gli artisti</a>

        <?php if ($_smarty_tpl->getValue('_sessione')['username']) {?>
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

        <span class="im-lang">🌐 <strong>ITA</strong></span>
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
<?php }
}
}
