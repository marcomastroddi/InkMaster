<?php
namespace InkMaster\Config;

// Se non usi i namespace globali, includi il file di Smarty installato da composer
// require_once __DIR__ . '/../../vendor/autoload.php';

use Smarty\Smarty;

class SmartyBoot 
{
    private static ?Smarty $instance = null;

    public static function getSmarty(): Smarty 
    {
        if (self::$instance === null) {
            $smarty = new Smarty();

            // __DIR__ è "progetto/src/Config"
            // dirname(__DIR__, 2) sale di due livelli e arriva a "progetto/" (la tua root)
            $rootDir = dirname(__DIR__, 2);

            // Configurazione speculare al tuo screenshot
            $smarty->setTemplateDir($rootDir . '/templates/');
            $smarty->setCompileDir($rootDir . '/templates_c/');
            $smarty->setCacheDir($rootDir . '/cache/');
            $smarty->setConfigDir($rootDir . '/configs/');

            // Impostazioni di sviluppo
            $smarty->setCompileCheck(true); // Controlla se hai modificato i .tpl
            $smarty->setCaching(Smarty::CACHING_OFF); // Tieni la cache spenta mentre sviluppi

            self::$instance = $smarty;
        }

        return self::$instance;
    }
}