<?php
/* Smarty version 5.8.0, created on 2026-06-26 11:17:26
  from 'file:pages/studio/dashboardStudio.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e43a6538938_91346903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c05dfbb546cd9ae94f9dea4b3fdb6c19d51da9e2' => 
    array (
      0 => 'pages/studio/dashboardStudio.tpl',
      1 => 1782465365,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e43a6538938_91346903 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11405446736a3e43a6534ca8_99719859', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12911154786a3e43a6536160_56538250', "extra_css");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13538939836a3e43a6536666_68438383', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_11405446736a3e43a6534ca8_99719859 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>
Dashboard — InkMaster Studio<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_12911154786a3e43a6536160_56538250 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>

    <link rel="stylesheet" href="/CSS/dashboardStudio.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_13538939836a3e43a6536666_68438383 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/studio';
?>

<div class="im-dash-wrap">
        <svg class="im-dash-bg" viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice"
         xmlns="http://www.w3.org/2000/svg">
        <g class="im-dash-wave-group" fill="none" stroke="#2fd8aa" stroke-linecap="round">
                        <path stroke-width="1" opacity="0.6"
                  d="M-60,310 C 80,270 160,350 300,310 S 520,260 660,310 S 880,360 1020,310 S 1240,260 1500,310"/>
            <path stroke-width="1" opacity="0.5"
                  d="M-60,350 C 100,305 200,395 340,350 S 560,295 700,350 S 920,400 1060,350 S 1280,295 1500,350"/>
                        <path stroke-width="1.4" opacity="0.8"
                  d="M-60,430 C 100,370 200,500 360,430 S 600,360 760,430 S 1000,500 1160,430 S 1380,360 1500,430"/>
            <path stroke-width="1" opacity="0.5"
                  d="M-60,475 C 120,408 230,548 400,475 S 650,402 810,475 S 1050,548 1210,475 S 1420,402 1500,475"/>
                        <path stroke-width="2" opacity="1"
                  d="M-60,560 C 140,460 280,660 480,560 S 760,450 960,560 S 1220,660 1500,560"/>
            <path stroke-width="1.2" opacity="0.7"
                  d="M-60,610 C 160,502 310,718 520,610 S 810,494 1010,610 S 1270,718 1500,610"/>
                        <path stroke-width="1.5"
                  d="M440,540 C 455,515 480,510 475,538 C 490,512 510,520 500,545"/>
            <path stroke-width="1.5"
                  d="M920,540 C 935,515 960,510 955,538 C 970,512 990,520 980,545"/>
            <path stroke-width="1.2" opacity="0.7"
                  d="M190,415 C 202,395 222,390 218,413 C 230,391 246,398 238,420"/>
            <path stroke-width="1.2" opacity="0.7"
                  d="M1180,412 C 1192,392 1212,387 1208,410 C 1220,388 1236,395 1228,417"/>
                        <path stroke-width="1" opacity="0.5"
                  d="M-60,700 C 180,640 320,760 540,700 S 840,630 1040,700 S 1300,760 1500,700"/>
            <path stroke-width="0.8" opacity="0.35"
                  d="M-60,750 C 200,685 350,815 580,750 S 890,678 1090,750 S 1340,815 1500,750"/>
                        <circle cx="480" cy="528" r="3" stroke-width="1" opacity="0.6"/>
            <circle cx="484" cy="519" r="1.5" stroke-width="1" opacity="0.5"/>
            <circle cx="474" cy="521" r="1.2" stroke-width="1" opacity="0.4"/>
            <circle cx="960" cy="528" r="3" stroke-width="1" opacity="0.6"/>
            <circle cx="964" cy="519" r="1.5" stroke-width="1" opacity="0.5"/>
            <circle cx="954" cy="521" r="1.2" stroke-width="1" opacity="0.4"/>
        </g>
    </svg>
        <div class="im-dash-content">
        <div class="im-dash-eyebrow">Dashboard Studio</div>
        <h1 class="im-dash-title">Bentornato, <?php echo $_smarty_tpl->getValue('_sessione')['username'];?>
</h1>
        <div class="im-dash-grid">
                        <a href="/storico_appuntamenti" class="im-dash-card">
                <div class="im-dash-card-icon">
                    <svg viewBox="0 0 24 24"><circle cx="9" cy="7" r="4"/><path d="M3 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/><path d="M21 21v-2a4 4 0 0 0-3-3.85"/></svg>
                </div>
                <div class="im-dash-card-label">I miei clienti</div>
                <div class="im-dash-card-value">Gestisci i tuoi clienti</div>
                <div class="im-dash-card-arrow">→</div>
            </a>
                        <a href="/visualizza_clienti" class="im-dash-card">
                <div class="im-dash-card-icon">
                    <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                </div>
                <div class="im-dash-card-label">Richieste</div>
                <div class="im-dash-card-value">Accetta o rifiuta appuntamenti</div>
                <div class="im-dash-card-arrow">→</div>
            </a>
                        <a href="/portfolio_studio" class="im-dash-card">
                <div class="im-dash-card-icon">
                    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                </div>
                <div class="im-dash-card-label">Portfolio</div>
                <div class="im-dash-card-value">Pubblica e gestisci le opere</div>
                <div class="im-dash-card-arrow">→</div>
            </a>
                        <a href="/visualizza_calendario" class="im-dash-card">
                <div class="im-dash-card-icon">
                    <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
                <div class="im-dash-card-label">Calendario</div>
                <div class="im-dash-card-value"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),'%d/%m/%Y');?>
</div>
                <div class="im-dash-card-arrow">→</div>
            </a>
                        <a href="/visualizza_pagamenti" class="im-dash-card">
                <div class="im-dash-card-icon">
                    <svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
                <div class="im-dash-card-label">Pagamenti</div>
                <div class="im-dash-card-value">Storico e incassi</div>
                <div class="im-dash-card-arrow">→</div>
            </a>
                        <a href="/gestisci_team" class="im-dash-card">
                <div class="im-dash-card-icon">
                    <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.85"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div class="im-dash-card-label">Team</div>
                <div class="im-dash-card-value">Gestisci il tuo team</div>
                <div class="im-dash-card-arrow">→</div>
            </a>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
