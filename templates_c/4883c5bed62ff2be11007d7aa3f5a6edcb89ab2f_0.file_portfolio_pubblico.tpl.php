<?php
/* Smarty version 5.8.0, created on 2026-06-26 01:25:03
  from 'file:pages/portfolio/portfolio_pubblico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3db8cfdb4d00_52291476',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4883c5bed62ff2be11007d7aa3f5a6edcb89ab2f' => 
    array (
      0 => 'pages/portfolio/portfolio_pubblico.tpl',
      1 => 1782429899,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3db8cfdb4d00_52291476 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/portfolio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10872050626a3db8cfdaa793_55558494', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20558787276a3db8cfdabed5_58025325', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20658916836a3db8cfdac473_73370003', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_10872050626a3db8cfdaa793_55558494 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/portfolio';
?>
Portfolio — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_20558787276a3db8cfdabed5_58025325 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/portfolio';
?>

    <link rel="stylesheet" href="/CSS/portfolio.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_20658916836a3db8cfdac473_73370003 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/portfolio';
?>

<div class="pf-bg">
    <div class="pf-blob pf-blob-1"></div>
    <div class="pf-blob pf-blob-2"></div>
    <svg class="pf-geo" viewBox="0 0 800 600" preserveAspectRatio="xMidYMid slice">
        <polygon class="pf-geo-1" points="100,50 160,150 40,150"/>
        <polygon class="pf-geo-2" points="650,80 720,200 580,200"/>
        <rect class="pf-geo-3" x="680" y="400" width="60" height="60" rx="8"/>
        <polygon class="pf-geo-4" points="60,380 110,460 10,460"/>
        <circle class="pf-geo-5" cx="400" cy="520" r="40"/>
        <rect class="pf-geo-6" x="300" y="60" width="40" height="40" rx="6"/>
    </svg>
</div>

<div class="pf-page">
    <div class="pf-header">
        <a href="/scegli_studio?id=<?php echo $_smarty_tpl->getValue('studioId');?>
" class="pf-back">← Torna allo studio</a>
        <h1 class="pf-title">Portfolio</h1>
    </div>

    <div class="pf-grid">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('pubblica'), 'pub');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('pub')->value) {
$foreach0DoElse = false;
?>
            <a href="/dettagli_pubblicazione?id=<?php echo $_smarty_tpl->getValue('pub')->getId();?>
" class="pf-slot">
                <img src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getPercorsoImmagine(), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
">
                <div class="pf-label"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pub')->getTitolo(), ENT_QUOTES, 'UTF-8', true);?>
</div>
            </a>
        <?php
}
if ($foreach0DoElse) {
?>
            <p class="pf-empty">Nessuna pubblicazione disponibile.</p>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>

    <?php if ($_smarty_tpl->getValue('totPagine') > 1) {?>
    <div class="pf-pagination">
        <?php if ($_smarty_tpl->getValue('pagina') > 1) {?>
            <a href="/portfolio_pubblico?id=<?php echo $_smarty_tpl->getValue('studioId');?>
&page=<?php echo $_smarty_tpl->getValue('pagina')-1;?>
" class="pf-page-btn">← Precedente</a>
        <?php }?>
        <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getValue('totPagine')+1 - (1) : 1-($_smarty_tpl->getValue('totPagine'))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
            <a href="/portfolio_pubblico?id=<?php echo $_smarty_tpl->getValue('studioId');?>
&page=<?php echo $_smarty_tpl->getValue('i');?>
" class="pf-page-btn <?php if ($_smarty_tpl->getValue('i') === $_smarty_tpl->getValue('pagina')) {?>pf-page-btn--active<?php }?>"><?php echo $_smarty_tpl->getValue('i');?>
</a>
        <?php }
}
?>
        <?php if ($_smarty_tpl->getValue('pagina') < $_smarty_tpl->getValue('totPagine')) {?>
            <a href="/portfolio_pubblico?id=<?php echo $_smarty_tpl->getValue('studioId');?>
&page=<?php echo $_smarty_tpl->getValue('pagina')+1;?>
" class="pf-page-btn">Successiva →</a>
        <?php }?>
    </div>
    <?php }?>
</div>
<?php
}
}
/* {/block "content"} */
}
