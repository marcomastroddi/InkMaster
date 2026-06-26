<?php
/* Smarty version 5.8.0, created on 2026-06-26 09:16:38
  from 'file:pages/profilo/profiloCliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a3e27561f0435_61739553',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '500dd670db3b9c58f43efce5bdab3af5f56e1317' => 
    array (
      0 => 'pages/profilo/profiloCliente.tpl',
      1 => 1782458191,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a3e27561f0435_61739553 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/profilo';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3957743616a3e27561bcd67_80827838', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16498268306a3e27561be473_75246954', "extra_css");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3350287196a3e27561be9a0_74576208', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/base.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_3957743616a3e27561bcd67_80827838 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/profilo';
?>
Il mio profilo — InkMaster<?php
}
}
/* {/block "title"} */
/* {block "extra_css"} */
class Block_16498268306a3e27561be473_75246954 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/profilo';
?>

    <link rel="stylesheet" href="/CSS/profiloCliente.css">
<?php
}
}
/* {/block "extra_css"} */
/* {block "content"} */
class Block_3350287196a3e27561be9a0_74576208 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/marco-mastroddi/Documenti/P_Web/InkMaster/InkMaster/templates/pages/profilo';
?>

<div class="im-page im-auth-wrapper im-profilo-theme">

    <div class="im-auth-container">
        <div class="im-auth-card">

                        <div class="im-profilo-avatar">
                <?php echo mb_strtoupper((string) substr((string) $_smarty_tpl->getValue('data')['nome'], (int) 0, (int) 1) ?? '', 'UTF-8');
echo mb_strtoupper((string) substr((string) (($tmp = $_smarty_tpl->getValue('data')['cognome'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), (int) 0, (int) 1) ?? '', 'UTF-8');?>

            </div>
            <div class="im-profilo-ruolo"><?php echo $_smarty_tpl->getValue('data')['ruolo'];?>
</div>
            <div class="im-profilo-nome"><?php echo $_smarty_tpl->getValue('data')['nome'];?>
 <?php echo (($tmp = $_smarty_tpl->getValue('data')['cognome'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</div>

                        <div class="im-profilo-section-title">Dati personali</div>

            <form id="im-form-dati" class="im-form">
                <div class="im-form-grid">
                    <div class="im-form-group">
                        <label class="im-label" for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="im-input"
                               value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['nome'], ENT_QUOTES, 'UTF-8', true);?>
" required>
                    </div>
                    <?php if ((true && (true && null !== ($_smarty_tpl->getValue('data')['cognome'] ?? null)))) {?>
                    <div class="im-form-group">
                        <label class="im-label" for="cognome">Cognome</label>
                        <input type="text" id="cognome" name="cognome" class="im-input"
                               value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['cognome'], ENT_QUOTES, 'UTF-8', true);?>
" required>
                    </div>
                    <?php }?>
                    <div class="im-form-group">
                        <label class="im-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="im-input"
                               value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('data')['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" required>
                    </div>
                    <?php if ((true && (true && null !== ($_smarty_tpl->getValue('data')['data_nascita'] ?? null)))) {?>
                    <div class="im-form-group">
                        <label class="im-label" for="data_nascita">Data di nascita</label>
                        <input type="date" id="data_nascita" name="data_nascita" class="im-input"
                               value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['data_nascita'], ENT_QUOTES, 'UTF-8', true);?>
">
                    </div>
                    <?php }?>
                    <div class="im-form-group">
                        <label class="im-label" for="posizione">Città</label>
                        <input type="text" id="posizione" name="posizione" class="im-input"
                               value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('data')['posizione'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" placeholder="es. Roma">
                    </div>
                    <div class="im-form-group">
                        <label class="im-label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="im-input"
                               value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('data')['username'], ENT_QUOTES, 'UTF-8', true);?>
" required>
                    </div>
                </div>

                <div class="im-feedback" id="im-feedback-dati"></div>
                <button type="submit" class="im-btn-submit">Salva modifiche</button>
            </form>

                        <div class="im-profilo-section-title">Sicurezza</div>

            <form id="im-form-password" class="im-form" autocomplete="off">
                <div class="im-form-group" style="margin-bottom:16px;">
                    <label class="im-label" for="vecchia_password">Password attuale</label>
                    <div class="im-input-eye-wrap">
                        <input type="password" id="vecchia_password" name="vecchia_password"
                            class="im-input" placeholder="••••••••" autocomplete="new-password" required>
                        <button type="button" class="im-eye-btn" data-target="new_password">👁</button>
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

<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
