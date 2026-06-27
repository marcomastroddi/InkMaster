{extends file='layouts/base.tpl'}
{block name="title"}{if $data}{$data->getTitolo()|escape} — {/if}InkMaster{/block}
{block name="extra_css"}
<link rel="stylesheet" href="/CSS/home.css">
<style>
.pdet-page { min-height: 60vh; max-width: 960px; margin: 0 auto; padding: 60px; }
.pdet-back { display: inline-flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; color: #9aa3a0; margin-bottom: 36px; }
.pdet-back:hover { color: #2fd8aa; }
.pdet-card { background: #101417; border: 1px solid rgba(255,255,255,.08); border-radius: 18px; overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; }
.pdet-img { overflow: hidden; min-height: 360px; }
.pdet-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
.pdet-body { padding: 44px 40px; display: flex; flex-direction: column; }
.pdet-eyebrow { font-size: 11px; font-weight: 700; letter-spacing: .18em; text-transform: uppercase; color: #2fd8aa; margin-bottom: 14px; }
.pdet-title { font-size: 2rem; font-weight: 900; letter-spacing: -.02em; margin-bottom: 20px; }
.pdet-desc { font-size: 15px; color: #9aa3a0; line-height: 1.7; flex: 1; }
.pdet-meta { margin-top: 24px; display: flex; flex-direction: column; gap: 10px; }
.pdet-meta-row { display: flex; gap: 12px; font-size: 13px; }
.pdet-meta-label { font-weight: 700; color: #6b736f; min-width: 80px; flex-shrink: 0; }
.pdet-meta-value { color: #cdd3d1; }
.pdet-date { margin-top: 20px; font-family: ui-monospace, Menlo, monospace; font-size: 12px; color: #6b736f; }
.pdet-empty { text-align: center; padding: 80px 0; color: #6b736f; font-size: 15px; }
@media (max-width: 680px) {
    .pdet-card { grid-template-columns: 1fr; }
    .pdet-img { min-height: 240px; }
    .pdet-page { padding: 30px 20px; }
}
</style>
{/block}
{block name="content"}
<div class="pdet-page">
    <a class="pdet-back" href="javascript:history.back()">← Torna al portfolio</a>
    {if $status === 'error' || !$data}
        <div class="pdet-empty">Pubblicazione non trovata.</div>
    {else}
        <div class="pdet-card">
            <div class="pdet-img">
                <img src="{$data->getPercorsoImmagine()|escape}" alt="{$data->getTitolo()|escape}">
            </div>
            <div class="pdet-body">
                <div class="pdet-eyebrow">Opera</div>
                <h1 class="pdet-title">{$data->getTitolo()|escape}</h1>
                <p class="pdet-desc">
                    {if $data->getDescrizione()}{$data->getDescrizione()|escape}{else}Nessuna descrizione disponibile.{/if}
                </p>
                <div class="pdet-meta">
                    {if $data->getStili()->count() > 0}
                    <div class="pdet-meta-row">
                        <span class="pdet-meta-label">Stile</span>
                        <span class="pdet-meta-value">
                            {foreach $data->getStili() as $st}{$st->getNome()|escape}{if !$st@last}, {/if}{/foreach}
                        </span>
                    </div>
                    {/if}
                    {if $data->getPosizione()}
                    <div class="pdet-meta-row">
                        <span class="pdet-meta-label">Posizione</span>
                        <span class="pdet-meta-value">{$data->getPosizione()|escape}</span>
                    </div>
                    {/if}
                    {if $data->getGrandezza()}
                    <div class="pdet-meta-row">
                        <span class="pdet-meta-label">Dimensione</span>
                        <span class="pdet-meta-value">{$data->getGrandezza()|escape}</span>
                    </div>
                    {/if}
                </div>
                <div class="pdet-date">📅 {$data->getData()->format('d/m/Y')}</div>
            </div>
        </div>
    {/if}
</div>
{/block}