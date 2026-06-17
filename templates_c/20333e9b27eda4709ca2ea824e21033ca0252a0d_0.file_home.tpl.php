<?php
/* Smarty version 5.8.0, created on 2026-06-16 23:04:07
  from 'file:pages/home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a31d6673c22c9_35447834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20333e9b27eda4709ca2ea824e21033ca0252a0d' => 
    array (
      0 => 'pages/home.tpl',
      1 => 1781651043,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a31d6673c22c9_35447834 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_874287896a31d6673af392_01636492', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15574550026a31d6673b2cc8_18822403', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5864742176a31d6673c0a25_95840187', "modals");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_874287896a31d6673af392_01636492 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages';
?>
Home - Cerca il tuo Tatuatore<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_15574550026a31d6673b2cc8_18822403 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages';
?>

    <section class="search-section">
        <h1>Cerca il tuo tatuatore a <a href="#popup-posizione" class="citta-selezionata">Roma ▾</a></h1>
        
        <div class="search-container">
            <input type="text" placeholder="es. DanInk" class="search-input">
            <button class="search-btn">🔍</button>
            <button class="filter-btn">🎛️ Filtri</button>
        </div>
    </section>

    <section class="section-container">
        <h2 class="section-title">Tattoo Styles</h2>
        <div class="cards-grid">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('stili'), 'stile');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('stile')->value) {
$foreach0DoElse = false;
?>
                <div class="card-item">
                    <div class="image-wrapper">
                        <img src="<?php echo $_smarty_tpl->getValue('stile')['immagine'];?>
" alt="<?php echo $_smarty_tpl->getValue('stile')['nome'];?>
">
                    </div>
                    <p><?php echo $_smarty_tpl->getValue('stile')['nome'];?>
</p>
                </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            
            <div class="card-item alt-btn">
                <div class="image-wrapper arrow-btn">≫</div>
                <p>Altro</p>
            </div>
        </div>
    </section>

    <section class="section-container">
        <h2 class="section-title">Tattoo Artist</h2>
        <div class="cards-grid">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tatuatori'), 'artista');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('artista')->value) {
$foreach1DoElse = false;
?>
                <div class="card-item">
                    <div class="avatar-wrapper">
                        <div class="user-icon">👤</div>
                    </div>
                    <p><?php echo $_smarty_tpl->getValue('artista')['nome'];?>
</p>
                </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

            <div class="card-item alt-btn">
                <div class="image-wrapper arrow-btn">≫</div>
                <p>Altro</p>
            </div>
        </div>
    </section>

    <section class="section-container">
        <h2 class="section-title">Recensioni</h2>
        
        <div class="reviews-slider">
            <div class="review-card">
                <div class="review-details">
                    <h3>👤 <?php echo $_smarty_tpl->getValue('recensione')['utente'];?>
 <span class="verified">(Tattoo verificato)</span></h3>
                    <div class="stars">⭐⭐⭐⭐⭐</div>
                    <h4><?php echo $_smarty_tpl->getValue('recensione')['intestazione'];?>
</h4>
                    <p><?php echo $_smarty_tpl->getValue('recensione')['descrizione'];?>
</p>
                </div>
                <div class="review-artist-info">
                    <img src="<?php echo $_smarty_tpl->getValue('recensione')['foto_tatuaggio'];?>
" alt="Tatuaggio">
                    <p><?php echo $_smarty_tpl->getValue('recensione')['nome_tatuatore'];?>
</p>
                </div>
            </div>
            
            <div class="slider-pagination">
                <span>4/10</span>
                <div class="dots">
                    <span class="dot"></span>
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>
    </section>  
<?php
}
}
/* {/block "content"} */
/* {block "modals"} */
class Block_5864742176a31d6673c0a25_95840187 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages';
?>

    <!-- Popup Posizione -->
 <div id="popup-posizione" class="modal-overlay">  
        <div class="modal-body">
            <a href="#" class="modal-close">&times;</a>
            <div class="modal-left">
                <h2>Imposta la tua posizione</h2>
                <div class="popup-search-container">
                    <input type="text" placeholder="es. Roma RM, Via del corso, Italy" class="search-input">
                    <button class="popup-search-btn">🔍</button>
                </div>
                <div class="current-pos">
                    <span class="geo-icon">🎯</span> <a href="#">Usa Posizione Attuale</a>
                </div>
                <button class="btn-conferma">Conferma Posizione</button>
            </div>
            <div class="modal-right">
                <img src="https://placehold.co/500x500?text=Mappa+Roma" alt="Mappa Posizione" class="map-img">
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "modals"} */
}
