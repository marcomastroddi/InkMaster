<?php
/* Smarty version 5.8.0, created on 2026-06-24 18:30:36
  from 'file:pages/auth/registrazioneCliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3c224c06f792_91566507',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fdfc7ac05ca6bc9b74ce1f1f4d55612056f39d3' => 
    array (
      0 => 'pages/auth/registrazioneCliente.tpl',
      1 => 1782325827,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3c224c06f792_91566507 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\auth';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15876482536a3c224c06a062_41494595', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11436311936a3c224c06e136_29173819', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16833454956a3c224c06eeb4_50442844', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_15876482536a3c224c06a062_41494595 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\auth';
?>
Registrati come cliente — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_11436311936a3c224c06e136_29173819 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\auth';
?>

        <link rel="stylesheet" href="/CSS/home.css">
        <link rel="stylesheet" href="/CSS/auth.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_16833454956a3c224c06eeb4_50442844 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\auth';
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

            <form action="/registrazione_cliente_action" method="POST" class="im-form">
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
