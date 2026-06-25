<?php
/* Smarty version 5.8.0, created on 2026-06-25 07:57:14
  from 'file:partials/header_ricerca.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3cdf5a817714_94988612',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73e3291837744244703457a09ff9181c115ea481' => 
    array (
      0 => 'partials/header_ricerca.tpl',
      1 => 1782373354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3cdf5a817714_94988612 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\partials';
?><div class="im-nav im-nav--search">
    <a href="/home" class="im-logo">INK<span>MASTER</span></a>

    <form action="/avvia_ricerca" method="get" class="im-nav-search">
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
        <a href="/cerca">Per gli artisti</a>
        <?php if ($_smarty_tpl->getValue('_sessione')['username']) {?>
            <a href="/visualizza_profilo" class="im-nav-user">
                <div class="im-nav-avatar"><?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('_sessione')['username'], (int) 0, (int) 2) ?? '', 'UTF-8');?>
</div>
                <span class="im-nav-uname"><?php echo $_smarty_tpl->getValue('_sessione')['username'];?>
</span>
            </a>
        <?php } else { ?>
            <a href="/login" class="im-btn-outline">Accedi</a>
        <?php }?>
        <span class="im-lang">🌐 <strong>ITA</strong></span>
    </div>
</div><?php }
}
