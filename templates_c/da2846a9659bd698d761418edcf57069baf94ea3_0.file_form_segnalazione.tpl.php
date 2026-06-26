<?php
/* Smarty version 5.8.0, created on 2026-06-26 14:24:13
  from 'file:pages/profilo/form_segnalazione.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e8b8dedc0b9_08201729',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da2846a9659bd698d761418edcf57069baf94ea3' => 
    array (
      0 => 'pages/profilo/form_segnalazione.tpl',
      1 => 1782483810,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e8b8dedc0b9_08201729 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\profilo';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_21322294976a3e8b8de91e92_07273836', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13136827756a3e8b8de96e10_68340127', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16519281766a3e8b8de98781_51990369', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_21322294976a3e8b8de91e92_07273836 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\profilo';
?>
Segnala — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_13136827756a3e8b8de96e10_68340127 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\profilo';
?>

    <link rel="stylesheet" href="/CSS/home.css">
    <style>
        .sgn-page { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 100px 20px 60px; position: relative; }
        .sgn-blob-wrap { position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden; }
        .sgn-card { position: relative; z-index: 1; background: #101417; border: 1px solid rgba(255,255,255,.08); border-radius: 18px; padding: 36px 40px; width: 100%; max-width: 520px; }
        .sgn-eyebrow { font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: #4b534f; margin-bottom: 6px; }
        .sgn-title { font-size: 22px; font-weight: 900; letter-spacing: -.02em; color: #eef1f0; margin: 0 0 4px; }
        .sgn-target { font-size: 14px; color: #6b736f; margin: 0 0 28px; }
        .sgn-target strong { color: #2fd8aa; }
        .sgn-field { margin-bottom: 20px; }
        .sgn-label { font-size: 11px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: #4b534f; display: block; margin-bottom: 10px; }
        .sgn-radio-group { display: flex; flex-direction: column; gap: 8px; }
        .sgn-radio-opt { display: flex; align-items: center; gap: 10px; font-size: 13px; font-weight: 600; color: #9aa3a0; background: rgba(255,255,255,.04); border: 1px solid rgba(255,255,255,.08); border-radius: 10px; padding: 12px 16px; cursor: pointer; transition: border-color .15s, background .15s; }
        .sgn-radio-opt:has(input:checked) { border-color: rgba(47,216,170,.4); background: rgba(47,216,170,.07); color: #eef1f0; }
        .sgn-radio-opt input { accent-color: #2fd8aa; }
        .sgn-textarea { width: 100%; background: rgba(255,255,255,.05); border: 1px solid rgba(255,255,255,.09); border-radius: 10px; padding: 12px 16px; color: #eef1f0; font-size: 13px; font-family: inherit; resize: vertical; min-height: 100px; box-sizing: border-box; }
        .sgn-textarea:focus { outline: none; border-color: rgba(47,216,170,.35); }
        .sgn-textarea::placeholder { color: #3f4a47; }
        .sgn-footer { display: flex; gap: 12px; margin-top: 28px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,.06); }
        .sgn-btn-submit { flex: 2; padding: 13px; border: none; border-radius: 10px; background: #e05252; color: #fff; font-size: 14px; font-weight: 800; cursor: pointer; font-family: inherit; transition: background .2s; }
        .sgn-btn-submit:hover { background: #c94040; }
        .sgn-btn-cancel { flex: 1; padding: 13px; border: 1px solid rgba(255,255,255,.1); border-radius: 10px; background: transparent; color: #9aa3a0; font-size: 14px; font-weight: 700; text-decoration: none; display: flex; align-items: center; justify-content: center; transition: border-color .15s; }
        .sgn-btn-cancel:hover { border-color: rgba(255,255,255,.25); color: #eef1f0; }
        .sgn-error { background: rgba(224,82,82,.1); border: 1px solid rgba(224,82,82,.25); border-radius: 10px; padding: 12px 16px; font-size: 13px; color: #e05252; margin-bottom: 20px; }
    </style>
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_16519281766a3e8b8de98781_51990369 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\profilo';
?>

<div class="sgn-page">

    <div class="sgn-blob-wrap">
        <div class="im-blob im-blob-1" style="width:500px;height:500px;left:-150px;top:-100px;"></div>
        <div class="im-blob im-blob-2" style="width:400px;height:400px;right:-100px;top:200px;animation-delay:-3s;"></div>
    </div>

    <div class="sgn-card">
        <div class="sgn-eyebrow">Moderazione</div>
        <h1 class="sgn-title">Invia una segnalazione</h1>
        <p class="sgn-target">
            Stai segnalando:
            <strong><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['target']['nome'], ENT_QUOTES, 'UTF-8', true);?>
</strong>
            <span style="color:#4b534f"> — <?php if ($_smarty_tpl->getValue('data')['target']['tipo'] == 'studio') {?>Studio<?php } else { ?>Cliente<?php }?></span>
        </p>

        <?php if ((true && ($_smarty_tpl->hasVariable('message') && null !== ($_smarty_tpl->getValue('message') ?? null))) && $_smarty_tpl->getValue('message')) {?>
            <div class="sgn-error"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('message'), ENT_QUOTES, 'UTF-8', true);?>
</div>
        <?php }?>

        <form method="POST" action="/invia_segnalazione">
            <input type="hidden" name="tipo_target" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['target']['tipo'], ENT_QUOTES, 'UTF-8', true);?>
">
            <input type="hidden" name="id_target"   value="<?php echo $_smarty_tpl->getValue('data')['target']['id'];?>
">

            <div class="sgn-field">
                <label class="sgn-label">Motivo della segnalazione</label>
                <div class="sgn-radio-group">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data')['form_campi']['motivo'], 'opzione');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('opzione')->value) {
$foreach0DoElse = false;
?>
                        <label class="sgn-radio-opt">
                            <input type="radio" name="motivo" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('opzione'), ENT_QUOTES, 'UTF-8', true);?>
" required>
                            <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('opzione'), ENT_QUOTES, 'UTF-8', true);?>

                        </label>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
            </div>

            <div class="sgn-field">
                <label class="sgn-label">Descrizione (opzionale)</label>
                <textarea name="descrizione" class="sgn-textarea"
                    placeholder="Aggiungi dettagli per aiutare i moderatori a valutare la segnalazione..."></textarea>
            </div>

            <div class="sgn-footer">
                <?php if ($_smarty_tpl->getValue('data')['target']['tipo'] == 'studio') {?>
                    <a href="/scegli_studio?id=<?php echo $_smarty_tpl->getValue('data')['target']['id'];?>
" class="sgn-btn-cancel">Annulla</a>
                <?php } else { ?>
                    <a href="/visualizza_clienti" class="sgn-btn-cancel">Annulla</a>
                <?php }?>
                <button type="submit" class="sgn-btn-submit">⚑ Invia segnalazione</button>
            </div>
        </form>
    </div>

</div>
<?php
}
}
/* {/block "content"} */
}
