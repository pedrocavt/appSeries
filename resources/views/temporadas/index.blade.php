@extends('layout')

@section('cabecalho')
Temporadas de {{$serie->nome}}
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif


<ul class="list-group">
    @foreach($temporadas as $temporada)
    <li class="list-group-item">
        Temporada {{ $temporada->numero }}
    </li>
    @endforeach
</ul>
@endsection