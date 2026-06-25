{extends file='layouts/base.tpl'}

{block name="title"}{$data->getNome()|escape} — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/studio.css">
{/block}

{block name="content"}
<div class="st-page">
    {* ── BLOB SFONDO ── *}
    <div class="st-page">
    <div class="st-bg">
        <div class="st-blob st-blob-1"></div>
        <div class="st-blob st-blob-2"></div>
    </div>

  {* ── STRIP PORTFOLIO ── *}
  <div class="st-strip">
    {foreach $data->getPubblicazioni() as $pub}
      <div class="st-strip-slot">
        <img src="{$pub->getPercorsoImmagine()|escape}" alt="{$pub->getTitolo()|escape}">
        <div class="st-strip-label">{$pub->getTitolo()|escape}</div>
      </div>
    {foreachelse}
      {for $i=1 to 5}
        <div class="st-strip-slot st-strip-ph">
          <div class="st-strip-ph-inner">
            <span class="st-strip-ph-icon">🖼</span>
            <span class="st-strip-ph-text">Portfolio</span>
          </div>
        </div>
      {/for}
    {/foreach}
  </div>

  {* ── LAYOUT PRINCIPALE ── *}
  <div class="st-layout">

    {* ── SIDEBAR SINISTRA ── *}
    <aside class="st-sidebar">
      <div class="st-sidebar-card">

        <div class="st-avatar">{$data->getNome()|substr:0:2|upper}</div>
        <h1 class="st-nome">{$data->getNome()|escape}</h1>
        <div class="st-city">📍 {$data->getPosizione()->value}</div>

        {if $n_recensioni > 0}
          <div class="st-rating">
            <span class="st-rating-stars">
              {for $i=1 to 5}{if $i <= $media_voto|round}★{else}<span class="st-star-off">★</span>{/if}{/for}
            </span>
            <span class="st-rating-num">{$media_voto}</span>
            <span class="st-rating-count">({$n_recensioni})</span>
          </div>
        {/if}

        <div class="st-tags">
          {foreach $data->getTatuatori() as $tat}
            {foreach $tat->getStili() as $st}
              <span class="st-tag">{$st->getNome()|escape}</span>
            {/foreach}
          {/foreach}
        </div>

        <div class="st-divider"></div>

        <div class="st-appt-box">
          <h3 class="st-appt-title">Richiedi appuntamento</h3>
          {if $data->getTelefono()}
            <div class="st-contact-row"><span class="st-ci">📞</span>{$data->getTelefono()|escape}</div>
          {/if}
          <div class="st-contact-row"><span class="st-ci">✉</span>{$data->getEmail()|escape}</div>
          <a href="/scegli_tatuatore?id={$data->getId()}" class="st-cta">Prenota</a>
        </div>

      </div>
    </aside>

    {* ── CONTENUTO DESTRA ── *}
    <main class="st-main">

      {* Descrizione *}
      <section class="st-section">
        <h2 class="st-h2">About us</h2>
        {if $data->getDescrizione()}
          <p class="st-desc">{$data->getDescrizione()|escape}</p>
        {else}
          <p class="st-muted">Nessuna descrizione disponibile.</p>
        {/if}
      </section>

      {* Team *}
      <section class="st-section">
        <h2 class="st-h2">Il nostro Team</h2>
        <div class="st-team">
          {foreach $data->getTatuatori() as $tat}
            <div class="st-member">
              <div class="st-member-av">{$tat->getNome()|substr:0:1}{$tat->getCognome()|substr:0:1}</div>
              <div class="st-member-name">{$tat->getNome()|escape} {$tat->getCognome()|escape}</div>
              <div class="st-member-tags">
                {foreach $tat->getStili() as $st}
                  <span class="st-tag st-tag--sm">{$st->getNome()|escape}</span>
                {/foreach}
              </div>
            </div>
          {/foreach}
        </div>
      </section>

      {* Orari *}
      <section class="st-section">
        <h2 class="st-h2">Orari di apertura</h2>
        <div class="st-orari-card">
                    {if $data->getOrariApertura()}
            {assign var=orariCh value=$data->getOrariChiusura()}
            {foreach $data->getOrariApertura() as $giorno => $apertura}
              {assign var=chiusura value=$orariCh[$giorno]|default:''}
              <div class="st-orari-row {if $chiusura === 'Chiuso'}st-orari-chiuso{/if}">
                <span class="st-orari-day">{$giorno|escape}</span>
                {if $chiusura === 'Chiuso'}
                  <span class="st-orari-time st-muted-inline">—</span>
                  <span class="st-orari-badge st-badge-chiuso">Chiuso</span>
                {else}
                  <span class="st-orari-time">{$apertura|escape} – {$chiusura|escape}</span>
                  <span class="st-orari-badge st-badge-aperto">● Aperto</span>
                {/if}
              </div>
            {/foreach}
          {else}
            {foreach ['Lun','Mar','Mer','Gio','Ven'] as $g}
              <div class="st-orari-row">
                <span class="st-orari-day">{$g}</span>
                <span class="st-orari-time">9:00 – 18:00</span>
                <span class="st-orari-badge st-badge-aperto">● Aperto</span>
              </div>
            {/foreach}
            <div class="st-orari-row">
              <span class="st-orari-day">Sab</span>
              <span class="st-orari-time">9:00 – 14:00</span>
              <span class="st-orari-badge st-badge-aperto">● Aperto</span>
            </div>
            <div class="st-orari-row st-orari-chiuso">
              <span class="st-orari-day">Dom</span>
              <span class="st-orari-time st-muted-inline">—</span>
              <span class="st-orari-badge st-badge-chiuso">Chiuso</span>
            </div>
          {/if}
        </div>
      </section>

      {* Recensioni *}
      <section class="st-section">
        <div class="st-reviews-head">
          <h2 class="st-h2">Recensioni</h2>
          <a href="/visualizza_recensioni?id={$data->getId()}" class="st-reviews-link">Vedi tutte →</a>
        </div>
        {if $recensioni}
          <div class="st-reviews-list">
            {foreach $recensioni as $rec}
              <div class="st-review">
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
            {/foreach}
          </div>
        {else}
          <p class="st-muted">Ancora nessuna recensione.</p>
        {/if}
        <div style="margin-top:20px">
          <a href="/avvia_recensione?id={$data->getId()}" class="st-cta-outline">✍ Scrivi una recensione</a>
        </div>
      </section>

    </main>
  </div>

</div>
{/block}