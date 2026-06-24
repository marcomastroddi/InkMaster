{extends file='layouts/base.tpl'}

{block name="title"}Registrati come cliente — InkMaster{/block}

{block name="extra_css"}
    {* Carica gli stili globali e della nav *}
    <link rel="stylesheet" href="/CSS/home.css">
    {* Carica gli stili specifici del form di registrazione *}
    <link rel="stylesheet" href="/CSS/registrazioneCliente.css">
{/block}

{block name="content"}
<div class="im-page im-auth-wrapper">
    {* Sfondo con blob animati per continuità di stile con la home *}
    <div class="im-hero-bg">
        <div class="im-blob im-blob-1" style="width: 450px; height: 450px; left: -100px; top: -100px;"></div>
        <div class="im-blob im-blob-2" style="width: 550px; height: 550px; right: -150px; bottom: -100px; top: auto; animation-delay: -3s;"></div>
    </div>

    <div class="im-auth-container">
        <div class="im-auth-card">
            <div class="im-auth-header">
                <div class="im-eyebrow">Unisciti alla rete</div>
                <h1 class="im-title-auth">Registrati come cliente</h1>
                <p class="im-subtitle">Trova i migliori artisti e prenota il tuo prossimo tatuaggio in pochi clic.</p>
            </div>

            <form action="/registrazione_cliente_action" method="POST" class="im-form">
                <div class="im-form-grid">
                    <div class="im-form-group">
                        <label class="im-label" for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="im-input" required placeholder="Es. Mario">
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="cognome">Cognome</label>
                        <input type="text" id="cognome" name="cognome" class="im-input" required placeholder="Es. Rossi">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="im-input" required placeholder="Scegli un username">
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="im-input" required placeholder="mario.rossi@email.com">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="data_nascita">Data di nascita</label>
                        <input type="date" id="data_nascita" name="data_nascita" class="im-input" required>
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="posizione">Posizione</label>
                        <input type="text" id="posizione" name="posizione" class="im-input" required placeholder="Indirizzo completo, es. Via Roma 1, Roma">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="im-input" required placeholder="Crea una password sicura">
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="conferma_password">Conferma password</label>
                        <input type="password" id="conferma_password" name="conferma_password" class="im-input" required placeholder="Ripeti la password">
                    </div>
                </div>

                <button type="submit" class="im-btn-submit">Crea il tuo account</button>
            </form>

            <div class="im-auth-footer">
                Hai già un account? <a href="/login" class="im-link-auth">Accedi</a>
            </div>
        </div>
    </div>
</div>
{/block}