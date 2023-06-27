@extends('templates.main', ['titulo' => "Alunos", 'rota' => "alunos.create"])

@section('titulo') Alunos @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalistAlunos
                :header="['NOME', 'CURSO', 'AÇÕES']" 
                :data="$dados"
                :hide="[true, false, true, false]" 
                :remove="'nome'"
            />
        </div>
    </div>

@endsection