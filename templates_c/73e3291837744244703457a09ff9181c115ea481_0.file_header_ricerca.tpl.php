<?php
/* Smarty version 5.8.0, created on 2026-06-26 21:58:39
  from 'file:partials/header_ricerca.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3ef60fc17aa0_28980729',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73e3291837744244703457a09ff9181c115ea481' => 
    array (
      0 => 'partials/header_ricerca.tpl',
      1 => 1782511086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3ef60fc17aa0_28980729 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\partials';
?><div class="im-topbar">
<div class="im-nav im-nav--search">
    <a href="/home" class="im-logo">INK<span>MASTER</span></a>

    <form action="/avvia_ricerca" method="get" class="im-nav-search">
        <input type="hidden" name="citta" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('filtri_correnti')['citta'] ?? null)===null||$tmp==='' ? 'Roma' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
        <input type="hidden" name="stile" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('filtri_correnti')['stile'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
        <div class="im-nav-search-box">
            <span class="im-search-icon">⌕</span>
            <input type="text" name="testo" autocomplete="off"
                   value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('filtri_correnti')['testo'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                   placeholder="es. DanInk — nome, studio o parola chiave…">
        </div>
        <button type="submit" class="im-nav-search-btn">Cerca</button>
    </form>

    <div class="im-nav-right">
        <?php if ($_smarty_tpl->getValue('_sessione')['username']) {?>
            <?php if ($_smarty_tpl->getValue('_sessione')['ruolo'] === 'cliente') {?>
                <a href="/area_personale" class="im-btn-outline im-btn-prenotazioni">Le mie prenotazioni</a>
            <?php }?>
            <a href="/visualizza_profilo" class="im-nav-profilo">
                <div class="im-avatar"><?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('_sessione')['username'], (int) 0, (int) 1) ?? '', 'UTF-8');?>
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
</div>

<?php if ($_smarty_tpl->getValue('_sessione')['username']) {?>
<div class="im-logout-overlay" id="im-logout-overlay">
    <div class="im-logout-modal">
        <div class="im-logout-eyebrow">CI DISPIACE VEDERTI ANDARE</div>
        <h2 class="im-logout-title">Vuoi davvero uscire?</h2>
        <p class="im-logout-desc">Accedendo al tuo profilo puoi tenere traccia delle prenotazioni, scrivere recensioni e seguire i tuoi studi preferiti.</p>
        <div class="im-logout-actions">
            <button type="button" class="im-logout-stay" id="im-logout-cancel">Rimani con noi</button>
            <a href="/logout" class="im-logout-confirm">Esci</a>
        </div>
    </div>
</div>
<?php }
}
}
