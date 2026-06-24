<?php
/* Smarty version 5.8.0, created on 2026-06-24 14:54:12
  from 'file:partials/footer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3bef94116d75_37737083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd00991dd022c9a314953d47b1b190afc35321702' => 
    array (
      0 => 'partials/footer.tpl',
      1 => 1782312811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3bef94116d75_37737083 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\partials';
?><div class="im-footer">
    <div class="im-footer-top">
        <div>
            <div class="im-footer-logo">INK<span class="im-accent">MASTER</span></div>
            <div class="im-footer-desc">La rete dei migliori studi e tatuatori in Italia.</div>
        </div>
        <div class="im-footer-cols">
            <div class="im-footer-col">
                <span class="im-footer-col-title">Contatti</span>
                <span>info@inkmaster.it</span>
                <span>+39 06 1234 5678</span>
                <span>Roma, IT</span>
            </div>
            <div class="im-footer-col">
                <span class="im-footer-col-title">Piattaforma</span>
                <a href="/cerca">Per gli artisti</a>
                <a href="#">Come funziona</a>
                <a href="#">Assistenza</a>
            </div>
        </div>
    </div>
    <div class="im-copyright">© <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),'%Y');?>
 InkMaster — Tutti i diritti riservati</div>
</div><?php }
}
