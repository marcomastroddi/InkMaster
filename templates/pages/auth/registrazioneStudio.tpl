{extends file='layouts/base.tpl'}

{block name="title"}Registra il tuo studio — InkMaster{/block}

{block name="extra_css"}
    {* Carica gli stili globali e della nav *}
    <link rel="stylesheet" href="/CSS/home.css">
    {* Carica gli stili specifici del form *}
    <link rel="stylesheet" href="/CSS/auth.css">
{/block}

{block name="content"}
<div class="im-page im-auth-wrapper im-studio-theme">
    {* Sfondo con blob animati per continuità di stile con la home *}
    <div class="im-hero-bg">
        <div class="im-blob im-blob-1" style="width: 450px; height: 450px; left: -100px; top: -100px;"></div>
        <div class="im-blob im-blob-2" style="width: 550px; height: 550px; right: -150px; bottom: -100px; top: auto; animation-delay: -3s;"></div>
    </div>

    <div class="im-auth-container" style="max-width: 760px;">
        <div class="im-auth-card">
            <div class="im-auth-header">
                <div class="im-eyebrow">Area Professionisti</div>
                <h1 class="im-title-auth">Registra il tuo Studio</h1>
                <p class="im-subtitle">Entra nella rete di InkMaster e mostra le tue opere a migliaia di clienti.</p>
            </div>

            <form action="/registraStudio" method="POST" class="im-form">
                <div class="im-form-grid">
                    
                    <div class="im-form-group">
                        <label class="im-label" for="nome">Nome Studio / Tatuatore</label>
                        <input type="text" id="nome" name="nome" class="im-input" required placeholder="Es. Luxury Tattoo Studio">
                    </div>
                    
                    <div class="im-form-group">
                        <label class="im-label" for="partita_iva">Partita IVA</label>
                        <input type="text" id="partita_iva" name="partita_iva" class="im-input" required placeholder="11 cifre numeriche">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="username">Username Studio</label>
                        <input type="text" id="username" name="username" class="im-input" required placeholder="Scegli un username">
                    </div>
                    
                    <div class="im-form-group">
                        <label class="im-label" for="email">Email aziendale</label>
                        <input type="email" id="email" name="email" class="im-input" required placeholder="studio@example.com">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="telefono">Telefono di contatto</label>
                        <input type="tel" id="telefono" name="telefono" class="im-input" required placeholder="Es. +39 333 1234567">
                    </div>
                    
                    <div class="im-form-group">
                        <label class="im-label" for="posizione">Città</label>
                        <select id="posizione" name="posizione" class="im-input" required>
                            <option value="">— Seleziona città —</option>
                            <option value="Milano">Milano</option>
                            <option value="Roma">Roma</option>
                            <option value="Napoli">Napoli</option>
                            <option value="Torino">Torino</option>
                            <option value="Palermo">Palermo</option>
                            <option value="Genova">Genova</option>
                            <option value="Bologna">Bologna</option>
                            <option value="Firenze">Firenze</option>
                            <option value="Bari">Bari</option>
                            <option value="Catania">Catania</option>
                            <option value="Venezia">Venezia</option>
                            <option value="Pescara">Pescara</option>
                            <option value="Avezzano">Avezzano</option>
                            <option value="Popoli">Popoli</option>
                            <option value="Catanzaro">Catanzaro</option>
                        </select>
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="password">Password</label>
                        <div class="im-pwd-wrap">
                            <input type="password" id="password" name="password" class="im-input" required placeholder="Crea una password sicura">
                            <button type="button" class="im-pwd-eye" data-target="password">👁</button>
                        </div>
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="conferma_password">Conferma password</label>
                        <div class="im-pwd-wrap">
                            <input type="password" id="conferma_password" name="conferma_password" class="im-input" required placeholder="Ripeti la password">
                            <button type="button" class="im-pwd-eye" data-target="conferma_password">👁</button>
                        </div>
                    </div>

                    <div class="im-form-group" style="grid-column: span 2;">
                        <label class="im-label" for="descrizione">Descrizione dello Studio / Stili trattati</label>
                        <textarea id="descrizione" name="descrizione" class="im-input" rows="3" placeholder="Racconta la storia del tuo studio e gli stili in cui eccellete..." style="resize: none; font-family: inherit; height: auto;"></textarea>
                    </div>
                </div>

                <button type="submit" class="im-btn-submit">Crea il tuo profilo artista</button>
            </form>

            <div class="im-auth-footer">
                Hai già un account artista? <a href="/login" class="im-link-auth">Accedi</a>
            </div>
        </div>
    </div>
</div>
{/block}