{extends file='layouts/base.tpl'}

{block name="title"}Home — InkMaster{/block}

{* CSS specifico della home *}
{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/home.css">
{/block}

{block name="content"}
{*
  InkMaster — pages/ricerca/home.tpl
  Variabili: $citta_corrente (string), $studi (Studio[]), $recensioni (Recensione[]), $stili (Stile[])
*}

<div class="im-page">

  {* ============ HERO ============ *}
  <div class="im-hero">
    <div class="im-hero-bg">
      <div class="im-blob im-blob-1"></div>
      <div class="im-blob im-blob-2"></div>
      <svg class="im-lines" viewBox="0 0 1440 620" preserveAspectRatio="none">
        <path class="im-l1" d="M-60,140 C 320,30 520,290 780,190 S 1220,50 1520,210"></path>
        <path class="im-l2" d="M-60,300 C 280,200 560,420 820,320 S 1180,200 1520,360"></path>
        <path class="im-l3" d="M-60,460 C 360,360 540,560 800,470 S 1240,360 1520,500"></path>
        <path class="im-l4" d="M-60,60 C 300,140 620,-10 880,90 S 1200,180 1520,90"></path>
      </svg>
    </div>

    <div class="im-hero-content">
      <div class="im-eyebrow">Inchiostro che resta · prenotazione facile</div>
      <h1 class="im-title">Cerca il tuo tatuatore a
    <span class="im-city" id="im-city-trigger">
        <span id="im-city-label">{$citta_corrente|default:'Roma'}</span>
        <span class="im-caret">▾</span>
        <span class="im-underline"></span>
        <div class="im-city-dropdown" id="im-city-dropdown">
            {foreach ['Roma','Milano','Napoli','Torino','Bologna','Firenze','Palermo','Genova','Venezia','Bari'] as $c}
                <div class="im-city-option" data-citta="{$c}">{$c}</div>
            {/foreach}
        </div>
    </span>
      </h1>

      <form action="/avvia_ricerca" method="get" class="im-search">
        
        <div class="im-search-row">
          <div class="im-search-field">
            <div class="im-search-box">
              <span class="im-search-icon">⌕</span>
              <input type="text" name="testo" autocomplete="off" placeholder="es. DanInk — nome, studio o parola chiave…">
            </div>
          </div>
          <button type="submit" class="im-search-submit">Cerca</button>
          <input type="hidden" name="citta"  id="im-citta-val"  value="{$citta_corrente|default:'Roma'}">
          <input type="hidden" name="stile"  id="im-stile-val"  value="">
        </div>
      </form>

      <div class="im-styles">
        <div class="im-styles-label">Sfoglia per stile</div>
        <div class="im-chips">
            {foreach $stili as $stile}
            <button type="button" class="im-chip" data-stile="{$stile->getNome()|escape:'html'}">{$stile->getNome()}</button>
            {/foreach}
        </div>
      </div>
    </div>
  </div>

  {* ============ BANDA TICKER ============ *}
  <div class="im-band">
    <div class="im-ticker">
      {assign var=citta_ticker value=['ROMA','MILANO','NAPOLI','TORINO','BOLOGNA','FIRENZE','PALERMO','GENOVA','VENEZIA','BARI','POPOLI','AVEZZANO','PESCARA','MONTESILVANO','AGNONE','ANTROSANO','CORVARO','L\'AQUILA']}
      {section name=rep loop=2}{foreach $citta_ticker as $c}<span>{$c}</span>{/foreach}{/section}
    </div>
  </div>

  {* ============ TATUATORI ============ *}
  <div class="im-section">
    <div class="im-section-head">
      <h2 class="im-h2">Tatuatori suggeriti</h2>
    </div>
    <div class="im-grid-wrap">
        <div class="im-grid">
         {foreach $studi as $studio}
         {foreach $studio->getTatuatori() as $tatuatore}
            <a href="/scegli_studio?id={$studio->getId()}" class="im-card">
            <div class="im-avatar">{$tatuatore->getNome()|substr:0:1}{$tatuatore->getCognome()|substr:0:1}</div>
            <div class="im-card-name">{$tatuatore->getNome()} {$tatuatore->getCognome()}</div>
            <div class="im-card-studio">{$studio->getNome()}</div>
            {foreach $tatuatore->getStili() as $st}
                <div class="im-tag">{$st->getNome()}</div>
                {break}
            {/foreach}
            <div class="im-card-city">{$studio->getPosizione()->value}</div>
            </a>
        {/foreach}
        {/foreach}
    </div>
    </div>
    <div class="im-more-wrap">
        <button type="button" class="im-more" id="im-altro">Altro »</button>
    </div>
  </div>

  {* ============ RECENSIONI ============ *}
  <div class="im-reviews">
    <h2 class="im-reviews-title">Recensioni</h2>
    <div class="im-revscroll">
      {foreach $recensioni as $rec}
        <div class="im-review">
          <div class="im-review-main">
            <div class="im-review-top">
              <span class="im-review-avatar">{$rec->getCliente()->getNome()|substr:0:1}{$rec->getCliente()->getCognome()|substr:0:1}</span>
              <div>
                <div class="im-review-name-row">
                  <span class="im-review-name">{$rec->getCliente()->getNome()} {$rec->getCliente()->getCognome()|substr:0:1}.</span>
                  <span class="im-badge">✓ verificato</span>
                </div>
                <div class="im-stars">
                  {for $i=1 to 5}{if $i <= $rec->getVoto()}★{else}<span class="im-star-off">★</span>{/if}{/for}
                </div>
              </div>
            </div>
            <div class="im-review-title">{$rec->getTitolo()}</div>
            <p class="im-review-text">{$rec->getDescrizione()}</p>
            <div class="im-review-meta">
              {$rec->getStile()} · {if $rec->getTatuatore()}{$rec->getTatuatore()->getNome()} {$rec->getTatuatore()->getCognome()}{else}—{/if} · {if $rec->getData()}{$rec->getData()->format('M Y')}{else}—{/if}
            </div>
          </div>
          <div class="im-review-photo im-hatch">
            {if $rec->getFoto()}
              <img src="{$rec->getFoto()}" alt="{$rec->getTitolo()|escape}">
            {else}
              <span class="im-review-mono">{if $rec->getTatuatore()}{$rec->getTatuatore()->getNome()|substr:0:1}{$rec->getTatuatore()->getCognome()|substr:0:1}{else}?{/if}</span>
            {/if}
          </div>
        </div>
      {/foreach}
    </div>
    <div class="im-scroll-hint">‹ scorri per vedere tutte le recensioni ›</div>
  </div>

<script>
// ============ JAVASCRIPT ============
// Chip toggle
document.querySelectorAll('.im-chip').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var attivo = this.classList.contains('im-chip--attivo');
        document.querySelectorAll('.im-chip').forEach(function(b) {
            b.classList.remove('im-chip--attivo');
        });
        if (!attivo) {
            this.classList.add('im-chip--attivo');
            document.getElementById('im-stile-val').value = this.dataset.stile;
            document.querySelector('.im-search-box input').focus();
        } else {
            document.getElementById('im-stile-val').value = '';
        }
    });
});

