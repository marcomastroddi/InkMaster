<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>{$titolo_pagina}</title>
    <style>
        body { font-family: sans-serif; margin: 40px; background: #f4f4f4; }
        .prodotto-card { background: white; padding: 20px; margin-bottom: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .prezzo { color: green; font-weight: bold; }
    </style>
</head>
<body>

    <h1>{$titolo_pagina}</h1>

    <div class="prodotti-container">
        {* Cicliamo l'array finto *}
        {foreach from=$prodotti item=p}
            <div class="prodotto-card">
                <h2>{$p.nome}</h2>
                <p>{$p.descrizione}</p>
                <p class="prezzo">Prezzo: €{$p.prezzo}</p>
            </div>
        {foreachelse}
            <p>Nessun prodotto disponibile.</p>
        {/foreach}
    </div>

</body>
</html>