{extends file='layouts/base.tpl'}

{block name="title"}{$data->getNome()|escape} — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/studio.css">
{/block}

{block name="content"}
<div class="st-bg">
    <div class="st-blob st-blob-1"></div>
    <div class="st-blob st-blob-2"></div>
        <svg class="st-tribal" viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice">

        {* pesce 1 — grande, sinistra *}
        <g class="st-fish st-f1">
            <path d="M 70,0 C 65,-30 15,-30 0,0 C 15,30 65,30 70,0"/>
            <path d="M 2,0 L -22,-18 L -8,0 L -22,18 Z"/>
            <circle cx="52" cy="-7" r="3.5"/>
            <path d="M 35,-29 C 44,-46 60,-41 64,-28"/>
        </g>

        {* pesce 2 — grande, destra, direzione opposta *}
        <g class="st-fish st-f2">
            <path d="M 0,0 C 5,-38 55,-38 70,0 C 55,38 5,38 0,0"/>
            <path d="M 68,0 L 92,-22 L 78,0 L 92,22 Z"/>
            <circle cx="18" cy="-9" r="4.5"/>
            <path d="M 35,-37 C 46,-55 62,-50 66,-36"/>
        </g>

        {* pesce 3 — piccolo, centro alto *}
        <g class="st-fish st-f3">
            <path d="M 50,0 C 46,-20 10,-20 0,0 C 10,20 46,20 50,0"/>
            <path d="M 1,0 L -16,-13 L -6,0 L -16,13 Z"/>
            <circle cx="37" cy="-5" r="2.5"/>
        </g>

        {* pesce 4 — medio, basso destra *}
        <g class="st-fish st-f4">
            <path d="M 60,0 C 56,-25 12,-25 0,0 C 12,25 56,25 60,0"/>
            <path d="M 1,0 L -18,-15 L -7,0 L -18,15 Z"/>
            <circle cx="44" cy="-6" r="3"/>
            <path d="M 28,-24 C 36,-38 50,-35 54,-24"/>
        </g>

        {* pesce 5 — piccolo, sinistra basso *}
        <g class="st-fish st-f5">
            <path d="M 42,0 C 38,-17 8,-17 0,0 C 8,17 38,17 42,0"/>
            <path d="M 1,0 L -13,-11 L -5,0 L -13,11 Z"/>
            <circle cx="31" cy="-4" r="2"/>
        </g>

        {* pesce 6 — grande, centro destra direzione opposta *}
        <g class="st-fish st-f6">
            <path d="M 0,0 C 4,-32 48,-32 62,0 C 48,32 4,32 0,0"/>
            <path d="M 60,0 L 82,-19 L 70,0 L 82,19 Z"/>
            <circle cx="14" cy="-8" r="3.5"/>
        </g>

        {* linee ondulate *}
        <path class="st-w1" d="M-100,180 C 200,100 450,280 750,160 S 1150,80 1540,200"/>
        <path class="st-w2" d="M-100,340 C 180,240 480,440 780,300 S 1180,200 1540,360"/>
        <path class="st-w3" d="M-100,500 C 220,400 500,580 800,460 S 1200,360 1540,520"/>
        <path class="st-w4" d="M-100,650 C 160,560 460,720 760,600 S 1160,500 1540,660"/>
        <path class="st-w5" d="M-100,820 Q200,760 500,820 Q800,880 1100,820 Q1300,760 1600,820"/>
        <path class="st-w6" d="M-100,860 Q200,800 500,860 Q800,920 1100,860 Q1300,800 1600,860"/>

    </svg>
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