// Enter nel campo di ricerca → submit esplicito
document.querySelector('.im-search-box input').addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        this.closest('form').submit();
    }
});

// Tasto indietro (bfcache): ripristina pagina pulita
window.addEventListener('pageshow', function(e) {
    if (e.persisted) {
        document.querySelector('.im-search-box input').value = '';
        document.querySelectorAll('.im-chip').forEach(function(b) {
            b.classList.remove('im-chip--attivo');
        });
        document.getElementById('im-stile-val').value = '';
    }
});

// City dropdown
var cityTrigger = document.getElementById('im-city-trigger');
var cityDropdown = document.getElementById('im-city-dropdown');

cityTrigger.addEventListener('click', function(e) {
    e.stopPropagation();
    cityDropdown.classList.toggle('aperto');
});

document.querySelectorAll('.im-city-option').forEach(function(opt) {
    opt.addEventListener('click', function(e) {
        e.stopPropagation();
        var citta = this.dataset.citta;
        document.getElementById('im-city-label').textContent = citta;
        document.getElementById('im-citta-val').value = citta;
        document.querySelectorAll('.im-city-option').forEach(function(o) {
            o.classList.remove('selezionata');
        });
        this.classList.add('selezionata');
        cityDropdown.classList.remove('aperto');
    });
});

document.addEventListener('click', function() {
    cityDropdown.classList.remove('aperto');
});

// Slider "Altro »"
var imGrid = document.querySelector('.im-grid');
var imSlide = 0;

document.getElementById('im-altro').addEventListener('click', function() {
    var card = imGrid.querySelector('.im-card');
    var cardW = card.offsetWidth + 18;
    var visibili = 5;
    var totale = imGrid.querySelectorAll('.im-card').length;
    var maxSlide = Math.ceil(totale / visibili) - 1;

    imSlide = imSlide >= maxSlide ? 0 : imSlide + 1;
    imGrid.style.transform = 'translateX(-' + (imSlide * visibili * cardW) + 'px)';
});
</script>
</div>
{/block}