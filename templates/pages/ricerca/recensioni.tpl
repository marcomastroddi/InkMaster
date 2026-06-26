{extends file='layouts/base.tpl'}

{block name="title"}Recensioni — {if $studio}{$studio->getNome()|escape}{/if} — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/studio.css">
    <link rel="stylesheet" href="/CSS/recensioni.css">
{/block}

{block name="content"}
<div class="rec-page">

    {* ── Intestazione ── *}
    <div class="rec-header">
        <a href="/scegli_studio?id={$studioId}" class="rec-back">← Torna allo studio</a>
        {if $studio}
            <h1 class="rec-title">Recensioni — {$studio->getNome()|escape}</h1>
            <p class="rec-subtitle">{$totale} recension{if $totale == 1}e{else}i{/if} totali</p>
        {/if}
    </div>

    {* ── Lista recensioni ── *}
    {if $recensioni}
        <div class="st-reviews-list rec-list">
            {foreach $recensioni as $rec}
                {assign var=fotoArr value=$rec->getFotoArray()}
                <div class="st-review rec-item"
                     data-id="{$rec->getId()}"
                     data-titolo="{$rec->getTitolo()|escape}"
                     data-testo="{$rec->getDescrizione()|escape}"
                     data-voto="{$rec->getVoto()}"
                     data-data="{$rec->getData()->format('M Y')}"
                     data-nome="{$rec->getCliente()->getNome()|escape} {$rec->getCliente()->getCognome()|substr:0:1}."
                     data-iniziali="{$rec->getCliente()->getNome()|substr:0:1}{$rec->getCliente()->getCognome()|substr:0:1}"
                     data-stile="{$rec->getStile()|escape}"
                     data-artista="{$rec->getTatuatore()->getNome()|escape} {$rec->getTatuatore()->getCognome()|escape}"
                     data-foto="{if $fotoArr}{$fotoArr|json_encode|escape}{/if}">

                    <div class="st-rev-content">
                        <div class="st-rev-top">
                            <span class="st-rev-av">
                                {$rec->getCliente()->getNome()|substr:0:1}{$rec->getCliente()->getCognome()|substr:0:1}
                            </span>
                            <div class="st-rev-meta">
                                <div class="st-rev-nameline">
                                    <span class="st-rev-name">{$rec->getCliente()->getNome()|escape} {$rec->getCliente()->getCognome()|substr:0:1}.</span>
                                    <span class="st-rev-badge">✓ verificato</span>
                                </div>
                                <div class="st-rev-stars">
                                    {for $i=1 to 5}{if $i <= $rec->getVoto()}★{else}<span class="st-star-off">★</span>{/if}{/for}
                                </div>
                            </div>
                            <span class="st-rev-date">{$rec->getData()->format('M Y')}</span>
                        </div>
                        <div class="st-rev-title">{$rec->getTitolo()|escape}</div>
                        <p class="st-rev-text">{$rec->getDescrizione()|escape}</p>
                        <div class="st-rev-footer">
                            <span class="st-rev-stile">{$rec->getStile()|escape}</span>
                            · {$rec->getTatuatore()->getNome()|escape} {$rec->getTatuatore()->getCognome()|escape}
                        </div>
                    </div>

                    <div class="st-rev-photo-box rec-photo-clickable" data-foto="{if $fotoArr}{$fotoArr|json_encode|escape}{/if}">
                        {if $fotoArr}
                            <img src="{$fotoArr[0]|escape}" alt="Foto tatuaggio" class="st-rev-photo">
                            {if $fotoArr|count > 1}
                                <span class="st-rev-photo-count">+{$fotoArr|count}</span>
                            {/if}
                        {else}
                            <span class="st-rev-photo-ph">{$rec->getTatuatore()->getNome()|substr:0:1}{$rec->getTatuatore()->getCognome()|substr:0:1}</span>
                        {/if}
                    </div>
                </div>
            {/foreach}
        </div>

        {* ── Paginazione ── *}
        {if $totPagine > 1}
            <nav class="rec-pagination">
                {if $pagina > 1}
                    <a href="/visualizza_recensioni?id={$studioId}&page={$pagina-1}" class="rec-pag-btn">← Prec</a>
                {else}
                    <span class="rec-pag-btn rec-pag-disabled">← Prec</span>
                {/if}

                {for $p=1 to $totPagine}
                    {if $p == $pagina}
                        <span class="rec-pag-btn rec-pag-active">{$p}</span>
                    {else}
                        <a href="/visualizza_recensioni?id={$studioId}&page={$p}" class="rec-pag-btn">{$p}</a>
                    {/if}
                {/for}

                {if $pagina < $totPagine}
                    <a href="/visualizza_recensioni?id={$studioId}&page={$pagina+1}" class="rec-pag-btn">Succ →</a>
                {else}
                    <span class="rec-pag-btn rec-pag-disabled">Succ →</span>
                {/if}
            </nav>
        {/if}

    {else}
        <p class="st-muted" style="margin-top:40px;">Ancora nessuna recensione per questo studio.</p>
    {/if}

</div>

