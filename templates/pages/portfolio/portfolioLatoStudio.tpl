{extends file='layouts/base.tpl'}

{block name="title"}Portfolio — {if $nome_studio}{$nome_studio|escape}{else}Studio{/if} — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/portfolioLatoStudio.css">
{/block}

{block name="content"}
<div class="im-portfolio-page">
    <div class="im-portfolio-deco"></div>

    <div class="im-portfolio-container">

        <div class="im-portfolio-header">
            <div>
                <div class="im-port-eyebrow">Portfolio</div>
                <h1 class="im-portfolio-title">{if $nome_studio}{$nome_studio|escape}{else}Il mio Studio{/if}</h1>
                <p class="im-portfolio-subtitle">
                    {$data|count} {if $data|count == 1}opera pubblicata{else}opere pubblicate{/if}
                </p>
            </div>
            <a href="/form_pubblicazione" class="im-btn-add">+ Aggiungi opera</a>
        </div>

        {if $data|count > 0}
        <div class="im-portfolio-grid">
            {foreach $data as $pub}
            <div class="im-pub-card" id="card-{$pub->getId()}">
                <div class="im-pub-img-wrap">
                    <img src="{$pub->getPercorsoImmagine()|escape}" alt="{$pub->getTitolo()|escape}" class="im-pub-img">
                    <button class="im-pub-delete" data-id="{$pub->getId()}" title="Elimina">✕</button>
                </div>
                <div class="im-pub-info">
                    <div class="im-pub-titolo">{$pub->getTitolo()|escape}</div>
                    {if $pub->getDescrizione()}
                    <div class="im-pub-desc">{$pub->getDescrizione()|truncate:80:'...'|escape}</div>
                    {/if}
                    <div class="im-pub-data">{$pub->getData()->format('d/m/Y')}</div>
                </div>
            </div>
            {/foreach}
        </div>
        {else}
        <div class="im-portfolio-empty">
            <div class="im-empty-icon">✦</div>
            <p>Nessuna opera pubblicata ancora.<br>Aggiungi il tuo primo lavoro!</p>
        </div>
        {/if}

    </div>
</div>

<script>
(function () {
    document.querySelectorAll('.im-pub-delete').forEach(function (btn) {
        btn.addEventListener('click', function () {
            if (!confirm('Eliminare questa opera dal portfolio?')) return;
            var id = btn.dataset.id;
            var fd = new FormData();
            fd.append('id', id);
            fetch('/elimina_pubblicazione', { method: 'POST', body: fd })
                .then(function (r) { return r.json(); })
                .then(function (res) {
                    if (res.status === 'success') {
                        var card = document.getElementById('card-' + id);
                        card.style.transition = 'opacity 0.3s, transform 0.3s';
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.95)';
                        setTimeout(function () { card.remove(); }, 300);
                    } else {
                        alert(res.message || 'Impossibile eliminare.');
                    }
                });
        });
    });
})();
</script>
{/block}
