<?php
/* Smarty version 5.8.0, created on 2026-06-26 15:19:13
  from 'file:pages/moderatore/dashboard_moderatore.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e9871c575e3_80982051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f52d8e34b1356c28b903b717e9cf230c0455a06d' => 
    array (
      0 => 'pages/moderatore/dashboard_moderatore.tpl',
      1 => 1782487144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e9871c575e3_80982051 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12487678446a3e9871c1ec73_00663527', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_890930486a3e9871c229b1_90307637', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12021837086a3e9871c23244_38131692', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_12487678446a3e9871c1ec73_00663527 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
?>
Dashboard Amministratore — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_890930486a3e9871c229b1_90307637 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\fbcru\\Programmazione Web\\INkMaster\\InkMaster\\templates\\pages\\moderatore';
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
class Block_12021837086a3e9871c23244_38131692 extends \Smarty\Runtime\Block
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
                <div class="adm-chart-title">Utenti registrati</div>
                <div class="adm-chart-wrap"><canvas id="chartRegistrazioni"></canvas></div>
            </div>

            <div class="adm-chart-card">
                <div class="adm-chart-title">Stili più praticati</div>
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
    type: 'bar',
    data: {
        labels: ['Clienti', 'Studi'],
        datasets: [{
            data: [<?php echo $_smarty_tpl->getValue('data')['kpi']['utenti_registrati'];?>
, <?php echo $_smarty_tpl->getValue('data')['kpi']['studi_registrati'];?>
],
            backgroundColor: [blue, green],
            borderRadius: 6
        }]
    },
    options: { responsive: true, maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: { x: { ticks: { font: { size: 12 } } }, y: { ticks: { font: { size: 10 }, stepSize: 1 } } }
    }
});

new Chart(document.getElementById('chartStili'), {
    type: 'bar',
    data: {
        labels: <?php echo $_smarty_tpl->getValue('data')['stili_labels'];?>
,
        datasets: [{ label: 'Tatuatori', data: <?php echo $_smarty_tpl->getValue('data')['stili_values'];?>
, backgroundColor: blue, borderRadius: 4 }]
    },
    options: { responsive: true, maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: { x: { ticks: { font: { size: 9 } } }, y: { ticks: { font: { size: 10 }, stepSize: 1 } } }
    }
});

new Chart(document.getElementById('chartUtenti'), {
    type: 'doughnut',
    data: {
        labels: [
            'Clienti — <?php echo $_smarty_tpl->getValue('data')['tipo_utenti']['clienti_percentuale'];?>
%',
            'Studi — <?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('math')->handle(array('equation'=>"100 - a",'a'=>$_smarty_tpl->getValue('data')['tipo_utenti']['clienti_percentuale']), $_smarty_tpl);?>
%'
        ],
        datasets: [{
            data: [<?php echo $_smarty_tpl->getValue('data')['tipo_utenti']['clienti_percentuale'];?>
, <?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('math')->handle(array('equation'=>"100 - a",'a'=>$_smarty_tpl->getValue('data')['tipo_utenti']['clienti_percentuale']), $_smarty_tpl);?>
],
            backgroundColor: [blue, green],
            borderWidth: 0,
            hoverOffset: 6
        }]
    },
    options: { responsive: true, maintainAspectRatio: false, cutout: '65%',
        plugins: {
            legend: { position: 'right', labels: { color: '#9aa3a0', boxWidth: 12, font: { size: 11 }, padding: 14 } },
            tooltip: { callbacks: { label: ctx => ctx.label } }
        }
    }
});

new Chart(document.getElementById('chartPrenotazioni'), {
    type: 'bar',
    data: {
        labels: <?php echo $_smarty_tpl->getValue('data')['app_labels'];?>
,
        datasets: [{
            label: 'Appuntamenti',
            data: <?php echo $_smarty_tpl->getValue('data')['app_values'];?>
,
            backgroundColor: [blue, green, muted, '#f0a500', red],
            borderRadius: 4
        }]
    },
    options: { responsive: true, maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: { x: { ticks: { font: { size: 9 } } }, y: { ticks: { font: { size: 10 }, stepSize: 1 } } }
    }
});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
