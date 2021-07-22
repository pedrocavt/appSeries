<?php

namespace App\Services;

use App\Serie;
use App\Temporada;
use App\Episodio;

class CriadorDeSerie
{
    public function criarSerie(string $nomeDaSerie, int $qntTemporada, int $epPorTemporada): Serie
    {
        \DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeDaSerie]);
        $this->criarTemporadas($qntTemporada, $epPorTemporada, $serie);
        \DB::commit();
        
        return $serie;
    }

    private function criarTemporadas(int $qntTemporada, int $epPorTemporada, Serie $serie)
    {
        for($i = 1; $i <= $qntTemporada; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criarEpisodios($epPorTemporada, $temporada);
            
        }
    }

    private function criarEpisodios(int $epPorTemporada, Temporada $temporada)
    {
        for($j = 1; $j <= $epPorTemporada; $j++) {
            $episodio = $temporada->episodios()->create(['numero' => $j]);
        }
    }
}