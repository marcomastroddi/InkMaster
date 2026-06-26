{extends file='layouts/base.tpl'}

{block name="title"}Nuova opera — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/portfolioLatoStudio.css">
{/block}

{block name="content"}
<div class="im-portfolio-form-page">
    <div class="im-portfolio-deco"></div>

    <div class="im-pub-form-container">
        <div class="im-pub-form-card">
            <div class="im-pub-form-header">
                <a href="/portfolio_studio" class="im-back-link">← Torna al portfolio</a>
                <div class="im-port-eyebrow">Nuovo lavoro</div>
                <h1 class="im-pub-form-title">Aggiungi un'opera</h1>
            </div>

            <form action="/pubblica_pubblicazione" method="POST" enctype="multipart/form-data" class="im-pub-form">

                {if isset($error)}
                <div class="im-feedback err">{$error|escape}</div>
                {/if}

                <div class="im-form-group">
                    <label class="im-label" for="titolo">Titolo *</label>
                    <input type="text" id="titolo" name="titolo" class="im-input" required
                           placeholder="Es. Dark rose sleeve">
                </div>

                <div class="im-form-group">
                    <label class="im-label" for="percorso_foto">Foto del tatuaggio *</label>
                    <input type="file" id="percorso_foto" name="percorso_foto"
                           class="im-input im-input-file"
                           accept="image/jpeg,image/png,image/webp" required>
                </div>

                <div class="im-form-group">
                    <label class="im-label" for="stile">Stile *</label>
                    <select id="stile" name="stile" class="im-input im-select" required>
                        <option value="">— Seleziona stile —</option>
                        {foreach $data as $stile}
                        <option value="{$stile->getId()}">{$stile->getNome()|escape}</option>
                        {/foreach}
                    </select>
                </div>

                <div class="im-form-group">
                    <label class="im-label" for="descrizione">Descrizione</label>
                    <textarea id="descrizione" name="descrizione" class="im-input" rows="4"
                              placeholder="Racconta questa opera, la tecnica, il significato..."></textarea>
                </div>

                <div class="im-form-actions">
                    <a href="/portfolio_studio" class="im-btn-cancel-link">Annulla</a>
                    <button type="submit" class="im-btn-submit-pub">Pubblica nel portfolio</button>
                </div>

            </form>
        </div>
    </div>
</div>
{/block}