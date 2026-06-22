{* Layout base: l'involucro HTML comune a tutte le pagine.
   Ogni pagina fa {extends file='layouts/base.tpl'} e riempie il blocco "content". *}
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{block name="title"}InkMaster{/block}</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    {include file='partials/header.tpl'}

    <main class="content">
        {block name="content"}{/block}
    </main>

    {include file='partials/footer.tpl'}
</body>
</html>
