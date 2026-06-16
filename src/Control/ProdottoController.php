<?php
namespace App\Control;

// Importiamo solo SmartyBoot, perché Foundation per ora non ci serve!
use App\Presentation\SmartyBoot; 

class ProdottoController 
{
    public function visualizzaTutti(): void 
    {
        // 1. SIMULIAMO IL DATABASE (Mock Data)
        // Creiamo a mano un array che contiene dei prodotti finti
        $prodottiFinti = [
            [
                'id' => 1,
                'nome' => 'iPhone 15 Pro',
                'prezzo' => '1200.00',
                'descrizione' => 'Telefono Apple di ultima generazione.'
            ],
            [
                'id' => 2,
                'nome' => 'Samsung Galaxy S24',
                'prezzo' => '999.00',
                'descrizione' => 'Top di gamma Samsung con Intelligenza Artificiale.'
            ],
            [
                'id' => 3,
                'nome' => 'PlayStation 5 Pro',
                'prezzo' => '799.00',
                'descrizione' => 'Console di gioco Sony ad alte prestazioni.'
            ]
        ];

        // 2. RECUPERIAMO SMARTY
        $smarty = SmartyBoot::getSmarty();

        // 3. PASSIAMO I DATI FINTI A SMARTY
        // Assegniamo l'array finto alla variabile 'prodotti' che useremo nel template
        $smarty->assign('prodotti', $prodottiFinti);
        $smarty->assign('titolo_pagina', 'Catalogo Prodotti (Modalità Demo)');

        // 4. MOSTRIAMO IL TEMPLATE
        $smarty->display('prodotti.tpl');
    }
}