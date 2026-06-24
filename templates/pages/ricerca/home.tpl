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
        <a href="/cerca" class="im-city">{$citta_corrente|default:'Roma'} <span class="im-caret">▾</span>
          <span class="im-underline"></span>
        </a>
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
        </div>
      </form>

      <div class="im-styles">
        <div class="im-styles-label">Sfoglia per stile</div>
        <div class="im-chips">
          {foreach $stili as $stile}
            <a href="/seleziona_stile?stile={$stile->getNome()|escape:'url'}" class="im-chip">{$stile->getNome()}</a>
          {/foreach}
        </div>
      </div>
    </div>
  </div>

  {* ============ BANDA TICKER ============ *}
  <div class="im-band">
    <div class="im-ticker">
      {assign var=citta_ticker value=['ROMA','MILANO','NAPOLI','TORINO','BOLOGNA','FIRENZE','PALERMO','GENOVA','VENEZIA','BARI','POPOLI','AVEZZANO','PESCARA','MONTESILVANO','AGNONE','ANTROSANO','CORVARO','L\'QUILA']}
      {section name=rep loop=2}{foreach $citta_ticker as $c}<span>{$c}</span>{/foreach}{/section}
    </div>
  </div>

  {* ============ TATUATORI ============ *}
  <div class="im-section">
    <div class="im-section-head">
      <h2 class="im-h2">Tatuatori suggeriti</h2>
      <a href="/avvia_ricerca" class="im-link">Vedi tutti →</a>
    </div>
    <div class="im-grid">
      {assign var=mostrati value=0}
      {foreach $studi as $studio}
        {foreach $studio->getTatuatori() as $tatuatore}
          {if $mostrati < 5}
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
            {assign var=mostrati value=$mostrati+1}
          {/if}
        {/foreach}
      {/foreach}
    </div>
    <div class="im-more-wrap">
      <a href="/avvia_ricerca" class="im-more">Altro »</a>
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
              {$rec->getStile()} · {$rec->getTatuatore()->getNome()} {$rec->getTatuatore()->getCognome()} · {$rec->getData()->format('M Y')}
            </div>
          </div>
          <div class="im-review-photo im-hatch">
            {if $rec->getFoto()}
              <img src="{$rec->getFoto()}" alt="{$rec->getTitolo()|escape}">
            {else}
              <span class="im-review-mono">{$rec->getTatuatore()->getNome()|substr:0:1}{$rec->getTatuatore()->getCognome()|substr:0:1}</span>
            {/if}
          </div>
        </div>
      {/foreach}
    </div>
    <div class="im-scroll-hint">‹ scorri per vedere tutte le recensioni ›</div>
  </div>

</div>
{/block}