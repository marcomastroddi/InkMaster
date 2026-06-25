<?php
/* Smarty version 5.8.0, created on 2026-06-25 14:09:01
  from 'file:partials/header.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d367d05ae19_68206013',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d3cbdfd2bfe3d6a07797051fb325e1d5498ba04' => 
    array (
      0 => 'partials/header.tpl',
      1 => 1782396534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3d367d05ae19_68206013 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\partials';
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
            <a href="/logout" class="im-btn-outline">Esci</a>
        <?php } else { ?>
                        <a href="/registrazioneCliente" class="im-btn-outline">Registrati</a>
            <a href="/login" class="im-btn-outline">Accedi</a>
        <?php }?>

        <span class="im-lang">🌐 <strong>ITA</strong></span>
    </div>
</div><?php }
}
