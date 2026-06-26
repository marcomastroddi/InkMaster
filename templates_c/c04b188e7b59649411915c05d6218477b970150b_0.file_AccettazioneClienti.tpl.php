<?php
/* Smarty version 5.8.0, created on 2026-06-26 21:46:44
  from 'file:pages/studio/AccettazioneClienti.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3ef3448dc7e7_04581116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c04b188e7b59649411915c05d6218477b970150b' => 
    array (
      0 => 'pages/studio/AccettazioneClienti.tpl',
      1 => 1782510143,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3ef3448dc7e7_04581116 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\studio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13503626236a3ef3448397b0_13885344', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9076179226a3ef34484fa61_60044135', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17007977066a3ef344850c96_30193066', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_13503626236a3ef3448397b0_13885344 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\studio';
?>
Richieste — InkMaster Studio<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_9076179226a3ef34484fa61_60044135 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\studio';
?>

    <link rel="stylesheet" href="/CSS/AccettazioneClienti.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_17007977066a3ef344850c96_30193066 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\studio';
?>

<div class="im-page im-richieste-page">

        <div class="im-hero-bg">
        <div class="im-blob im-blob-1"></div>
        <div class="im-blob im-blob-2"></div>
        <div class="im-blob im-blob-3"></div>
    </div>

        <svg class="im-richieste-deco" viewBox="0 0 600 500" xmlns="http://www.w3.org/2000/svg" fill="none">
                <circle cx="150" cy="200" r="90" stroke="#2fd8aa" stroke-width="1.5" opacity="0.12"/>
        <circle cx="150" cy="200" r="60" stroke="#2fd8aa" stroke-width="1" opacity="0.08"/>
        <polyline points="112,200 138,226 192,170" stroke="#2fd8aa" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round" opacity="0.2"/>

                <circle cx="420" cy="280" r="80" stroke="#2fd8aa" stroke-width="1.5" opacity="0.08"/>
        <circle cx="420" cy="280" r="52" stroke="#2fd8aa" stroke-width="1" opacity="0.06"/>
        <line x1="392" y1="252" x2="448" y2="308" stroke="#2fd8aa" stroke-width="2"
              stroke-linecap="round" opacity="0.14"/>
        <line x1="448" y1="252" x2="392" y2="308" stroke="#2fd8aa" stroke-width="2"
              stroke-linecap="round" opacity="0.14"/>

                <path d="M240,200 Q300,160 340,280" stroke="#2fd8aa" stroke-width="1"
              opacity="0.08" stroke-dasharray="6 4"/>

                <rect x="240" y="340" width="120" height="150" rx="10"
              stroke="#2fd8aa" stroke-width="1.2" opacity="0.1"/>
        <line x1="260" y1="375" x2="340" y2="375" stroke="#2fd8aa" stroke-width="1" opacity="0.1"/>
        <line x1="260" y1="400" x2="340" y2="400" stroke="#2fd8aa" stroke-width="1" opacity="0.08"/>
        <line x1="260" y1="425" x2="310" y2="425" stroke="#2fd8aa" stroke-width="1" opacity="0.08"/>
                <path d="M260,455 C 275,440 285,465 300,450 S 320,438 335,452"
              stroke="#2fd8aa" stroke-width="1.5" stroke-linecap="round" opacity="0.15"/>
    </svg>

        <div class="im-richieste-content">
        <div class="im-dash-eyebrow">Dashboard Studio</div>
        <h1 class="im-dash-title">Richieste di appuntamento</h1>

        <?php if (( !$_smarty_tpl->hasVariable('data') || empty($_smarty_tpl->getValue('data')))) {?>
            <p class="im-nessuna">Nessuna richiesta in attesa.</p>
        <?php } else { ?>
            <div class="im-richieste-lista">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'app');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('app')->value) {
$foreach0DoElse = false;
?>
                    <?php if ($_smarty_tpl->getValue('app')->getStato() === 'IN_ATTESA') {?>
                    <div class="im-richiesta-card" id="card-<?php echo $_smarty_tpl->getValue('app')->getId();?>
">

                        <div class="im-richiesta-avatar">
                            <?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('app')->getCliente()->getNome(), (int) 0, (int) 1) ?? '', 'UTF-8');
echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('app')->getCliente()->getCognome(), (int) 0, (int) 1) ?? '', 'UTF-8');?>

                        </div>

                        <div class="im-richiesta-cliente">
                            <div class="im-richiesta-nome"><?php echo $_smarty_tpl->getValue('app')->getCliente()->getNome();?>
 <?php echo $_smarty_tpl->getValue('app')->getCliente()->getCognome();?>
</div>
                            <div class="im-richiesta-username">@<?php echo $_smarty_tpl->getValue('app')->getCliente()->getUsername();?>
</div>
                        </div>

                        <div class="im-richiesta-campo">
                            <div class="im-richiesta-label">Giorno richiesta</div>
                            <div class="im-richiesta-valore"><?php if ($_smarty_tpl->getValue('app')->getData()) {
echo $_smarty_tpl->getValue('app')->getData()->format('d/m/Y');
} else { ?>—<?php }?></div>
                        </div>

                        <div class="im-richiesta-campo">
                            <div class="im-richiesta-label">Orario</div>
                            <div class="im-richiesta-valore"><?php if ($_smarty_tpl->getValue('app')->getOraInizio()) {
echo $_smarty_tpl->getValue('app')->getOraInizio()->format('H:i');?>
 – <?php echo $_smarty_tpl->getValue('app')->getOraFine()->format('H:i');
} else { ?>—<?php }?></div>
                        </div>

                        <div class="im-richiesta-campo im-richiesta-idea">
                            <div class="im-richiesta-label">Idea proposta</div>
                            <div class="im-richiesta-valore"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('app')->getNote() ?? null)===null||$tmp==='' ? '—' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</div>
                        </div>

                        <div class="im-richiesta-azioni">
                            <button class="im-btn-accetta" onclick="gestisciRichiesta(<?php echo $_smarty_tpl->getValue('app')->getId();?>
, 'accetta')">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                Accetta
                            </button>
                            <button class="im-btn-rifiuta" onclick="gestisciRichiesta(<?php echo $_smarty_tpl->getValue('app')->getId();?>
, 'rifiuta')">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                Rifiuta
                            </button>
                            <a href="/form_segnalazione?tipo=cliente&id=<?php echo $_smarty_tpl->getValue('app')->getCliente()->getId();?>
" class="im-btn-segnala" title="Segnala cliente">
                                ⚑
                            </a>
                        </div>

                    </div>
                    <?php }?>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
        <?php }?>

        <a href="/dashboardStudio" class="im-btn-back">← Torna alla dashboard</a>
    </div>
</div>

<?php echo '<script'; ?>
>
function gestisciRichiesta(id, azione) {
    var url = azione === 'accetta' ? '/accetta_richiesta' : '/rifiuta_richiesta';
    fetch(url + '?id=' + id)
        .then(function(r) { return r.json(); })
        .then(function(d) {
            if (d.status === 'success') {
                var card = document.getElementById('card-' + id);
                card.classList.add('im-richiesta-rimossa');
                setTimeout(function() { card.remove(); }, 400);
            } else {
                alert(d.message ?? 'Errore durante l\'operazione.');
            }
        })
        .catch(function() { alert('Errore di rete.'); });
}
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
