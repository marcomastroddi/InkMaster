{if $mostra_overlay_recensione}
<div class="rc-backdrop">
    <div class="rc-card">

        <div class="rc-card-header">
            <span class="rc-studio-name">{$data->getNome()|escape}</span>
            <a href="/scegli_studio?id={$data->getId()}" class="rc-close">✕</a>
        </div>

        {if !$overlay_rec_step || $overlay_rec_step === 'form'}
            <p class="rc-title">Lascia una recensione</p>
            <form action="/compilaRecensione" method="post" enctype="multipart/form-data" class="rc-form">

                <div class="rc-field">
                    <label class="rc-label">Voto</label>
                    <div class="rc-stars">
                        <input type="radio" name="voto" id="s5" value="5" required>
                        <label for="s5">★</label>
                        <input type="radio" name="voto" id="s4" value="4">
                        <label for="s4">★</label>
                        <input type="radio" name="voto" id="s3" value="3">
                        <label for="s3">★</label>
                        <input type="radio" name="voto" id="s2" value="2">
                        <label for="s2">★</label>
                        <input type="radio" name="voto" id="s1" value="1">
                        <label for="s1">★</label>
                    </div>
                </div>

                <div class="rc-field">
                    <label class="rc-label">Intestazione</label>
                    <input type="text" name="titolo" class="rc-input" placeholder="Titolo della recensione" required>
                </div>

                <div class="rc-field">
                    <label class="rc-label">Tatuatore</label>
                    <select name="tatuatore_id" class="rc-select" required>
                        <option value="">Seleziona tatuatore</option>
                        {foreach $rec_tatuatori as $t}
                            <option value="{$t->getId()}">{$t->getNome()|escape} {$t->getCognome()|escape}</option>
                        {/foreach}
                    </select>
                </div>

                <div class="rc-field">
                    <label class="rc-label">Stile</label>
                    <select name="stile" class="rc-select" required>
                        <option value="">Seleziona stile</option>
                        {foreach $rec_stili as $s}
                            <option value="{$s->getNome()|escape}">{$s->getNome()|escape}</option>
                        {/foreach}
                    </select>
                </div>

                <div class="rc-field">
                    <label class="rc-label">Condividi la tua esperienza</label>
                    <textarea name="descrizione" class="rc-textarea" placeholder="Racconta come è andata..." rows="4"></textarea>
                </div>

                <div class="rc-field">
                    <label class="rc-label">Foto del tatuaggio (opzionale)</label>
                    <input type="file" name="foto[]" class="rc-file-input" accept="image/*">
                    <input type="file" name="foto[]" class="rc-file-input" accept="image/*" style="margin-top:8px">
                    <input type="file" name="foto[]" class="rc-file-input" accept="image/*" style="margin-top:8px">
                </div>

                <div class="rc-nav">
                    <a href="/scegli_studio?id={$data->getId()}" class="rc-btn-outline">Annulla</a>
                    <button type="submit" class="rc-btn">Pubblica →</button>
                </div>

            </form>

        {elseif $overlay_rec_step === 'successo'}
            <div class="rc-successo">
                <div class="rc-successo-icon">✓</div>
                <p class="rc-title">Recensione inserita correttamente!</p>
                <p class="rc-sub">Grazie per aver condiviso la tua esperienza.</p>
            </div>
            <div class="rc-nav">
                <a href="/scegli_studio?id={$data->getId()}" class="rc-btn">Torna allo studio</a>
            </div>

        {elseif $overlay_rec_step === 'dettaglio'}
            <div class="rc-dettaglio">
                <div class="rc-det-top">
                    <span class="rc-det-av">
                        {$recensione_dettaglio->getCliente()->getNome()|substr:0:1}{$recensione_dettaglio->getCliente()->getCognome()|substr:0:1}
                    </span>
                    <div>
                        <div class="rc-det-name">{$recensione_dettaglio->getCliente()->getNome()|escape} {$recensione_dettaglio->getCliente()->getCognome()|substr:0:1}.</div>
                        <div class="rc-det-stars">
                            {for $i=1 to 5}{if $i <= $recensione_dettaglio->getVoto()}★{else}<span class="st-star-off">★</span>{/if}{/for}
                        </div>
                    </div>
                    <span class="rc-det-date">{$recensione_dettaglio->getData()->format('M Y')}</span>
                </div>
                <div class="rc-det-title">{$recensione_dettaglio->getTitolo()|escape}</div>
                <p class="rc-det-text">{$recensione_dettaglio->getDescrizione()|escape}</p>
                {assign var=fotoArr value=$recensione_dettaglio->getFotoArray()}
                {if $fotoArr}
                    <div class="rc-det-photos">
                        {foreach $fotoArr as $fotoUrl}
                            <a href="{$fotoUrl|escape}" target="_blank">
                                <img src="{$fotoUrl|escape}" alt="Foto tatuaggio" class="rc-det-photo">
                            </a>
                        {/foreach}
                    </div>
                {/if}
                <div class="rc-det-footer">
                    <span class="rc-det-stile">{$recensione_dettaglio->getStile()|escape}</span>
                    · {$recensione_dettaglio->getTatuatore()->getNome()|escape} {$recensione_dettaglio->getTatuatore()->getCognome()|escape}
                </div>
            </div>
            <div class="rc-nav">
                <a href="/scegli_studio?id={$data->getId()}" class="rc-btn">← Torna allo studio</a>
            </div>
        {/if}

    </div>
</div>
{/if}