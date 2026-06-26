<?php
/* Smarty version 5.8.0, created on 2026-06-26 10:15:10
  from 'file:pages/moderatore/segnalazioni.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e512e3302a9_54707116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13377790e5ca7833ba35a3a58437faf1aa6b134d' => 
    array (
      0 => 'pages/moderatore/segnalazioni.tpl',
      1 => 1782468865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e512e3302a9_54707116 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13517145216a3e512e1a43a4_05847610', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19613982446a3e512e1aad27_78709104', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_347043806a3e512e1ac5e6_41329590', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_13517145216a3e512e1a43a4_05847610 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
?>
Segnalazioni — InkMaster Admin<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_19613982446a3e512e1aad27_78709104 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
?>

    <link rel="stylesheet" href="/CSS/home.css">
    <link rel="stylesheet" href="/CSS/admin.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_347043806a3e512e1ac5e6_41329590 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
?>

<div class="adm-page">

    <div style="position:fixed;inset:0;z-index:0;pointer-events:none;overflow:hidden;">
        <div class="im-blob im-blob-1" style="width:600px;height:600px;left:-180px;top:-200px;"></div>
        <div class="im-blob im-blob-2" style="width:500px;height:500px;right:-120px;top:80px;animation-delay:-4s;"></div>
    </div>

    <header class="adm-topbar">
        <div class="adm-topbar-logo">InkMaster</div>
        <div class="adm-topbar-title">Gestione Segnalazioni</div>
        <div class="adm-topbar-right">
            <a href="/dashboard_moderatore" class="adm-topbar-icon" title="Dashboard">⬅</a>
            <div class="adm-topbar-sep"></div>
            <div class="adm-topbar-user">
                <div class="adm-topbar-avatar"><?php echo mb_strtoupper((string) substr((string) (($tmp = $_SESSION['username'] ?? null)===null||$tmp==='' ? 'A' ?? null : $tmp), (int) 0, (int) 1) ?? '', 'UTF-8');?>
</div>
                <div>
                    <div class="adm-topbar-uname"><?php echo htmlspecialchars((string)(($tmp = $_SESSION['username'] ?? null)===null||$tmp==='' ? 'Admin' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</div>
                    <a href="/logout" class="adm-topbar-logout">Esci</a>
                </div>
            </div>
        </div>
    </header>

    <div class="adm-body">

        <div class="adm-welcome">
            <div class="adm-section-label">Moderazione</div>
            <h1 class="adm-welcome-title">Utenti <span>segnalati</span></h1>
            <p class="adm-welcome-sub">Elenco degli utenti che hanno ricevuto segnalazioni. Premi "Banna" per applicare una sanzione.</p>
        </div>

        <div class="adm-table-card">
            <div class="adm-table-head">
                <span class="adm-table-title">Gestione utenti</span>
                <span class="adm-table-count">👥 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('data'));?>
 segnalazioni</span>
            </div>

            <?php if ($_smarty_tpl->getValue('data')) {?>
            <table class="adm-table">
                <thead>
                    <tr>
                        <th>Utente</th>
                        <th>Motivo</th>
                        <th>Stato</th>
                        <th>Data</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'seg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('seg')->value) {
$foreach0DoElse = false;
?>
                    <?php if ($_smarty_tpl->getValue('seg')->getCliente()) {?>
                        <?php $_smarty_tpl->assign('utente', $_smarty_tpl->getValue('seg')->getCliente(), false, NULL);?>
                        <?php $_smarty_tpl->assign('tipo', 'cliente', false, NULL);?>
                        <?php $_smarty_tpl->assign('nomeUtente', ((string)$_smarty_tpl->getValue('utente')->getNome())." ".((string)$_smarty_tpl->getValue('utente')->getCognome()), false, NULL);?>
                        <?php $_smarty_tpl->assign('iniziali', ((string)(substr((string) $_smarty_tpl->getValue('utente')->getNome(), (int) 0, (int) 1))).((string)(substr((string) $_smarty_tpl->getValue('utente')->getCognome(), (int) 0, (int) 1))), false, NULL);?>
                    <?php } elseif ($_smarty_tpl->getValue('seg')->getStudio()) {?>
                        <?php $_smarty_tpl->assign('utente', $_smarty_tpl->getValue('seg')->getStudio(), false, NULL);?>
                        <?php $_smarty_tpl->assign('tipo', 'studio', false, NULL);?>
                        <?php $_smarty_tpl->assign('nomeUtente', $_smarty_tpl->getValue('utente')->getNome(), false, NULL);?>
                        <?php $_smarty_tpl->assign('iniziali', mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('utente')->getNome(), (int) 0, (int) 2) ?? '', 'UTF-8'), false, NULL);?>
                    <?php } else { ?>
                        <?php continue 1;?>
                    <?php }?>
                    <tr>
                        <td>
                            <div class="adm-user-cell">
                                <div class="adm-user-av adm-user-av--<?php echo $_smarty_tpl->getValue('tipo');?>
"><?php echo mb_strtoupper((string) $_smarty_tpl->getValue('iniziali') ?? '', 'UTF-8');?>
</div>
                                <div>
                                    <div class="adm-user-name"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('nomeUtente'), ENT_QUOTES, 'UTF-8', true);?>
</div>
                                    <div class="adm-user-email"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('utente')->getEmail(), ENT_QUOTES, 'UTF-8', true);?>
</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="adm-motivo"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('seg')->getMotivo(), ENT_QUOTES, 'UTF-8', true);?>
</span></td>
                        <td>
                            <?php if ($_smarty_tpl->getValue('seg')->getStato() == 'APERTA') {?>
                                <span class="adm-badge adm-badge--red">Aperta</span>
                            <?php } else { ?>
                                <span class="adm-badge adm-badge--muted">Chiusa</span>
                            <?php }?>
                        </td>
                        <td class="adm-date"><?php echo $_smarty_tpl->getValue('seg')->getData()->format('d M Y');?>
</td>
                        <td>
                            <a href="/seleziona_utente?id=<?php echo $_smarty_tpl->getValue('utente')->getId();?>
&tipo=<?php echo $_smarty_tpl->getValue('tipo');?>
" class="adm-btn-ban">Banna</a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
            <?php } else { ?>
            <div class="adm-empty">
                <div class="adm-empty-icon">✓</div>
                <p>Nessuna segnalazione aperta.</p>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
