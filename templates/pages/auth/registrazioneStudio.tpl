{extends file='layouts/base.tpl'}

{block name="title"}Registra il tuo studio — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/home.css">
    <link rel="stylesheet" href="/CSS/auth.css">
    <style>
    .im-iva-hint { font-size: 12px; color: #6b736f; margin-top: 6px; display: flex; align-items: center; gap: 10px; }
    #partita_iva:invalid:not(:placeholder-shown) { border-color: #e05252; }
    #partita_iva.valid { border-color: #2fd8aa; }
    </style>
{/block}

{block name="content"}
<div class="im-page im-auth-wrapper im-studio-theme">
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

                {if isset($message) && $message}
                    <div class="im-alert im-alert-error">{$message}</div>
                {/if}

                <div class="im-form-grid">

                    <div class="im-form-group">
                        <label class="im-label" for="nome">Nome Studio / Tatuatore</label>
                        <input type="text" id="nome" name="nome" class="im-input" required
                               placeholder="Es. Luxury Tattoo Studio"
                               value="{$old.nome|default:''|escape}">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="partita_iva">Partita IVA</label>
                        <input type="text" id="partita_iva" name="partita_iva" class="im-input" required
                               placeholder="11 cifre numeriche"
                               maxlength="11" pattern="\d{11}"
                               inputmode="numeric"
                               value="{$old.partita_iva|default:''|escape}">
                        <div class="im-iva-hint">
                            <span id="iva-count">0</span>/11 cifre
                            <span id="iva-ok" style="display:none;color:#2fd8aa;font-weight:700;">✓ Formato corretto</span>
                            <span id="iva-err" style="display:none;color:#e05252;font-weight:700;">⚠ Devono essere esattamente 11 cifre numeriche</span>
                        </div>
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="username">Username Studio</label>
                        <input type="text" id="username" name="username" class="im-input" required
                               placeholder="Scegli un username"
                               value="{$old.username|default:''|escape}">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="email">Email aziendale</label>
                        <input type="email" id="email" name="email" class="im-input" required
                               placeholder="studio@example.com"
                               value="{$old.email|default:''|escape}">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="telefono">Telefono di contatto</label>
                        <input type="tel" id="telefono" name="telefono" class="im-input" required
                               placeholder="Es. +39 333 1234567"
                               value="{$old.telefono|default:''|escape}">
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="posizione">Città</label>
                        <select id="posizione" name="posizione" class="im-input" required>
                            <option value="" disabled {if !isset($old.posizione) || $old.posizione == ''}selected{/if}>Seleziona la città</option>
                            {foreach ['Roma','Milano','Napoli','Torino','Bologna','Firenze','Palermo','Genova','Venezia','Bari'] as $c}
                                <option value="{$c}" {if ($old.posizione|default:'') == $c}selected{/if}>{$c}</option>
                            {/foreach}
                        </select>
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="password">Password</label>
                        <div class="im-pwd-wrap">
                            <input type="password" id="password" name="password" class="im-input" required
                                   placeholder="Crea una password sicura">
                            <button type="button" class="im-pwd-eye" data-target="password">👁</button>
                        </div>
                    </div>

                    <div class="im-form-group">
                        <label class="im-label" for="conferma_password">Conferma password</label>
                        <div class="im-pwd-wrap">
                            <input type="password" id="conferma_password" name="conferma_password" class="im-input" required
                                   placeholder="Ripeti la password">
                            <button type="button" class="im-pwd-eye" data-target="conferma_password">👁</button>
                        </div>
                    </div>

                    <div class="im-form-group" style="grid-column: span 2;">
                        <label class="im-label" for="descrizione">Descrizione dello Studio / Stili trattati</label>
                        <textarea id="descrizione" name="descrizione" class="im-input" rows="3"
                                  placeholder="Racconta la storia del tuo studio e gli stili in cui eccellete..."
                                  style="resize: none; font-family: inherit; height: auto;">{$old.descrizione|default:''|escape}</textarea>
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
{literal}
<script>
(function() {
    var inp = document.getElementById('partita_iva');
    var count = document.getElementById('iva-count');
    var ok = document.getElementById('iva-ok');
    var err = document.getElementById('iva-err');
    if (!inp) return;
    inp.addEventListener('input', function() {
        inp.value = inp.value.replace(/\D/g, '').slice(0, 11);
        var len = inp.value.length;
        count.textContent = len;
        if (len === 0) { ok.style.display='none'; err.style.display='none'; inp.classList.remove('valid'); }
        else if (len === 11) { ok.style.display='inline'; err.style.display='none'; inp.classList.add('valid'); }
        else { err.style.display='inline'; ok.style.display='none'; inp.classList.remove('valid'); }
    });
})();
</script>
{/literal}
{/block}