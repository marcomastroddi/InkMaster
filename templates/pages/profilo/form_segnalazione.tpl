{extends file='layouts/base.tpl'}

{block name="title"}Segnala — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/home.css">
    <style>
        .sgn-page { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 100px 20px 60px; position: relative; }
        .sgn-blob-wrap { position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden; }
        .sgn-card { position: relative; z-index: 1; background: #101417; border: 1px solid rgba(255,255,255,.08); border-radius: 18px; padding: 36px 40px; width: 100%; max-width: 520px; }
        .sgn-eyebrow { font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: #4b534f; margin-bottom: 6px; }
        .sgn-title { font-size: 22px; font-weight: 900; letter-spacing: -.02em; color: #eef1f0; margin: 0 0 4px; }
        .sgn-target { font-size: 14px; color: #6b736f; margin: 0 0 28px; }
        .sgn-target strong { color: #2fd8aa; }
        .sgn-field { margin-bottom: 20px; }
        .sgn-label { font-size: 11px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: #4b534f; display: block; margin-bottom: 10px; }
        .sgn-radio-group { display: flex; flex-direction: column; gap: 8px; }
        .sgn-radio-opt { display: flex; align-items: center; gap: 10px; font-size: 13px; font-weight: 600; color: #9aa3a0; background: rgba(255,255,255,.04); border: 1px solid rgba(255,255,255,.08); border-radius: 10px; padding: 12px 16px; cursor: pointer; transition: border-color .15s, background .15s; }
        .sgn-radio-opt:has(input:checked) { border-color: rgba(47,216,170,.4); background: rgba(47,216,170,.07); color: #eef1f0; }
        .sgn-radio-opt input { accent-color: #2fd8aa; }
        .sgn-textarea { width: 100%; background: rgba(255,255,255,.05); border: 1px solid rgba(255,255,255,.09); border-radius: 10px; padding: 12px 16px; color: #eef1f0; font-size: 13px; font-family: inherit; resize: vertical; min-height: 100px; box-sizing: border-box; }
        .sgn-textarea:focus { outline: none; border-color: rgba(47,216,170,.35); }
        .sgn-textarea::placeholder { color: #3f4a47; }
        .sgn-footer { display: flex; gap: 12px; margin-top: 28px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,.06); }
        .sgn-btn-submit { flex: 2; padding: 13px; border: none; border-radius: 10px; background: #e05252; color: #fff; font-size: 14px; font-weight: 800; cursor: pointer; font-family: inherit; transition: background .2s; }
        .sgn-btn-submit:hover { background: #c94040; }
        .sgn-btn-cancel { flex: 1; padding: 13px; border: 1px solid rgba(255,255,255,.1); border-radius: 10px; background: transparent; color: #9aa3a0; font-size: 14px; font-weight: 700; text-decoration: none; display: flex; align-items: center; justify-content: center; transition: border-color .15s; }
        .sgn-btn-cancel:hover { border-color: rgba(255,255,255,.25); color: #eef1f0; }
        .sgn-error { background: rgba(224,82,82,.1); border: 1px solid rgba(224,82,82,.25); border-radius: 10px; padding: 12px 16px; font-size: 13px; color: #e05252; margin-bottom: 20px; }
    </style>
{/block}

{block name="content"}
<div class="sgn-page">

    <div class="sgn-blob-wrap">
        <div class="im-blob im-blob-1" style="width:500px;height:500px;left:-150px;top:-100px;"></div>
        <div class="im-blob im-blob-2" style="width:400px;height:400px;right:-100px;top:200px;animation-delay:-3s;"></div>
    </div>

    <div class="sgn-card">
        <div class="sgn-eyebrow">Moderazione</div>
        <h1 class="sgn-title">Invia una segnalazione</h1>
        <p class="sgn-target">
            Stai segnalando:
            <strong>{$data['target']['nome']|escape}</strong>
            <span style="color:#4b534f"> — {if $data['target']['tipo'] == 'studio'}Studio{else}Cliente{/if}</span>
        </p>

        {if isset($message) && $message}
            <div class="sgn-error">{$message|escape}</div>
        {/if}

        <form method="POST" action="/invia_segnalazione">
            <input type="hidden" name="tipo_target" value="{$data['target']['tipo']|escape}">
            <input type="hidden" name="id_target"   value="{$data['target']['id']|intval}">

            <div class="sgn-field">
                <label class="sgn-label">Motivo della segnalazione</label>
                <div class="sgn-radio-group">
                    {foreach $data['form_campi']['motivo'] as $opzione}
                        <label class="sgn-radio-opt">
                            <input type="radio" name="motivo" value="{$opzione|escape}" required>
                            {$opzione|escape}
                        </label>
                    {/foreach}
                </div>
            </div>

            <div class="sgn-field">
                <label class="sgn-label">Descrizione (opzionale)</label>
                <textarea name="descrizione" class="sgn-textarea"
                    placeholder="Aggiungi dettagli per aiutare i moderatori a valutare la segnalazione..."></textarea>
            </div>

            <div class="sgn-footer">
                {if $data['target']['tipo'] == 'studio'}
                    <a href="/scegli_studio?id={$data['target']['id']}" class="sgn-btn-cancel">Annulla</a>
                {else}
                    <a href="/visualizza_clienti" class="sgn-btn-cancel">Annulla</a>
                {/if}
                <button type="submit" class="sgn-btn-submit">⚑ Invia segnalazione</button>
            </div>
        </form>
    </div>

</div>
{/block}
