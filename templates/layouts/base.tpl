<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>{block name="title"}InkMaster{/block}</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/style.css?v=3">
</head>
<body>

    {include file="partials/header.tpl"}

    <main>
        {block name="content"}{/block}
    </main>

    {include file="partials/footer.tpl"}

    {block name="modals"}{/block}

</body>
</html>