<?php
namespace InkMaster\Presentation;

use InkMaster\config\bootstrapSmarty;

class View
{
    public static function render(string $template, array $dati = []): void
    {
        $smarty = bootstrapSmarty::getSmarty();

        foreach ($dati as $chiave => $valore) {
            $smarty->assign($chiave, $valore);
        }

        $smarty->display('pages/' . $template . '.tpl');
    }
}