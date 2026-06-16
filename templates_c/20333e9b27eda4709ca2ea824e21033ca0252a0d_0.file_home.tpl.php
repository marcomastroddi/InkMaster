<?php
/* Smarty version 5.8.0, created on 2026-06-16 17:31:03
  from 'file:pages/home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3188577eb9f6_05930431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20333e9b27eda4709ca2ea824e21033ca0252a0d' => 
    array (
      0 => 'pages/home.tpl',
      1 => 1781630107,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3188577eb9f6_05930431 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12536274126a3188577952a8_14302746', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9032097976a3188577ad464_97838294', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_12536274126a3188577952a8_14302746 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages';
?>
Home - Cerca il tuo Tatuatore<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_9032097976a3188577ad464_97838294 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages';
?>

    <section class="search-section">
        <h1>Cerca il tuo tatuatore a <span class="citta-selezionata">Roma ▾</span></h1>
        
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
}
