<?php
/* Smarty version 5.8.0, created on 2026-06-26 19:53:32
  from 'file:partials/footer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3ebc9c20c297_25741737',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '484ab685faaff27868ce0d4edc6e7fae4abb3d38' => 
    array (
      0 => 'partials/footer.tpl',
      1 => 1782496297,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3ebc9c20c297_25741737 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/partials';
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
        </div>
    </div>
    <div class="im-copyright">© <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),'%Y');?>
 InkMaster — Tutti i diritti riservati</div>
</div><?php }
}
