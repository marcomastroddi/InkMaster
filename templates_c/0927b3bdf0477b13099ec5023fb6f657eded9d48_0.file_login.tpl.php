<?php
/* Smarty version 5.8.0, created on 2026-06-24 18:28:41
  from 'file:pages/auth/login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3c21d9bfa374_40174917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0927b3bdf0477b13099ec5023fb6f657eded9d48' => 
    array (
      0 => 'pages/auth/login.tpl',
      1 => 1782325715,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3c21d9bfa374_40174917 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\auth';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11776338436a3c21d9bf40b7_92316915', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19805526196a3c21d9bf8b74_52550446', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20765724206a3c21d9bf99c2_06668702', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_11776338436a3c21d9bf40b7_92316915 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\auth';
?>
Accedi — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_19805526196a3c21d9bf8b74_52550446 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\auth';
?>

        <link rel="stylesheet" href="/CSS/home.css">
        <link rel="stylesheet" href="/CSS/registrazioneCliente.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_20765724206a3c21d9bf99c2_06668702 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\InkMaster\\templates\\pages\\auth';
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
