{extends file="layouts/base.tpl"}

{block name="title"}Home - Cerca il tuo Tatuatore{/block}

{block name="content"}
    <section class="search-section">
        <h1>Cerca il tuo tatuatore a <span class="citta-selezionata">Roma ▾</span></h1>
        
        <div class="search-container">
            <input type="text" placeholder="es. DanInk" class="search-input">
            <button class="search-btn">🔍</button>
            <button class="filter-btn">🎛️ Filtri</button>
        </div>
    </section>

    <section class="section-container">
        <h2 class="section-title">Tattoo Styles</h2>
        <div class="cards-grid">
            {foreach from=$stili item=stile}
                <div class="card-item">
                    <div class="image-wrapper">
                        <img src="{$stile.immagine}" alt="{$stile.nome}">
                    </div>
                    <p>{$stile.nome}</p>
                </div>
            {/foreach}
            
            <div class="card-item alt-btn">
                <div class="image-wrapper arrow-btn">≫</div>
                <p>Altro</p>
            </div>
        </div>
    </section>

    <section class="section-container">
        <h2 class="section-title">Tattoo Artist</h2>
        <div class="cards-grid">
            {foreach from=$tatuatori item=artista}
                <div class="card-item">
                    <div class="avatar-wrapper">
                        <div class="user-icon">👤</div>
                    </div>
                    <p>{$artista.nome}</p>
                </div>
            {/foreach}

            <div class="card-item alt-btn">
                <div class="image-wrapper arrow-btn">≫</div>
                <p>Altro</p>
            </div>
        </div>
    </section>

    <section class="section-container">
        <h2 class="section-title">Recensioni</h2>
        
        <div class="reviews-slider">
            <div class="review-card">
                <div class="review-details">
                    <h3>👤 {$recensione.utente} <span class="verified">(Tattoo verificato)</span></h3>
                    <div class="stars">⭐⭐⭐⭐⭐</div>
                    <h4>{$recensione.intestazione}</h4>
                    <p>{$recensione.descrizione}</p>
                </div>
                <div class="review-artist-info">
                    <img src="{$recensione.foto_tatuaggio}" alt="Tatuaggio">
                    <p>{$recensione.nome_tatuatore}</p>
                </div>
            </div>
            
            <div class="slider-pagination">
                <span>4/10</span>
                <div class="dots">
                    <span class="dot"></span>
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>
    </section>
{/block}