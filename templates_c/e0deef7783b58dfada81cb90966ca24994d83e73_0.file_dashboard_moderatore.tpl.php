<?php
/* Smarty version 5.8.0, created on 2026-06-26 17:03:13
  from 'file:pages/moderatore/dashboard_moderatore.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e94b14ddf53_30032158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0deef7783b58dfada81cb90966ca24994d83e73' => 
    array (
      0 => 'pages/moderatore/dashboard_moderatore.tpl',
      1 => 1782482167,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e94b14ddf53_30032158 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/moderatore';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6950197756a3e94b14c4066_37532683', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9520240646a3e94b14c6fc1_07440968', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15701847816a3e94b14c7c15_98075790', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_6950197756a3e94b14c4066_37532683 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/moderatore';
?>
Dashboard Amministratore — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_9520240646a3e94b14c6fc1_07440968 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/moderatore';
?>

    <link rel="stylesheet" href="/CSS/home.css">
    <link rel="stylesheet" href="/CSS/admin.css">
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_15701847816a3e94b14c7c15_98075790 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/moderatore';
?>

<div class="adm-page">

        <div style="position:fixed;inset:0;z-index:0;pointer-events:none;overflow:hidden;">
        <div class="im-blob im-blob-1" style="width:600px;height:600px;left:-180px;top:-200px;"></div>
        <div class="im-blob im-blob-2" style="width:500px;height:500px;right:-120px;top:80px;animation-delay:-4s;"></div>
    </div>

        <header class="adm-topbar">
        <div class="adm-topbar-logo">InkMaster</div>
        <div class="adm-topbar-title">Dashboard Amministratore</div>
        <div class="adm-topbar-right">
            <a href="/accedi_segnalazioni" class="adm-topbar-icon" title="Segnalazioni">
                🔔
                <?php if ($_smarty_tpl->getValue('data')['kpi']['segnalazioni_aperte'] > 0) {?>
                    <span class="adm-topbar-badge"><?php echo $_smarty_tpl->getValue('data')['kpi']['segnalazioni_aperte'];?>
</span>
                <?php }?>
            </a>
            <div class="adm-topbar-sep"></div>
            <div class="adm-topbar-avatar"><?php echo mb_strtoupper((string) substr((string) (($tmp = $_SESSION['username'] ?? null)===null||$tmp==='' ? 'A' ?? null : $tmp), (int) 0, (int) 1) ?? '', 'UTF-8');?>
</div>
            <span class="adm-topbar-uname"><?php echo htmlspecialchars((string)(($tmp = $_SESSION['username'] ?? null)===null||$tmp==='' ? 'Admin' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span>
            <a href="/logout" class="adm-topbar-logout">Esci</a>
        </div>
    </header>

        <div class="adm-body">

        <div class="adm-welcome">
            <div class="adm-section-label">Pannello di controllo</div>
            <h1 class="adm-welcome-title">Bentornato, <span><?php echo htmlspecialchars((string)(($tmp = $_SESSION['username'] ?? null)===null||$tmp==='' ? 'Amministratore' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span></h1>
        </div>

                <div class="adm-kpi-row">
            <div class="adm-kpi-card">
                <div class="adm-kpi-top">
                    <span class="adm-kpi-label">Utenti registrati</span>
                    <span class="adm-kpi-icon">👤</span>
                </div>
                <div class="adm-kpi-value"><?php echo $_smarty_tpl->getValue('data')['kpi']['utenti_registrati'];?>
</div>
                <div class="adm-kpi-trend adm-kpi-trend--up">↑ clienti attivi</div>
            </div>
            <div class="adm-kpi-card">
                <div class="adm-kpi-top">
                    <span class="adm-kpi-label">Studi registrati</span>
                    <span class="adm-kpi-icon">🏪</span>
                </div>
                <div class="adm-kpi-value"><?php echo $_smarty_tpl->getValue('data')['kpi']['studi_registrati'];?>
</div>
                <div class="adm-kpi-trend adm-kpi-trend--up">↑ studi attivi</div>
            </div>
            <div class="adm-kpi-card">
                <div class="adm-kpi-top">
                    <span class="adm-kpi-label">Prenotazioni attive</span>
                    <span class="adm-kpi-icon">📅</span>
                </div>
                <div class="adm-kpi-value"><?php echo $_smarty_tpl->getValue('data')['kpi']['prenotazioni_attive'];?>
</div>
                <div class="adm-kpi-trend adm-kpi-trend--up">↑ in corso</div>
            </div>
            <div class="adm-kpi-card adm-kpi-card--alert">
                <div class="adm-kpi-top">
                    <span class="adm-kpi-label">Segnalazioni aperte</span>
                    <span class="adm-kpi-icon">⚠</span>
                </div>
                <div class="adm-kpi-value"><?php echo $_smarty_tpl->getValue('data')['kpi']['segnalazioni_aperte'];?>
</div>
                <?php if ($_smarty_tpl->getValue('data')['kpi']['segnalazioni_aperte'] > 0) {?>
                    <a href="/accedi_segnalazioni" class="adm-kpi-trend adm-kpi-trend--alert" style="text-decoration:none;">→ Gestisci ora</a>
                <?php } else { ?>
                    <div class="adm-kpi-trend adm-kpi-trend--up">✓ Nessuna aperta</div>
                <?php }?>
            </div>
        </div>

                <div class="adm-charts-grid">

            <div class="adm-chart-card">
                <div class="adm-chart-title">Nuove registrazioni — ultimi 6 mesi</div>
                <div class="adm-chart-wrap"><canvas id="chartRegistrazioni"></canvas></div>
            </div>

            <div class="adm-chart-card">
                <div class="adm-chart-title">Stili più cercati</div>
                <div class="adm-chart-wrap"><canvas id="chartStili"></canvas></div>
            </div>

            <div class="adm-chart-card">
                <div class="adm-chart-title">Tipo di utenti</div>
                <div class="adm-chart-wrap"><canvas id="chartUtenti"></canvas></div>
            </div>

            <div class="adm-chart-card">
                <div class="adm-chart-title">Prenotazioni completate vs cancellate</div>
                <div class="adm-chart-wrap"><canvas id="chartPrenotazioni"></canvas></div>
            </div>

        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
Chart.defaults.color = '#6b736f';
Chart.defaults.borderColor = 'rgba(255,255,255,0.06)';
Chart.defaults.font.family = "'Archivo', sans-serif";

const green = '#2fd8aa';
const blue  = '#4fa3d1';
const red   = '#e05252';
const muted = '#3f4a47';

new Chart(document.getElementById('chartRegistrazioni'), {
    type: 'line',
    data: {
        labels: ['Dic','Gen','Feb','Mar','Apr','Mag'],
        datasets: [
            { label: 'Utenti', data: [210,260,310,420,490,590], borderColor: blue, backgroundColor: 'rgba(79,163,209,.12)', tension: .4, fill: true, pointRadius: 3 },
            { label: 'Studi',  data: [12,18,22,31,38,48],       borderColor: green, backgroundColor: 'rgba(47,216,170,.08)', tension: .4, fill: true, pointRadius: 3 }
        ]
    },
    options: { responsive: true, maintainAspectRatio: false,
        plugins: { legend: { labels: { color: '#9aa3a0', boxWidth: 12, font: { size: 11 } } } },
        scales: { x: { ticks: { font: { size: 10 } } }, y: { ticks: { font: { size: 10 } } } }
    }
});

new Chart(document.getElementById('chartStili'), {
    type: 'bar',
    data: {
        labels: ['Fine Line','Realistico','Tradizionale','Maori','Old School','Altro'],
        datasets: [{ label: 'Ricerche', data: [1800,1540,1120,720,580,340], backgroundColor: blue, borderRadius: 4 }]
    },
    options: { responsive: true, maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: { x: { ticks: { font: { size: 9 } } }, y: { ticks: { font: { size: 10 } } } }
    }
});

new Chart(document.getElementById('chartUtenti'), {
    type: 'doughnut',
    data: {
        labels: ['Clienti', 'Studi', 'Non registrati'],
        datasets: [{
            data: [<?php echo $_smarty_tpl->getValue('data')['tipo_utenti']['clienti_percentuale'];?>
, <?php echo $_smarty_tpl->getValue('data')['tipo_utenti']['studi_percentuale'];?>
, <?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('math')->handle(array('equation'=>"100 - a - b",'a'=>$_smarty_tpl->getValue('data')['tipo_utenti']['clienti_percentuale'],'b'=>$_smarty_tpl->getValue('data')['tipo_utenti']['studi_percentuale']), $_smarty_tpl);?>
],
            backgroundColor: [blue, green, muted],
            borderWidth: 0,
            hoverOffset: 6
        }]
    },
        options: { responsive: true, maintainAspectRatio: false, cutout: '65%',
        plugins: { legend: { position: 'right', labels: { color: '#9aa3a0', boxWidth: 12, font: { size: 11 }, padding: 14 } } }
    }
});

new Chart(document.getElementById('chartPrenotazioni'), {
    type: 'bar',
    data: {
        labels: ['Feb','Mar','Apr','Mag'],
        datasets: [
            { label: 'Completate', data: [180,240,310,390], backgroundColor: green, borderRadius: 4 },
            { label: 'Cancellate', data: [22,18,28,14],     backgroundColor: red,   borderRadius: 4 }
        ]
    },
    options: { responsive: true, maintainAspectRatio: false,
        plugins: { legend: { labels: { color: '#9aa3a0', boxWidth: 12, font: { size: 11 } } } },
        scales: { x: { ticks: { font: { size: 10 } } }, y: { ticks: { font: { size: 10 } } } }
    }
});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
