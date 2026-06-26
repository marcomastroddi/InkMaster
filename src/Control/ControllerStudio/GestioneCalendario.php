<?php


namespace InkMaster\Control\ControllerStudio;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;

class GestioneCalendario
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function visualizzaCalendario(int $mese, int $anno): array
    {
        $idStudio = SessionManager::get('id_studio');

        if (!$idStudio) {
            return ['status' => 'error', 'message' => 'Devi essere loggato come studio.'];
        }

        $appuntamenti = $this->pm->findAppuntamentiByStudioId($idStudio);

        // Raccogliamo le date occupate
        $giorniOccupati = [];
        foreach ($appuntamenti as $appuntamento) {
            $data = $appuntamento->getData()->format('Y-m-d');
            $giorniOccupati[$data] = true;
        }

        // Costruiamo il calendario del mese
        $giorniNelMese = cal_days_in_month(CAL_GREGORIAN, $mese, $anno);
        $calendario = [];

        for ($giorno = 1; $giorno <= $giorniNelMese; $giorno++) {
            $data = sprintf('%04d-%02d-%02d', $anno, $mese, $giorno);
            $calendario[] = [
                'giorno' => $giorno,
                'data'   => $data,
                'stato'  => isset($giorniOccupati[$data]) ? 'occupato' : 'libero'
            ];
        }

        return [
            'status' => 'success',
            'data'   => [
                'mese'       => $mese,
                'anno'       => $anno,
                'calendario' => $calendario
            ]
        ];
    }

    public function visualizzaAppuntamentiDelGiorno(string $data): array
    {
        $idStudio = SessionManager::get('id_studio');

        if (!$idStudio) {
            return ['status' => 'error', 'message' => 'Devi essere loggato come studio.'];
        }

        $appuntamenti = $this->pm->findAppuntamentiByStudioId($idStudio);

        $appuntamentiDelGiorno = [];
        foreach ($appuntamenti as $appuntamento) {
            if ($appuntamento->getData()->format('Y-m-d') === $data) {
                $appuntamentiDelGiorno[] = [
                    'cliente'    => $appuntamento->getCliente()->getNome() . ' ' . $appuntamento->getCliente()->getCognome(),
                    'tatuatore'  => $appuntamento->getTatuatore()->getNome() . ' ' . $appuntamento->getTatuatore()->getCognome(),
                    'ora_inizio' => $appuntamento->getOraInizio()->format('H:i'),
                    'ora_fine'   => $appuntamento->getOraFine()->format('H:i'),
                    'stato'      => $appuntamento->getStato(),
                    'note'       => $appuntamento->getNote()
                ];
            }
        }

        return [
            'status' => 'success',
            'data'   => $appuntamentiDelGiorno
        ];
    }
}