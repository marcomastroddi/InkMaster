<?php
namespace InkMaster\Presentation;

use App\Presentation\SmartyBoot;

class View
{
    public static function render(string $template, array $dati = []): void
    {
        $smarty = SmartyBoot::getSmarty();

        foreach ($dati as $chiave => $valore) {
            $smarty->assign($chiave, $valore);
        }

        $smarty->display('pages/' . $template . '.tpl');
    }
}