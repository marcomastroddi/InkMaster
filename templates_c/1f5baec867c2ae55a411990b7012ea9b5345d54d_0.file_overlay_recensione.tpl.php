<?php
/* Smarty version 5.8.0, created on 2026-06-25 19:44:14
  from 'file:partials/overlay_recensione.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d68eea0cfa0_23218373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f5baec867c2ae55a411990b7012ea9b5345d54d' => 
    array (
      0 => 'partials/overlay_recensione.tpl',
      1 => 1782407786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3d68eea0cfa0_23218373 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/partials';
if ($_smarty_tpl->getValue('mostra_overlay_recensione')) {?>
<div class="rc-backdrop">
    <div class="rc-card">

        <div class="rc-card-header">
            <span class="rc-studio-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
</span>
            <a href="/scegli_studio?id=<?php echo $_smarty_tpl->getValue('data')->getId();?>
" class="rc-close">✕</a>
        </div>

        <?php if (!$_smarty_tpl->getValue('overlay_rec_step') || $_smarty_tpl->getValue('overlay_rec_step') === 'form') {?>
            <p class="rc-title">Lascia una recensione</p>
            <form action="/compilaRecensione" method="post" enctype="multipart/form-data" class="rc-form">

                <div class="rc-field">
                    <label class="rc-label">Voto</label>
                    <div class="rc-stars">
                        <input type="radio" name="voto" id="s5" value="5" required>
                        <label for="s5">★</label>
                        <input type="radio" name="voto" id="s4" value="4">
                        <label for="s4">★</label>
                        <input type="radio" name="voto" id="s3" value="3">
                        <label for="s3">★</label>
                        <input type="radio" name="voto" id="s2" value="2">
                        <label for="s2">★</label>
                        <input type="radio" name="voto" id="s1" value="1">
                        <label for="s1">★</label>
                    </div>
                </div>

                <div class="rc-field">
                    <label class="rc-label">Intestazione</label>
                    <input type="text" name="titolo" class="rc-input" placeholder="Titolo della recensione" required>
                </div>

                <div class="rc-field">
                    <label class="rc-label">Tatuatore</label>
                    <select name="tatuatore_id" class="rc-select" required>
                        <option value="">Seleziona tatuatore</option>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('rec_tatuatori'), 't');
$foreach11DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('t')->value) {
$foreach11DoElse = false;
?>
                            <option value="<?php echo $_smarty_tpl->getValue('t')->getId();?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('t')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('t')->getCognome(), ENT_QUOTES, 'UTF-8', true);?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
                </div>

                <div class="rc-field">
                    <label class="rc-label">Stile</label>
                    <select name="stile" class="rc-select" required>
                        <option value="">Seleziona stile</option>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('rec_stili'), 's');
$foreach12DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('s')->value) {
$foreach12DoElse = false;
?>
                            <option value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('s')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('s')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
                </div>

                <div class="rc-field">
                    <label class="rc-label">Condividi la tua esperienza</label>
                    <textarea name="descrizione" class="rc-textarea" placeholder="Racconta come è andata..." rows="4"></textarea>
                </div>

                <div class="rc-field">
                    <label class="rc-label">Foto del tatuaggio (opzionale)</label>
                    <input type="file" name="foto[]" class="rc-file-input" accept="image/*" multiple>
                </div>

                <div class="rc-nav">
                    <a href="/scegli_studio?id=<?php echo $_smarty_tpl->getValue('data')->getId();?>
" class="rc-btn-outline">Annulla</a>
                    <button type="submit" class="rc-btn">Pubblica →</button>
                </div>

            </form>

        <?php } elseif ($_smarty_tpl->getValue('overlay_rec_step') === 'successo') {?>
            <div class="rc-successo">
                <div class="rc-successo-icon">✓</div>
                <p class="rc-title">Recensione inserita correttamente!</p>
                <p class="rc-sub">Grazie per aver condiviso la tua esperienza.</p>
            </div>
            <div class="rc-nav">
                <a href="/scegli_studio?id=<?php echo $_smarty_tpl->getValue('data')->getId();?>
" class="rc-btn">Torna allo studio</a>
            </div>
        <?php }?>

    </div>
</div>
<?php }
}
}
