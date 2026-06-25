{extends file='layouts/base.tpl'}

{block name="title"}{$data->getNome()|escape} — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/studio.css">
{/block}

{block name="content"}
<div class="st-page">

  {* ── STRIP PORTFOLIO ── *}
  <div class="st-strip">
    {foreach $data->getPubblicazioni() as $pub}
      <div class="st-strip-slot">
        <img src="{$pub->getPercorsoImmagine()|escape}" alt="{$pub->getTitolo()|escape}">
      </div>
    {foreachelse}
      {for $i=1 to 4}
        <div class="st-strip-slot st-strip-ph">
          <span>{$data->getNome()|substr:0:2|upper}</span>
        </div>
      {/for}
    {/foreach}
  </div>

  {* ── HERO INFO BAR ── *}
  <div class="st-infobar">
    <div class="st-infobar-left">
      <div class="st-avatar">{$data->getNome()|substr:0:2|upper}</div>
      <div>
        <h1 class="st-nome">{$data->getNome()|escape}</h1>
        <div class="st-city">📍 {$data->getPosizione()->value}</div>
        <div class="st-tags">
          {foreach $data->getTatuatori() as $tat}
            {foreach $tat->getStili() as $st}
              <span class="st-tag">{$st->getNome()|escape}</span>
            {/foreach}
          {/foreach}
        </div>
      </div>
    </div>
    <div class="st-infobar-right">
      {if $data->getTelefono()}
        <div class="st-contact-row"><span class="st-ci">📞</span>{$data->getTelefono()|escape}</div>
      {/if}
      <div class="st-contact-row"><span class="st-ci">✉</span>{$data->getEmail()|escape}</div>
      <a href="/scegli_tatuatore?id={$data->getId()}" class="st-cta">Richiedi appuntamento</a>
    </div>
  </div>

  {* ── CORPO PRINCIPALE ── *}
  <div class="st-body">

    {* COLONNA SX *}
    <div class="st-col-left">

      {* About *}
      <section class="st-section">
        <h2 class="st-h2">About us</h2>
        {if $data->getDescrizione()}
          <p class="st-desc">{$data->getDescrizione()|escape}</p>
        {else}
          <p class="st-desc st-muted">Nessuna descrizione disponibile.</p>
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

    </div>

    {* COLONNA DX — ORARI *}
    <div class="st-col-right">
      <section class="st-section">
        <h2 class="st-h2">Orari di apertura</h2>
        <div class="st-orari-card">
          {assign var=giorni value=['Lun','Mar','Mer','Gio','Ven','Sab','Dom']}
          {assign var=orariAp value=$data->getOrariApertura()}
          {assign var=orariCh value=$data->getOrariChiusura()}
          {if $orariAp}
            {foreach $orariAp as $giorno => $apertura}
              {assign var=chiusura value=$orariCh[$giorno]|default:''}
              <div class="st-orari-row {if $chiusura === 'Chiuso'}st-orari-chiuso{/if}">
                <span class="st-orari-day">{$giorno|escape}</span>
                {if $chiusura === 'Chiuso'}
                  <span class="st-orari-badge st-badge-chiuso">Chiuso</span>
                {else}
                  <span class="st-orari-time">{$apertura|escape} – {$chiusura|escape}</span>
                  <span class="st-orari-badge st-badge-aperto">Aperto</span>
                {/if}
              </div>
            {/foreach}
          {else}
            {foreach ['Lun','Mar','Mer','Gio','Ven'] as $g}
              <div class="st-orari-row">
                <span class="st-orari-day">{$g}</span>
                <span class="st-orari-time">9:00 – 18:00</span>
                <span class="st-orari-badge st-badge-aperto">Aperto</span>
              </div>
            {/foreach}
            <div class="st-orari-row">
              <span class="st-orari-day">Sab</span>
              <span class="st-orari-time">9:00 – 14:00</span>
              <span class="st-orari-badge st-badge-aperto">Aperto</span>
            </div>
            <div class="st-orari-row st-orari-chiuso">
              <span class="st-orari-day">Dom</span>
              <span class="st-orari-badge st-badge-chiuso">Chiuso</span>
            </div>
          {/if}
        </div>
      </section>
    </div>

  </div>{* fine st-body *}

  {* ── RECENSIONI ── *}
  <div class="st-reviews-wrap">
    <div class="st-reviews-inner">
      <div class="st-reviews-head">
        <h2 class="st-h2">Recensioni</h2>
        <a href="/visualizza_recensioni?id={$data->getId()}" class="st-reviews-link">Vedi tutte →</a>
      </div>

      {if $recensioni}
        <div class="st-reviews-grid">
          {foreach $recensioni as $rec}
            <div class="st-review">
              <div class="st-rev-top">
                <span class="st-rev-av">
                  {$rec->getCliente()->getNome()|substr:0:1}{$rec->getCliente()->getCognome()|substr:0:1}
                </span>
                <div class="st-rev-meta">
                  <span class="st-rev-name">{$rec->getCliente()->getNome()|escape} {$rec->getCliente()->getCognome()|substr:0:1}.</span>
                  <span class="st-rev-badge">✓ verificato</span>
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
        <p class="st-muted">Ancora nessuna recensione per questo studio.</p>
      {/if}

      <div class="st-reviews-cta-wrap">
        <a href="/avvia_recensione?id={$data->getId()}" class="st-cta-outline">✍ Scrivi una recensione</a>
      </div>
    </div>
  </div>

</div>
{/block}