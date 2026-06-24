{extends file='layouts/base.tpl'}

{block name="title"}Accedi — InkMaster{/block}

{block name="extra_css"}
    {* Carica gli stili globali e della nav *}
    <link rel="stylesheet" href="/CSS/home.css">
    {* Carica il foglio di stile unico per i form di autenticazione *}
    <link rel="stylesheet" href="/CSS/auth.css">
{/block}

{block name="content"}
<div class="im-page im-auth-wrapper im-login-theme">
    {* Sfondo con blob animati per continuità di stile con la home *}
    <div class="im-hero-bg">
        <div class="im-blob im-blob-1" style="width: 400px; height: 400px; left: -150px; top: -50px;"></div>
        <div class="im-blob im-blob-2" style="width: 450px; height: 450px; right: -100px; bottom: -150px; top: auto; animation-delay: -2s;"></div>
    </div>

    <div class="im-auth-container im-login-card">
        <div class="im-auth-card">
            <div class="im-auth-header">
                <div class="im-eyebrow">Bentornato</div>
                <h1 class="im-title-auth">Accedi</h1>
                <p class="im-subtitle">Inserisci le tue credenziali per entrare nel mondo di InkMaster.</p>
            </div>

            <form action="/login_action" method="POST" class="im-form">
                <div class="im-form-group">
                    <label class="im-label" for="username">Username</label>
                    <input type="text" id="username" name="username" class="im-input" required placeholder="Inserisci il tuo username">
                </div>

                <div class="im-form-group mt-4">
                    <label class="im-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="im-input" required placeholder="Inserisci la tua password">
                </div>

                <button type="submit" class="im-btn-submit mt-5">Accedi</button>
            </form>

            <div class="im-auth-footer">
                Non hai un account? <br class="is-hidden-tablet">
                <a href="/registrazioneCliente" class="im-link-auth">Registrati come cliente</a> 
                <span style="color: #4b534f; margin: 0 8px;">•</span>
                <a href="/registrazioneStudio" class="im-link-auth">Registra il tuo studio</a>
            </div>
        </div>
    </div>
</div>
{/block}