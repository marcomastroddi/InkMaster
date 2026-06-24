{extends file='layouts/base.tpl'}

{block name="title"}Registrazione cliente — InkMaster{/block}

{block name="content"}
    <h1>Registrati come cliente</h1>

    {* Messaggio di errore restituito dal controller (campi mancanti, password diverse, ecc.) *}
    {if isset($message)}
        <p class="form-error">{$message}</p>
    {/if}

    <form method="post" action="/registra_cliente">
        <label>Nome <input type="text" name="nome" required></label>
        <label>Cognome <input type="text" name="cognome" required></label>
        <label>Username <input type="text" name="username" required></label>
        <label>Email <input type="email" name="email" required></label>
        <label>Data di nascita <input type="date" name="data_nascita" required></label>

        {* TODO: se vuoi la ricerca "nella mia città", trasforma in <select> con le città dell'enum Citta *}
        <label>Posizione <input type="text" name="posizione"></label>

        <label>Password <input type="password" name="password" required></label>
        <label>Conferma password <input type="password" name="conferma_password" required></label>

        <button type="submit">Registrati</button>
    </form>

    <p>Hai già un account? <a href="/login">Accedi</a></p>
{/block}
