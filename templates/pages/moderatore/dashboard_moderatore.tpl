{extends file='layouts/base.tpl'}

{block name="title"}Dashboard Amministratore — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/home.css">
    <link rel="stylesheet" href="/CSS/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
{/block}

{block name="content"}
<div class="adm-page">

    {* background blobs *}
    <div style="position:fixed;inset:0;z-index:0;pointer-events:none;overflow:hidden;">
        <div class="im-blob im-blob-1" style="width:600px;height:600px;left:-180px;top:-200px;"></div>
        <div class="im-blob im-blob-2" style="width:500px;height:500px;right:-120px;top:80px;animation-delay:-4s;"></div>
    </div>

    {* topbar *}
    <header class="adm-topbar">
        <div class="adm-topbar-logo">InkMaster</div>
        <div class="adm-topbar-title">Dashboard Amministratore</div>
        <div class="adm-topbar-right">
            <a href="/accedi_segnalazioni" class="adm-topbar-icon" title="Segnalazioni">
                🔔
                {if $data['kpi']['segnalazioni_aperte'] > 0}
                    <span class="adm-topbar-badge">{$data['kpi']['segnalazioni_aperte']}</span>
                {/if}
            </a>
            <div class="adm-topbar-sep"></div>
            <div class="adm-topbar-avatar">{$smarty.session.username|default:'A'|substr:0:1|upper}</div>
            <span class="adm-topbar-uname">{$smarty.session.username|default:'Admin'|escape}</span>
            <a href="/logout" class="adm-topbar-logout">Esci</a>
        </div>
    </header>

    {* body *}
    <div class="adm-body">

        <div class="adm-welcome">
            <div class="adm-section-label">Pannello di controllo</div>
            <h1 class="adm-welcome-title">Bentornato, <span>{$smarty.session.username|default:'Amministratore'|escape}</span></h1>
        </div>

        {* KPI *}
        <div class="adm-kpi-row">
            <div class="adm-kpi-card">
                <div class="adm-kpi-top">
                    <span class="adm-kpi-label">Utenti registrati</span>
                    <span class="adm-kpi-icon">👤</span>
                </div>
                <div class="adm-kpi-value">{$data['kpi']['utenti_registrati']}</div>
                <div class="adm-kpi-trend adm-kpi-trend--up">↑ clienti attivi</div>
            </div>
            <div class="adm-kpi-card">
                <div class="adm-kpi-top">
                    <span class="adm-kpi-label">Studi registrati</span>
                    <span class="adm-kpi-icon">🏪</span>
                </div>
                <div class="adm-kpi-value">{$data['kpi']['studi_registrati']}</div>
                <div class="adm-kpi-trend adm-kpi-trend--up">↑ studi attivi</div>
            </div>
            <div class="adm-kpi-card">
                <div class="adm-kpi-top">
                    <span class="adm-kpi-label">Prenotazioni attive</span>
                    <span class="adm-kpi-icon">📅</span>
                </div>
                <div class="adm-kpi-value">{$data['kpi']['prenotazioni_attive']}</div>
                <div class="adm-kpi-trend adm-kpi-trend--up">↑ in corso</div>
            </div>
            <div class="adm-kpi-card adm-kpi-card--alert">
                <div class="adm-kpi-top">
                    <span class="adm-kpi-label">Segnalazioni aperte</span>
                    <span class="adm-kpi-icon">⚠</span>
                </div>
                <div class="adm-kpi-value">{$data['kpi']['segnalazioni_aperte']}</div>
                {if $data['kpi']['segnalazioni_aperte'] > 0}
                    <a href="/accedi_segnalazioni" class="adm-kpi-trend adm-kpi-trend--alert" style="text-decoration:none;">→ Gestisci ora</a>
                {else}
                    <div class="adm-kpi-trend adm-kpi-trend--up">✓ Nessuna aperta</div>
                {/if}
            </div>
        </div>

        {* grafici 2x2 *}
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

<script>
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
            data: [{$data['tipo_utenti']['clienti_percentuale']}, {$data['tipo_utenti']['studi_percentuale']}, {math equation="100 - a - b" a=$data['tipo_utenti']['clienti_percentuale'] b=$data['tipo_utenti']['studi_percentuale']}],
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
</script>
{/block}
