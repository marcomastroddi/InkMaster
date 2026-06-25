{* Layout base: l'involucro HTML comune a tutte le pagine.
   Ogni pagina fa {extends file='layouts/base.tpl'} e riempie il blocco "content". *}
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{block name="title"}InkMaster{/block}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/CSS/layout.css">
    {block name="extra_css"}{/block}</head>
<body>
    {include file='partials/header.tpl'}

    <main class="content">
        {block name="content"}{/block}
    </main>

    {include file='partials/footer.tpl'}

    {* Apertura/chiusura del popup di logout (presente solo da loggati) *}
    <script>
    (function () {
        var btn = document.getElementById('im-logout-btn');
        var overlay = document.getElementById('im-logout-overlay');
        var cancel = document.getElementById('im-logout-cancel');
        if (!btn || !overlay) return;

        btn.addEventListener('click', function (e) {
            e.preventDefault();
            overlay.classList.add('aperto');
        });
        if (cancel) {
            cancel.addEventListener('click', function () {
                overlay.classList.remove('aperto');
            });
        }
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) overlay.classList.remove('aperto');
        });
    })();
    </script>
</body>
</html>