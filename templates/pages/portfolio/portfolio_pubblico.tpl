{extends file='layouts/base.tpl'}

{block name="title"}Portfolio — InkMaster{/block}

{block name="extra_css"}
<link rel="stylesheet" href="/CSS/home.css">
<style>
.ppub-page { min-height: 60vh; padding: 60px; max-width: 1320px; margin: 0 auto; }
.ppub-header { margin-bottom: 42px; }
.ppub-eyebrow { font-size: 12px; font-weight: 700; letter-spacing: .18em; text-transform: uppercase; color: #2fd8aa; margin-bottom: 10px; }
.ppub-title { font-size: 2.2rem; font-weight: 900; letter-spacing: -.02em; }
.ppub-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 18px; }
.ppub-card { position: relative; border-radius: 14px; overflow: hidden; cursor: pointer; aspect-ratio: 1 / 1.1; background: #1a2120; border: 1px solid rgba(255,255,255,.10); }
.ppub-card img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .4s ease; }
.ppub-card:hover img { transform: scale(1.04); }
.ppub-card-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,.8) 0%, transparent 55%); opacity: 0; transition: opacity .3s; display: flex; align-items: flex-end; padding: 20px; }
.ppub-card:hover .ppub-card-overlay { opacity: 1; }
.ppub-card-title { font-size: 15px; font-weight: 700; color: #eef1f0; }
.ppub-empty { text-align: center; color: #6b736f; padding: 80px 0; font-size: 15px; }
.ppub-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.82); z-index: 900; align-items: center; justify-content: center; padding: 24px; }
.ppub-overlay.aperto { display: flex; }
.ppub-modal { position: relative; background: #1a2120; border: 1px solid rgba(255,255,255,.12); border-radius: 18px; max-width: 840px; width: 100%; display: grid; grid-template-columns: 1fr 1fr; overflow: hidden; max-height: 90vh; }
.ppub-modal-img { overflow: hidden; min-height: 340px; }
.ppub-modal-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
.ppub-modal-body { padding: 36px 32px; display: flex; flex-direction: column; overflow-y: auto; background: #1a2120; }
.ppub-modal-eyebrow { font-size: 11px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; color: #2fd8aa; margin-bottom: 12px; }
.ppub-modal-title { font-size: 1.6rem; font-weight: 900; letter-spacing: -.02em; margin-bottom: 16px; }
.ppub-modal-desc { font-size: 14px; color: #9aa3a0; line-height: 1.7; flex: 1; }
.ppub-modal-date { margin-top: 24px; font-family: ui-monospace, Menlo, monospace; font-size: 11px; color: #6b736f; letter-spacing: .08em; }
.ppub-modal-close { position: absolute; top: 16px; right: 20px; font-size: 22px; color: #9aa3a0; cursor: pointer; z-index: 910; line-height: 1; background: none; border: none; font-family: inherit; padding: 4px; }
.ppub-modal-close:hover { color: #eef1f0; }
@media (max-width: 640px) {
    .ppub-modal { grid-template-columns: 1fr; }
    .ppub-modal-img { min-height: 220px; max-height: 260px; }
    .ppub-page { padding: 30px 20px; }
}
</style>
{/block}

{block name="content"}

{* sfondo animato — stesso pattern della dashboard *}
<div style="position:fixed;inset:0;z-index:0;pointer-events:none;overflow:hidden;">
    <div class="im-blob im-blob-1" style="width:620px;height:620px;left:-160px;top:-160px;"></div>
    <div class="im-blob im-blob-2" style="width:520px;height:520px;right:-130px;bottom:-120px;animation-delay:-6s;"></div>
</div>

<div class="im-page" style="position:relative;z-index:1;">
    <div class="ppub-page">
        <div class="ppub-header">
            <div class="ppub-eyebrow">Portfolio</div>
            <h1 class="ppub-title">Opere realizzate</h1>
        </div>

        {if $status === 'error' || empty($data)}
            <div class="ppub-empty">Nessuna pubblicazione disponibile.</div>
        {else}
            <div class="ppub-grid">
                {foreach $data as $pub}
                <div class="ppub-card"
                     data-titolo="{$pub->getTitolo()|escape:'html'}"
                     data-img="{$pub->getPercorsoImmagine()|escape:'html'}"
                     data-desc="{$pub->getDescrizione()|default:''|escape:'html'}"
                     data-data="{$pub->getData()->format('d/m/Y')}">
                    <img src="{$pub->getPercorsoImmagine()|escape}" alt="{$pub->getTitolo()|escape}" loading="lazy">
                    <div class="ppub-card-overlay">
                        <span class="ppub-card-title">{$pub->getTitolo()|escape}</span>
                    </div>
                </div>
                {/foreach}
            </div>
        {/if}
    </div>
</div>

<div id="ppub-overlay" class="ppub-overlay" role="dialog" aria-modal="true">
    <div class="ppub-modal">
        <button id="ppub-close" class="ppub-modal-close" aria-label="Chiudi">✕</button>
        <div class="ppub-modal-img">
            <img id="ppub-modal-img" src="" alt="">
        </div>
        <div class="ppub-modal-body">
            <div class="ppub-modal-eyebrow">Opera</div>
            <h2 id="ppub-modal-title" class="ppub-modal-title"></h2>
            <p id="ppub-modal-desc" class="ppub-modal-desc"></p>
            <div id="ppub-modal-date" class="ppub-modal-date"></div>
        </div>
    </div>
</div>

<script>
(function () {
    var overlay = document.getElementById('ppub-overlay');
    var closeBtn = document.getElementById('ppub-close');
    var imgEl    = document.getElementById('ppub-modal-img');
    var titleEl  = document.getElementById('ppub-modal-title');
    var descEl   = document.getElementById('ppub-modal-desc');
    var dateEl   = document.getElementById('ppub-modal-date');

    function openModal(card) {
        imgEl.src           = card.dataset.img;
        imgEl.alt           = card.dataset.titolo;
        titleEl.textContent = card.dataset.titolo;
        descEl.textContent  = card.dataset.desc || 'Nessuna descrizione.';
        dateEl.textContent  = card.dataset.data ? '📅 ' + card.dataset.data : '';
        overlay.classList.add('aperto');
    }
    function closeModal() {
        overlay.classList.remove('aperto');
        imgEl.src = '';
    }

    document.querySelectorAll('.ppub-card').forEach(function (card) {
        card.addEventListener('click', function () { openModal(card); });
    });
    closeBtn.addEventListener('click', closeModal);
    overlay.addEventListener('click', function (e) { if (e.target === overlay) closeModal(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeModal(); });
})();
</script>
{/block}
