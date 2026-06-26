<?php
/* Smarty version 5.8.0, created on 2026-06-26 11:04:29
  from 'file:pages/studio/GestisciTeam.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e409ddecbc6_23377909',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b453bbf4c8ae971b01d2da6fdf94886db187839' => 
    array (
      0 => 'pages/studio/GestisciTeam.tpl',
      1 => 1782464345,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e409ddecbc6_23377909 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17985787956a3e409dde0d52_87013043', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13335499066a3e409dde2028_98057254', "extra_css");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16505035016a3e409dde2820_58476469', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_17985787956a3e409dde0d52_87013043 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>
Gestisci Team — InkMaster Studio<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_13335499066a3e409dde2028_98057254 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>

    <link rel="stylesheet" href="/CSS/GestisciTeam.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_16505035016a3e409dde2820_58476469 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>

<div class="im-team-wrap">

    <div class="im-team-content">
        <div class="im-team-eyebrow">Dashboard Studio</div>
        <h1 class="im-team-title">Gestisci il Team</h1>

        <?php if ((true && ($_smarty_tpl->hasVariable('messaggio') && null !== ($_smarty_tpl->getValue('messaggio') ?? null)))) {?>
            <p class="im-team-msg"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('messaggio'), ENT_QUOTES, 'UTF-8', true);?>
</p>
        <?php }?>

        <div class="im-team-list">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('tatuatori')) === 0) {?>
                <p class="im-team-empty">Nessun tatuatore nel team.</p>
            <?php } else { ?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tatuatori'), 't');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('t')->value) {
$foreach0DoElse = false;
?>
                <div class="im-team-card">
                    <div class="im-team-avatar"><?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('t')->getNome(), (int) 0, (int) 1) ?? '', 'UTF-8');
echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('t')->getCognome(), (int) 0, (int) 1) ?? '', 'UTF-8');?>
</div>
                    <div class="im-team-info">
                        <span class="im-team-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('t')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('t')->getCognome(), ENT_QUOTES, 'UTF-8', true);?>
</span>
                        <span class="im-team-dob"><?php echo $_smarty_tpl->getValue('t')->getDataNascita()->format('d/m/Y');?>
</span>
                        <div class="im-team-stili">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('t')->getStili(), 's');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('s')->value) {
$foreach1DoElse = false;
?>
                                <span class="im-team-chip"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('s')->getNome(), ENT_QUOTES, 'UTF-8', true);?>
</span>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </div>
                    </div>
                    <form method="POST" action="/elimina_tatuatore">
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('t')->getId();?>
">
                        <button type="submit" class="im-team-remove">Rimuovi</button>
                    </form>
                </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php }?>
        </div>

        <a href="/gestisci_team?mostra_form=1" class="im-team-toggle-btn">+ Aggiungi Tatuatore</a>

        <?php if ((true && (true && null !== ($_GET['mostra_form'] ?? null)))) {?>
        <form class="im-team-form" method="POST" action="/aggiungi_tatuatore">
            <div class="im-team-form-row">
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="text" name="cognome" placeholder="Cognome" required>
            </div>
            <div class="im-team-form-row">
                <input type="date" name="data_nascita" required>
            </div>
            <div class="im-team-stili-grid">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('stili'), 's');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('s')->value) {
$foreach2DoElse = false;
?>
                <label class="im-team-stile-label">
                    <input type="checkbox" name="stili[]" value="<?php echo $_smarty_tpl->getValue('s')->getId();?>
">
                    <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('s')->getNome(), ENT_QUOTES, 'UTF-8', true);?>

                </label>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
            <button type="submit" class="im-team-submit">Salva</button>
        </form>
        <?php }?>

        <a href="/dashboardStudio" class="im-team-back">← Torna alla dashboard</a>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
