{extends file='layouts/base.tpl'}

{block name="title"}Il mio profilo — InkMaster{/block}

{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/profiloCliente.css">
{/block}

{block name="content"}
<div class="im-page im-auth-wrapper im-profilo-theme">

    <div class="im-auth-container">
        <div class="im-auth-card">

            {* ── Avatar e intestazione ── *}
            <div class="im-profilo-avatar">
                {$data.nome|substr:0:1|upper}{$data.cognome|substr:0:1|upper}
            </div>
            <div class="im-profilo-ruolo">{$data.ruolo}</div>
            <div class="im-profilo-nome">{$data.nome} {$data.cognome}</div>

            {* ── Form dati personali ── *}
            <div class="im-profilo-section-title">Dati personali</div>

            <form id="im-form-dati" class="im-form">
                <div class="im-form-grid">
                    <div class="im-form-group">
                        <label class="im-label" for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="im-input"
                               value="{$data.nome|escape}" required>
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="cognome">Cognome</label>
                        <input type="text" id="cognome" name="cognome" class="im-input"
                               value="{$data.cognome|escape}" required>
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="im-input"
                               value="{$data.email|escape}" required>
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="data_nascita">Data di nascita</label>
                        <input type="date" id="data_nascita" name="data_nascita" class="im-input"
                               value="{$data.data_nascita|escape}">
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="posizione">Città</label>
                        <input type="text" id="posizione" name="posizione" class="im-input"
                               value="{$data.posizione|escape}" placeholder="es. Roma">
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="im-input"
                               value="{$data.username|escape}" required>
                    </div>
                </div>

                <div class="im-feedback" id="im-feedback-dati"></div>
                <button type="submit" class="im-btn-submit">Salva modifiche</button>
            </form>

            {* ── Sezione cambio password ── *}
            <div class="im-profilo-section-title">Sicurezza</div>

            <form id="im-form-password" class="im-form">
                <div class="im-form-group" style="margin-bottom:16px;">
                    <label class="im-label" for="vecchia_password">Password attuale</label>
                    <div class="im-input-eye-wrap">
                        <input type="password" id="vecchia_password" name="vecchia_password"
                            class="im-input" placeholder="••••••••" autocomplete="current-password" required>
                        <button type="button" class="im-eye-btn" data-target="vecchia_password">👁</button>
                    </div>
                </div>
                <div class="im-form-grid">
                    <div class="im-form-group">
                        <label class="im-label" for="nuova_password">Nuova password</label>
                        <div class="im-input-eye-wrap">
                            <input type="password" id="nuova_password" name="nuova_password"
                                class="im-input" placeholder="••••••••" autocomplete="new-password" required>
                            <button type="button" class="im-eye-btn" data-target="nuova_password">👁</button>
                        </div>
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="conferma_password">Conferma nuova password</label>
                        <div class="im-input-eye-wrap">
                            <input type="password" id="conferma_password" name="conferma_password"
                                class="im-input" placeholder="••••••••" autocomplete="new-password" required>
                            <button type="button" class="im-eye-btn" data-target="conferma_password">👁</button>
                        </div>
                    </div>
                </div>

                <div class="im-feedback" id="im-feedback-pwd"></div>
                <button type="submit" class="im-btn-submit">Cambia password</button>
            </form>

        </div>
    </div>
</div>

<script>
(function () {

    // Occhietti
    document.querySelectorAll('.im-eye-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var inp = document.getElementById(this.dataset.target);
            inp.type = inp.type === 'password' ? 'text' : 'password';
            this.textContent = inp.type === 'password' ? '👁' : '🙈';
        });
    });

    function feedback(el, ok, msg) {
        el.className = 'im-feedback ' + (ok ? 'ok' : 'err');
        el.textContent = msg;
    }

    // Form dati personali
    document.getElementById('im-form-dati').addEventListener('submit', function (e) {
        e.preventDefault();
        var fb = document.getElementById('im-feedback-dati');
        fetch('/modifica_dati', { method: 'POST', body: new FormData(this) })
            .then(function (r) { return r.json(); })
            .then(function (d) { feedback(fb, d.status === 'success', d.message); })
            .catch(function () { feedback(fb, false, 'Errore di rete.'); });
    });

    // Form cambio password
    document.getElementById('im-form-password').addEventListener('submit', function (e) {
        e.preventDefault();
        var fb = document.getElementById('im-feedback-pwd');
        var np = document.getElementById('nuova_password').value;
        var cp = document.getElementById('conferma_password').value;
        if (np !== cp) { feedback(fb, false, 'Le password non coincidono.'); return; }
        var fd = new FormData();
        fd.append('vecchia_password', document.getElementById('vecchia_password').value);
        fd.append('nuova_password', np);
        fetch('/cambia_password', { method: 'POST', body: fd })
            .then(function (r) { return r.json(); })
            .then(function (d) {
                feedback(fb, d.status === 'success', d.message);
                if (d.status === 'success') document.getElementById('im-form-password').reset();
            })
            .catch(function () { feedback(fb, false, 'Errore di rete.'); });
    });

})();
</script>
{/block}