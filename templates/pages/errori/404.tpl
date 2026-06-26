{extends file='layouts/base.tpl'}

{block name="title"}404 — Pagina non trovata · InkMaster{/block}

{block name="extra_css"}
<link rel="stylesheet" href="/CSS/home.css">
<style>
.e404-wrap { position: relative; min-height: calc(100vh - 76px); display: flex; align-items: center; justify-content: center; overflow: hidden; }

/* sfondo — stessa tecnica della dashboard */
.e404-bg { position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden; }

/* contenuto */
.e404-inner { position: relative; z-index: 1; text-align: center; padding: 60px 24px; max-width: 560px; }
.e404-code {
    font-size: clamp(100px, 22vw, 200px);
    font-weight: 900;
    letter-spacing: -.05em;
    line-height: 1;
    background: linear-gradient(135deg, #2fd8aa 0%, #0d6e52 60%, #2fd8aa 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    user-select: none;
    animation: e404-pulse 4s ease-in-out infinite alternate;
}
@keyframes e404-pulse {
    0%   { filter: brightness(1); }
    100% { filter: brightness(1.25); }
}
.e404-needle {
    display: block;
    margin: -16px auto 32px;
    width: 80px;
    opacity: .35;
}
.e404-eyebrow {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: #2fd8aa;
    margin-bottom: 14px;
}
.e404-title {
    font-size: clamp(1.6rem, 4vw, 2.2rem);
    font-weight: 900;
    letter-spacing: -.02em;
    color: #eef1f0;
    margin-bottom: 16px;
    line-height: 1.2;
}
.e404-desc {
    font-size: 15px;
    color: #6b736f;
    line-height: 1.7;
    margin-bottom: 40px;
}
.e404-actions { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
.e404-btn-home {
    background: #2fd8aa;
    color: #080e0c;
    font-weight: 700;
    font-size: 14px;
    padding: 12px 28px;
    border-radius: 999px;
    text-decoration: none;
    transition: background .15s, transform .15s;
}
.e404-btn-home:hover { background: #37eec0; transform: translateY(-1px); }
.e404-btn-back {
    border: 1px solid rgba(255,255,255,.2);
    color: #cdd3d1;
    font-weight: 600;
    font-size: 14px;
    padding: 12px 28px;
    border-radius: 999px;
    text-decoration: none;
    transition: border-color .15s, color .15s;
}
.e404-btn-back:hover { border-color: #2fd8aa; color: #2fd8aa; }
</style>
{/block}

{block name="content"}

<div class="e404-bg">
    <div class="im-blob im-blob-1" style="width:580px;height:580px;left:-160px;top:-140px;"></div>
    <div class="im-blob im-blob-2" style="width:500px;height:500px;right:-140px;bottom:-100px;animation-delay:-5s;"></div>
</div>

<div class="e404-wrap">
    <div class="e404-inner">

        <div class="e404-code">404</div>

        {* ago da tatuaggio SVG decorativo *}
        <svg class="e404-needle" viewBox="0 0 40 120" xmlns="http://www.w3.org/2000/svg" fill="none">
            <rect x="17" y="0" width="6" height="70" rx="3" fill="#2fd8aa" opacity=".7"/>
            <polygon points="20,120 14,72 26,72" fill="#2fd8aa" opacity=".9"/>
            <rect x="13" y="18" width="14" height="4" rx="2" fill="#2fd8aa" opacity=".4"/>
            <rect x="13" y="28" width="14" height="4" rx="2" fill="#2fd8aa" opacity=".3"/>
        </svg>

        <div class="e404-eyebrow">Ago perso nell'inchiostro</div>
        <h1 class="e404-title">Questa pagina<br>non esiste</h1>
        <p class="e404-desc">
            Forse il link è scaduto, o forse il tatuatore<br>
            l'ha coperta con un cover-up. In ogni caso,<br>
            non è qui.
        </p>

        <div class="e404-actions">
            <a href="/home" class="e404-btn-home">Torna alla home</a>
            <a href="javascript:history.back()" class="e404-btn-back">← Pagina precedente</a>
        </div>

    </div>
</div>

{/block}
