{if $mostra_overlay_recensione}
<div class="rc-backdrop">
    <div class="rc-card">

        <div class="rc-card-header">
            <span class="rc-studio-name">{$data->getNome()|escape}</span>
            <a href="/scegli_studio?id={$data->getId()}" class="rc-close">✕</a>
        </div>

        {if !$overlay_rec_step || $overlay_rec_step === 'form'}
            <p class="rc-title">Lascia una recensione</p>
            <form action="/compilaRecensione" method="post" class="rc-form">

                <div class="rc-field">
                    <label class="rc-label">Voto</label>
                    <select name="voto" class="rc-select" required>
                        <option value="">Seleziona voto</option>
                        <option value="1">★ 1 — Pessimo</option>
                        <option value="2">★★ 2 — Scarso</option>
                        <option value="3">★★★ 3 — Nella media</option>
                        <option value="4">★★★★ 4 — Buono</option>
                        <option value="5">★★★★★ 5 — Eccellente</option>
                    </select>
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
        {/if}

    </div>
</div>
{/if}