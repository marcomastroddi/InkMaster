<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{block name="title"}InkMaster{/block}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/CSS/layout.css">
    {block name="extra_css"}{/block}
</head>
<body>
    {include file='partials/header_ricerca.tpl'}

    <main class="content">
        {block name="content"}{/block}
    </main>

    {include file='partials/footer.tpl'}
</body>
</html>