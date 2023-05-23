@extends('templates.main', ['titulo' => "Disciplinas", 'rota' => "disciplinas.create"])

@section('titulo') Disciplinas @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalistDisciplinas
                :header="['NOME', 'CURSO', 'AÇÕES']" 
                :data="$dados"
                :hide="[true, false, true, false]" 
                :remove="'nome'"
            />
        </div>
    </div>

@endsection