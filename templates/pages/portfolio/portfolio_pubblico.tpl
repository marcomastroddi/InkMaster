{extends file='layouts/base.tpl'}

{block name="title"}Portfolio — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/portfolio.css">
{/block}

{block name="content"}
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
        <a href="/scegli_studio?id={$studioId}" class="pf-back">← Torna allo studio</a>
        <h1 class="pf-title">Portfolio</h1>
    </div>

    <div class="pf-grid">
        {foreach $pubblica as $pub}
            <a href="/dettagli_pubblicazione?id={$pub->getId()}" class="pf-slot">
                <img src="{$pub->getPercorsoImmagine()|escape}" alt="{$pub->getTitolo()|escape}">
                <div class="pf-label">{$pub->getTitolo()|escape}</div>
            </a>
        {foreachelse}
            <p class="pf-empty">Nessuna pubblicazione disponibile.</p>
        {/foreach}
    </div>

    {if $totPagine > 1}
    <div class="pf-pagination">
        {if $pagina > 1}
            <a href="/portfolio_pubblico?id={$studioId}&page={$pagina - 1}" class="pf-page-btn">← Precedente</a>
        {/if}
        {for $i=1 to $totPagine}
            <a href="/portfolio_pubblico?id={$studioId}&page={$i}" class="pf-page-btn {if $i === $pagina}pf-page-btn--active{/if}">{$i}</a>
        {/for}
        {if $pagina < $totPagine}
            <a href="/portfolio_pubblico?id={$studioId}&page={$pagina + 1}" class="pf-page-btn">Successiva →</a>
        {/if}
    </div>
    {/if}
</div>
{/block}