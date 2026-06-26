<?php
/* Smarty version 5.8.0, created on 2026-06-26 15:20:31
  from 'file:pages/portfolio/form_pubblicazione.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e98bf35bf17_34732653',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6dc0b2b0df04d10e5a42a5befa8cdaf8fce3478' => 
    array (
      0 => 'pages/portfolio/form_pubblicazione.tpl',
      1 => 1782483458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e98bf35bf17_34732653 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\portfolio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20925551746a3e98bf3473b4_18449206', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15960751596a3e98bf34ac86_76536038', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12621574896a3e98bf34b4f4_50600278', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_20925551746a3e98bf3473b4_18449206 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\portfolio';
?>
Nuova opera — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_15960751596a3e98bf34ac86_76536038 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\portfolio';
?>

    <link rel="stylesheet" href="/CSS/portfolioLatoStudio.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_12621574896a3e98bf34b4f4_50600278 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\portfolio';
?>

<div class="im-portfolio-form-page">
    <div class="im-portfolio-deco"></div>

    <div class="im-pub-form-container">
        <div class="im-pub-form-card">
            <div class="im-pub-form-header">
                <a href="/portfolio_studio" class="im-back-link">← Torna al portfolio</a>
                <div class="im-port-eyebrow">Nuovo lavoro</div>
                <h1 class="im-pub-form-title">Aggiungi un'opera</h1>
            </div>

            <form action="/pubblica_pubblicazione" method="POST" enctype="multipart/form-data" class="im-pub-form">

                <?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
                <div class="im-feedback err"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('error'), ENT_QUOTES, 'UTF-8', true);?>
</div>
                <?php }?>

                <div class="im-form-group">
                    <label class="im-label" for="titolo">Titolo *</label>
                    <input type="text" id="titolo" name="titolo" class="im-input" required
                           placeholder="Es. Dark rose sleeve">
                </div>

                <div class="im-form-group">
                    <label class="im-label" for="percorso_foto">Foto del tatuaggio *</label>
                    <input type="file" id="percorso_foto" name="percorso_foto"
                           class="im-input im-input-file"
                           accept="image/jpeg,image/png,image/webp" required>
                </div>

                <div class="im-form-group">
                    <label class="im-label" for="stile">Stile *</label>
                    <select id="stile" name="stile" class="im-input im-select" required>
                        <option value="">— Seleziona stile —</option>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'stile');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('stile')->value) {
$foreach0DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('stile')->getId();?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('stile')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
                </div>

                <div class="im-form-group">
                    <label class="im-label" for="descrizione">Descrizione</label>
                    <textarea id="descrizione" name="descrizione" class="im-input" rows="4"
                              placeholder="Racconta questa opera, la tecnica, il significato..."></textarea>
                </div>

                <div class="im-form-actions">
                    <a href="/portfolio_studio" class="im-btn-cancel-link">Annulla</a>
                    <button type="submit" class="im-btn-submit-pub">Pubblica nel portfolio</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