{* ── Modal Recensione ── *}
<div id="rec-modal" class="rec-modal-backdrop" style="display:none">
    <div class="rec-modal-card">
        <button class="rec-modal-close" id="rec-modal-close">✕</button>
        <div class="rec-modal-top">
            <span class="st-rev-av rec-modal-av" id="modal-iniziali"></span>
            <div class="st-rev-meta">
                <div class="st-rev-nameline">
                    <span class="st-rev-name" id="modal-nome"></span>
                    <span class="st-rev-badge">✓ verificato</span>
                </div>
                <div class="st-rev-stars" id="modal-stelle"></div>
            </div>
            <span class="st-rev-date" id="modal-data"></span>
        </div>
        <div class="rec-modal-photos" id="modal-photos"></div>
        <div class="st-rev-title" id="modal-titolo" style="font-size:16px;margin-bottom:8px;"></div>
        <p class="st-rev-text" id="modal-testo"></p>
        <div class="st-rev-footer">
            <span class="st-rev-stile" id="modal-stile"></span>
            · <span id="modal-artista"></span>
        </div>
    </div>
</div>

{* ── Modal Foto ── *}
<div id="foto-modal" class="foto-modal-backdrop" style="display:none">
    <button class="foto-modal-close" id="foto-modal-close">✕</button>
    <button class="foto-nav foto-nav-prev" id="foto-prev">‹</button>
    <div class="foto-modal-img-wrap">
        <img id="foto-modal-img" src="" alt="Foto tatuaggio">
    </div>
    <button class="foto-nav foto-nav-next" id="foto-next">›</button>
    <span class="foto-modal-counter" id="foto-counter"></span>
</div>

<script>
(function () {
    /* ── dati ── */
    var items = document.querySelectorAll('.rec-item');
    var recModal = document.getElementById('rec-modal');
    var fotoModal = document.getElementById('foto-modal');
    var currentFoto = [];
    var fotoIdx = 0;

    /* helpers */
    function stelle(n) {
        var s = '';
        for (var i = 1; i <= 5; i++) {
            s += i <= n ? '★' : '<span class="st-star-off">★</span>';
        }
        return s;
    }

    /* apri modal recensione */
    function apriRecensione(el) {
        document.getElementById('modal-iniziali').textContent = el.dataset.iniziali;
        document.getElementById('modal-nome').textContent     = el.dataset.nome;
        document.getElementById('modal-stelle').innerHTML     = stelle(parseInt(el.dataset.voto));
        document.getElementById('modal-data').textContent     = el.dataset.data;
        document.getElementById('modal-titolo').textContent   = el.dataset.titolo;
        document.getElementById('modal-testo').textContent    = el.dataset.testo;
        document.getElementById('modal-stile').textContent    = el.dataset.stile;
        document.getElementById('modal-artista').textContent  = el.dataset.artista;

        var foto = el.dataset.foto ? JSON.parse(el.dataset.foto) : [];
        var box = document.getElementById('modal-photos');
        box.innerHTML = '';
        foto.forEach(function (src, idx) {
            var img = document.createElement('img');
            img.src = src;
            img.className = 'rec-modal-photo';
            img.addEventListener('click', function (e) { e.stopPropagation(); apriFoto(foto, idx); });
            box.appendChild(img);
        });

        recModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    /* click su card → apri modal recensione */
    items.forEach(function (el) {
        el.addEventListener('click', function (e) {
            if (e.target.closest('.rec-photo-clickable')) return;
            apriRecensione(el);
        });
    });

    /* click su foto-box → apri lightbox foto */
    document.querySelectorAll('.rec-photo-clickable').forEach(function (box) {
        box.addEventListener('click', function (e) {
            e.stopPropagation();
            var foto = box.dataset.foto ? JSON.parse(box.dataset.foto) : [];
            if (foto.length) apriFoto(foto, 0);
        });
    });

    /* modal recensione — chiusura */
    document.getElementById('rec-modal-close').addEventListener('click', chiudiRec);
    recModal.addEventListener('click', function (e) { if (e.target === recModal) chiudiRec(); });
    function chiudiRec() { recModal.style.display = 'none'; document.body.style.overflow = ''; }

    /* lightbox foto */
    function apriFoto(foto, idx) {
        currentFoto = foto;
        fotoIdx = idx;
        aggiornaFoto();
        fotoModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    function aggiornaFoto() {
        document.getElementById('foto-modal-img').src = currentFoto[fotoIdx];
        document.getElementById('foto-counter').textContent = (fotoIdx + 1) + ' / ' + currentFoto.length;
        document.getElementById('foto-prev').style.display = fotoIdx > 0 ? '' : 'none';
        document.getElementById('foto-next').style.display = fotoIdx < currentFoto.length - 1 ? '' : 'none';
    }
    document.getElementById('foto-modal-close').addEventListener('click', chiudiFoto);
    fotoModal.addEventListener('click', function (e) { if (e.target === fotoModal) chiudiFoto(); });
    function chiudiFoto() { fotoModal.style.display = 'none'; document.body.style.overflow = ''; }
    document.getElementById('foto-prev').addEventListener('click', function (e) { e.stopPropagation(); if (fotoIdx > 0) { fotoIdx--; aggiornaFoto(); } });
    document.getElementById('foto-next').addEventListener('click', function (e) { e.stopPropagation(); if (fotoIdx < currentFoto.length - 1) { fotoIdx++; aggiornaFoto(); } });

    /* tasto ESC */
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') { chiudiRec(); chiudiFoto(); }
    });
})();
</script>
{/block}