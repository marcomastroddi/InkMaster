<?php
/* Smarty version 5.8.0, created on 2026-06-25 18:39:01
  from 'file:partials/overlay_recensione.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3d59a5042d44_07118602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f5baec867c2ae55a411990b7012ea9b5345d54d' => 
    array (
      0 => 'partials/overlay_recensione.tpl',
      1 => 1782405511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3d59a5042d44_07118602 (\Smarty\Template $_smarty_tpl) {
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
            <form action="/compilaRecensione" method="post" class="rc-form">

                <div class="rc-field">
                    <label class="rc-label">Voto</label>
                    <div class="rc-stars">
                        <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                        <label class="rc-star-label">
                            <input type="radio" name="voto" value="<?php echo $_smarty_tpl->getValue('i');?>
" required>
                            <span>★</span>
                        </label>
                        <?php }
}
?>
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
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('t')->value) {
$foreach0DoElse = false;
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
                    <label class="rc-label">Voto</label>
                    <select name="voto" class="rc-select" required>
                        <option value="">Seleziona voto</option>
                        <option value="1">★ 1</option>
                        <option value="2">★★ 2</option>
                        <option value="3">★★★ 3</option>
                        <option value="4">★★★★ 4</option>
                        <option value="5">★★★★★ 5</option>
                    </select>
                </div>

                <div class="rc-field">
                    <label class="rc-label">Condividi la tua esperienza</label>
                    <textarea name="descrizione" class="rc-textarea" placeholder="Racconta come è andata..." rows="4"></textarea>
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
