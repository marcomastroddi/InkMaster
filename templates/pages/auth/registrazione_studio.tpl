{extends file='layouts/base.tpl'}

{block name="title"}Registrazione studio — InkMaster{/block}

{block name="content"}
    <h1>Registra il tuo studio</h1>

    {* Messaggio di errore restituito dal controller *}
    {if isset($message)}
        <p class="form-error">{$message}</p>
    {/if}

    <form method="post" action="/registra_studio">
        <label>Nome studio <input type="text" name="nome" required></label>
        <label>Partita IVA <input type="text" name="partita_iva" required></label>
        <label>Email <input type="email" name="email" required></label>
        <label>Telefono <input type="text" name="telefono"></label>

        {* La posizione dello studio DEVE essere una città dell'enum Citta.
           TODO: rendere <select> popolato dalle città (passate dal router o elencate qui). *}
        <label>Città <input type="text" name="posizione" required></label>

        <label>Descrizione <textarea name="descrizione"></textarea></label>

        <label>Username <input type="text" name="username" required></label>
        <label>Password <input type="password" name="password" required></label>
        <label>Conferma password <input type="password" name="conferma_password" required></label>

        <button type="submit">Registra studio</button>
    </form>

    <p>Hai già un account? <a href="/login">Accedi</a></p>
{/block}
