<?php
/* Smarty version 5.8.0, created on 2026-06-25 23:08:06
  from 'file:pages/auth/registrazioneStudio.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d98b67fbcf9_18849600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59657702a8dc066b4dcbd7e9cc8c643b23e952ba' => 
    array (
      0 => 'pages/auth/registrazioneStudio.tpl',
      1 => 1782421622,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3d98b67fbcf9_18849600 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5948276536a3d98b67f3302_20066285', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_997855426a3d98b67f9404_33698823', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6555856646a3d98b67fadb7_72824310', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_5948276536a3d98b67f3302_20066285 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
?>
Registra il tuo studio — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_997855426a3d98b67f9404_33698823 extends \Smarty\Runtime\Block
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
class Block_6555856646a3d98b67fadb7_72824310 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/auth';
?>

<div class="im-page im-auth-wrapper im-studio-theme">
        <div class="im-hero-bg">
        <div class="im-blob im-blob-1" style="width: 450px; height: 450px; left: -100px; top: -100px;"></div>
        <div class="im-blob im-blob-2" style="width: 550px; height: 550px; right: -150px; bottom: -100px; top: auto; animation-delay: -3s;"></div>
    </div>

    <div class="im-auth-container" style="max-width: 760px;">
        <div class="im-auth-card">
            <div class="im-auth-header">
                <div class="im-eyebrow">Area Professionisti</div>
                <h1 class="im-title-auth">Registra il tuo Studio</h1>
                <p class="im-subtitle">Entra nella rete di InkMaster e mostra le tue opere a migliaia di clienti.</p>
            </div>

            <form action="/registraStudio" method="POST" class="im-form">
                <div class="im-form-grid">
                    
                    <div class="im-form-group">
                        <label class="im-label" for="nome">Nome Studio / Tatuatore</label>
                        <input type="text" id="nome" name="nome" class="im-input" required placeholder="Es. Luxury Tattoo Studio">
                    </div>
                    
                    <div class="im-form-group">
                        <label class="im-label" for="partita_iva">Partita IVA</label>
                        <input type="text" id="partita_iva" name="partita_iva" class="im-input" required placeholder="11 cifre numeriche">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="username">Username Studio</label>
                        <input type="text" id="username" name="username" class="im-input" required placeholder="Scegli un username">
                    </div>
                    
                    <div class="im-form-group">
                        <label class="im-label" for="email">Email aziendale</label>
                        <input type="email" id="email" name="email" class="im-input" required placeholder="studio@example.com">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="telefono">Telefono di contatto</label>
                        <input type="tel" id="telefono" name="telefono" class="im-input" required placeholder="Es. +39 333 1234567">
                    </div>
                    
                    <div class="im-form-group">
                        <label class="im-label" for="posizione">Città</label>
                        <select id="posizione" name="posizione" class="im-input" required>
                            <option value="">— Seleziona città —</option>
                            <option value="Milano">Milano</option>
                            <option value="Roma">Roma</option>
                            <option value="Napoli">Napoli</option>
                            <option value="Torino">Torino</option>
                            <option value="Palermo">Palermo</option>
                            <option value="Genova">Genova</option>
                            <option value="Bologna">Bologna</option>
                            <option value="Firenze">Firenze</option>
                            <option value="Bari">Bari</option>
                            <option value="Catania">Catania</option>
                            <option value="Venezia">Venezia</option>
                            <option value="Pescara">Pescara</option>
                            <option value="Avezzano">Avezzano</option>
                            <option value="Popoli">Popoli</option>
                            <option value="Catanzaro">Catanzaro</option>
                        </select>
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="im-input" required placeholder="Crea una password sicura">
                    </div>
                    
                    <div class="im-form-group">
                        <label class="im-label" for="conferma_password">Conferma password</label>
                        <input type="password" id="conferma_password" name="conferma_password" class="im-input" required placeholder="Ripeti la password">
                    </div>

                    <div class="im-form-group" style="grid-column: span 2;">
                        <label class="im-label" for="descrizione">Descrizione dello Studio / Stili trattati</label>
                        <textarea id="descrizione" name="descrizione" class="im-input" rows="3" placeholder="Racconta la storia del tuo studio e gli stili in cui eccellete..." style="resize: none; font-family: inherit; height: auto;"></textarea>
                    </div>
                </div>

                <button type="submit" class="im-btn-submit">Crea il tuo profilo artista</button>
            </form>

            <div class="im-auth-footer">
                Hai già un account artista? <a href="/login" class="im-link-auth">Accedi</a>
            </div>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
