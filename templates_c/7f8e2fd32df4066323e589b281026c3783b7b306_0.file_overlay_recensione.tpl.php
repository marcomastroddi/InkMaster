<?php
/* Smarty version 5.8.0, created on 2026-06-26 07:12:32
  from 'file:partials/overlay_recensione.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e2660d29b36_61432981',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f8e2fd32df4066323e589b281026c3783b7b306' => 
    array (
      0 => 'partials/overlay_recensione.tpl',
      1 => 1782457823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e2660d29b36_61432981 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\partials';
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
$foreach10DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('t')->value) {
$foreach10DoElse = false;
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
$foreach11DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('s')->value) {
$foreach11DoElse = false;
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
                    <input type="file" name="foto[]" class="rc-file-input" accept="image/*">
                    <input type="file" name="foto[]" class="rc-file-input" accept="image/*" style="margin-top:8px">
                    <input type="file" name="foto[]" class="rc-file-input" accept="image/*" style="margin-top:8px">
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

        <?php } elseif ($_smarty_tpl->getValue('overlay_rec_step') === 'dettaglio') {?>
            <div class="rc-dettaglio">
                <div class="rc-det-top">
                    <span class="rc-det-av">
                        <?php echo substr((string) $_smarty_tpl->getValue('recensione_dettaglio')->getCliente()->getNome(), (int) 0, (int) 1);
echo substr((string) $_smarty_tpl->getValue('recensione_dettaglio')->getCliente()->getCognome(), (int) 0, (int) 1);?>

                    </span>
                    <div>
                        <div class="rc-det-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recensione_dettaglio')->getCliente()->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo substr((string) $_smarty_tpl->getValue('recensione_dettaglio')->getCliente()->getCognome(), (int) 0, (int) 1);?>
.</div>
                        <div class="rc-det-stars">
                            <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
if ($_smarty_tpl->getValue('i') <= $_smarty_tpl->getValue('recensione_dettaglio')->getVoto()) {?>★<?php } else { ?><span class="st-star-off">★</span><?php }
}
}
?>
                        </div>
                    </div>
                    <span class="rc-det-date"><?php echo $_smarty_tpl->getValue('recensione_dettaglio')->getData()->format('M Y');?>
</span>
                </div>
                <div class="rc-det-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recensione_dettaglio')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
</div>
                <p class="rc-det-text"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recensione_dettaglio')->getDescrizione(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                <?php $_smarty_tpl->assign('fotoArr', $_smarty_tpl->getValue('recensione_dettaglio')->getFotoArray(), false, NULL);?>
                <?php if ($_smarty_tpl->getValue('fotoArr')) {?>
                    <div class="rc-det-photos">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('fotoArr'), 'fotoUrl');
$foreach12DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('fotoUrl')->value) {
$foreach12DoElse = false;
?>
                            <a href="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('fotoUrl'), ENT_QUOTES, 'UTF-8', true);?>
" target="_blank">
                                <img src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('fotoUrl'), ENT_QUOTES, 'UTF-8', true);?>
" alt="Foto tatuaggio" class="rc-det-photo">
                            </a>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </div>
                <?php }?>
                <div class="rc-det-footer">
                    <span class="rc-det-stile"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recensione_dettaglio')->getStile(), ENT_QUOTES, 'UTF-8', true);?>
</span>
                    · <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recensione_dettaglio')->getTatuatore()->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('recensione_dettaglio')->getTatuatore()->getCognome(), ENT_QUOTES, 'UTF-8', true);?>

                </div>
            </div>
            <div class="rc-nav">
                <a href="/scegli_studio?id=<?php echo $_smarty_tpl->getValue('data')->getId();?>
" class="rc-btn">← Torna allo studio</a>
            </div>
        <?php }?>

    </div>
</div>
<?php }
}
}
