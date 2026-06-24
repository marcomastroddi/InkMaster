<?php
namespace InkMaster\Presentation;

use InkMaster\config\bootstrapSmarty;

class View
{
    public static function render(string $template, array $dati = []): void
    {
        $smarty = bootstrapSmarty::getSmarty();
        $smarty->assign('_sessione', [
            'username' => $_SESSION['username'] ?? null,
            'ruolo'    => $_SESSION['ruolo']    ?? null,
        ]);

        foreach ($dati as $chiave => $valore) {
            $smarty->assign($chiave, $valore);
        }

        $smarty->display('pages/' . $template . '.tpl');
    }
}