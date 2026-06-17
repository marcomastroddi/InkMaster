{extends file="layouts/base.tpl"}

{block name="title"}Home - Cerca il tuo Tatuatore{/block}

{block name="content"}
    <section class="search-section">
        <h1>Cerca il tuo tatuatore a <a href="#popup-posizione" class="citta-selezionata">Roma ▾</a></h1>
        
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

{block name="modals"}
    <!-- Popup Posizione -->
 <div id="popup-posizione" class="modal-overlay">  
        <div class="modal-body">
            <a href="#" class="modal-close">&times;</a>
            <div class="modal-left">
                <h2>Imposta la tua posizione</h2>
                <div class="popup-search-container">
                    <input type="text" placeholder="es. Roma RM, Via del corso, Italy" class="search-input">
                    <button class="popup-search-btn">🔍</button>
                </div>
                <div class="current-pos">
                    <span class="geo-icon">🎯</span> <a href="#">Usa Posizione Attuale</a>
                </div>
                <button class="btn-conferma">Conferma Posizione</button>
            </div>
            <div class="modal-right">
                <img src="https://placehold.co/500x500?text=Mappa+Roma" alt="Mappa Posizione" class="map-img">
            </div>
        </div>
    </div>
{/block}
