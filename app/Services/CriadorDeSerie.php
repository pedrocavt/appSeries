<?php

namespace App\Services;

use App\Serie;

class CriadorDeSerie
{
    public function criarSerie(string $nomeDaSerie, int $qntTemporada, int $epPorTemporada): Serie
    {
        $serie = Serie::create(['nome' => $nomeDaSerie]);

        for($i = 1; $i <= $qntTemporada; $i++) {
           $temporada = $serie->temporadas()->create(['numero' => $i]);

           for($j = 1; $j <= $epPorTemporada; $j++) {
            $episodio = $temporada->episodios()->create(['numero' => $j]);
         }
        }
        
        return $serie;
    }
}