{extends file='layouts/base.tpl'}
{block name="title"}Gestisci Team — InkMaster Studio{/block}
{block name="extra_css"}
    <link rel="stylesheet" href="/CSS/GestisciTeam.css">
{/block}
{block name="content"}
<div class="im-team-wrap">

    <div class="im-team-content">
        <div class="im-team-eyebrow">Dashboard Studio</div>
        <h1 class="im-team-title">Gestisci il Team</h1>

        {if isset($messaggio)}
            <p class="im-team-msg">{$messaggio|escape}</p>
        {/if}

        <div class="im-team-list">
            {if count($tatuatori) === 0}
                <p class="im-team-empty">Nessun tatuatore nel team.</p>
            {else}
                {foreach $tatuatori as $t}
                <div class="im-team-card">
                    <div class="im-team-avatar">{$t->getNome()|substr:0:1|upper}{$t->getCognome()|substr:0:1|upper}</div>
                    <div class="im-team-info">
                        <span class="im-team-name">{$t->getNome()|escape} {$t->getCognome()|escape}</span>
                        <span class="im-team-dob">{if $t->getDataNascita()}{$t->getDataNascita()->format('d/m/Y')}{else}—{/if}</span>
                        <div class="im-team-stili">
                            {foreach $t->getStili() as $s}
                                <span class="im-team-chip">{$s->getNome()|escape}</span>
                            {/foreach}
                        </div>
                    </div>
                    <form method="POST" action="/elimina_tatuatore">
                        <input type="hidden" name="id" value="{$t->getId()}">
                        <button type="submit" class="im-team-remove">Rimuovi</button>
                    </form>
                </div>
                {/foreach}
            {/if}
        </div>

        <a href="/gestisci_team?mostra_form=1" class="im-team-toggle-btn">+ Aggiungi Tatuatore</a>

        {if isset($smarty.get.mostra_form)}
        <form class="im-team-form" method="POST" action="/aggiungi_tatuatore">
            <div class="im-team-form-row">
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="text" name="cognome" placeholder="Cognome" required>
            </div>
            <div class="im-team-form-row">
                <input type="date" name="data_nascita" required>
            </div>
            <div class="im-team-stili-grid">
                {foreach $stili as $s}
                <label class="im-team-stile-label">
                    <input type="checkbox" name="stili[]" value="{$s->getId()}">
                    {$s->getNome()|escape}
                </label>
                {/foreach}
            </div>
            <button type="submit" class="im-team-submit">Salva</button>
        </form>
        {/if}

        <a href="/dashboardStudio" class="im-team-back">← Torna alla dashboard</a>
    </div>
</div>
{/block}