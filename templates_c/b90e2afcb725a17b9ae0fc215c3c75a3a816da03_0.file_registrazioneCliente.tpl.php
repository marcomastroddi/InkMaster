<?php
/* Smarty version 5.8.0, created on 2026-06-25 18:21:13
  from 'file:pages/auth/registrazioneCliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d557916e7d4_02221755',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b90e2afcb725a17b9ae0fc215c3c75a3a816da03' => 
    array (
      0 => 'pages/auth/registrazioneCliente.tpl',
      1 => 1782401355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3d557916e7d4_02221755 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19204997696a3d55791646f9_15473064', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5160127316a3d5579169144_97088790', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8897732696a3d557916a166_63550736', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_19204997696a3d55791646f9_15473064 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
?>
Registrati come cliente — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_5160127316a3d5579169144_97088790 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
?>

        <link rel="stylesheet" href="/CSS/home.css">
        <link rel="stylesheet" href="/CSS/auth.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_8897732696a3d557916a166_63550736 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
?>

<div class="im-page im-auth-wrapper im-cliente-theme">
        <div class="im-hero-bg">
        <div class="im-blob im-blob-1" style="width: 450px; height: 450px; left: -100px; top: -100px;"></div>
        <div class="im-blob im-blob-2" style="width: 550px; height: 550px; right: -150px; bottom: -100px; top: auto; animation-delay: -3s;"></div>
    </div>

    <div class="im-auth-container">
        <div class="im-auth-card">
            <div class="im-auth-header">
                <div class="im-eyebrow">Unisciti alla rete</div>
                <h1 class="im-title-auth">Registrati come cliente</h1>
                <p class="im-subtitle">Trova i migliori artisti e prenota il tuo prossimo tatuaggio in pochi clic.</p>
            </div>

            <form action="/registraCliente" method="POST" class="im-form">
                <?php if ((true && ($_smarty_tpl->hasVariable('message') && null !== ($_smarty_tpl->getValue('message') ?? null))) && $_smarty_tpl->getValue('message')) {?>
                    <div class="im-alert im-alert-error"><?php echo $_smarty_tpl->getValue('message');?>
</div>
                <?php }?>
                <div class="im-form-grid">
                    <div class="im-form-group">
                        <label class="im-label" for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="im-input" required placeholder="Es. Mario">
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="cognome">Cognome</label>
                        <input type="text" id="cognome" name="cognome" class="im-input" required placeholder="Es. Rossi">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="im-input" required placeholder="Scegli un username">
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="im-input" required placeholder="mario.rossi@email.com">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="data_nascita">Data di nascita</label>
                        <input type="date" id="data_nascita" name="data_nascita" class="im-input" required>
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="posizione">Posizione</label>
                        <input type="text" id="posizione" name="posizione" class="im-input" required placeholder="Indirizzo completo, es. Via Roma 1, Roma">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="im-input" required placeholder="Crea una password sicura">
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="conferma_password">Conferma password</label>
                        <input type="password" id="conferma_password" name="conferma_password" class="im-input" required placeholder="Ripeti la password">
                    </div>
                </div>

                <button type="submit" class="im-btn-submit">Crea il tuo account</button>
            </form>

            <div class="im-auth-footer">
                Hai già un account? <a href="/login" class="im-link-auth">Accedi</a>
            </div>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
