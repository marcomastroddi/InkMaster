{extends file='layouts/base.tpl'}

{block name="title"}Accedi — InkMaster{/block}

{block name="content"}
    <h1>Accedi</h1>

    {* Messaggio: errore credenziali oppure "Devi effettuare il login" dalle rotte protette *}
    {if isset($message)}
        <p class="form-error">{$message}</p>
    {/if}

    <form method="post" action="/login">
        <label>Username <input type="text" name="username" required></label>
        <label>Password <input type="password" name="password" required></label>
        <button type="submit">Accedi</button>
    </form>

    {* --- Link verso la registrazione --- *}
    <p>Non hai un account?</p>
    <ul>
        <li><a href="/registrazione_cliente">Registrati come cliente</a></li>
        <li><a href="/registrazione_studio">Registra il tuo studio</a></li>
    </ul>
{/block}
