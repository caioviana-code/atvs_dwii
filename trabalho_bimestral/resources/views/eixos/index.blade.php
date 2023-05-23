@extends('templates.main', ['titulo' => "Eixos", 'rota' => "eixos.create"])

@section('titulo') Eixos @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalistEixos
                :header="['NOME', 'AÇÕES']" 
                :data="$dados"
                :hide="[true, false, true, false]" 
                :remove="'nome'"
            />
        </div>
    </div>

@endsection