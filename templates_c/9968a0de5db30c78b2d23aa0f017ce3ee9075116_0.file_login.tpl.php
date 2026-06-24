<?php
/* Smarty version 5.8.0, created on 2026-06-24 22:34:49
  from 'file:pages/auth/login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3c3f695cd391_14585617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9968a0de5db30c78b2d23aa0f017ce3ee9075116' => 
    array (
      0 => 'pages/auth/login.tpl',
      1 => 1782333206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3c3f695cd391_14585617 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7332291606a3c3f695c85b3_05918412', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12105732956a3c3f695cb7e6_56172884', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17642341216a3c3f695cc5b2_23747127', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_7332291606a3c3f695c85b3_05918412 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
?>
Accedi — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_12105732956a3c3f695cb7e6_56172884 extends \Smarty\Runtime\Block
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
class Block_17642341216a3c3f695cc5b2_23747127 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
?>

<div class="im-page im-auth-wrapper im-login-theme">
        <div class="im-hero-bg">
        <div class="im-blob im-blob-1" style="width: 400px; height: 400px; left: -150px; top: -50px;"></div>
        <div class="im-blob im-blob-2" style="width: 450px; height: 450px; right: -100px; bottom: -150px; top: auto; animation-delay: -2s;"></div>
    </div>

    <div class="im-auth-container im-login-card">
        <div class="im-auth-card">
            <div class="im-auth-header">
                <div class="im-eyebrow">Bentornato</div>
                <h1 class="im-title-auth">Accedi</h1>
                <p class="im-subtitle">Inserisci le tue credenziali per entrare nel mondo di InkMaster.</p>
            </div>

            <form action="/login_action" method="POST" class="im-form">
                <div class="im-form-group">
                    <label class="im-label" for="username">Username</label>
                    <input type="text" id="username" name="username" class="im-input" required placeholder="Inserisci il tuo username">
                </div>

                <div class="im-form-group mt-4">
                    <label class="im-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="im-input" required placeholder="Inserisci la tua password">
                </div>

                <button type="submit" class="im-btn-submit mt-5">Accedi</button>
            </form>

            <div class="im-auth-footer">
                Non hai un account? <br class="is-hidden-tablet">
                <a href="/registrazioneCliente" class="im-link-auth">Registrati come cliente</a> 
                <span style="color: #4b534f; margin: 0 8px;">•</span>
                <a href="/registrazioneStudio" class="im-link-auth">Registra il tuo studio</a>
            </div>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
