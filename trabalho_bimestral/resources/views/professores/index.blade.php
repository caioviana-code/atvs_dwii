@extends('templates.main', ['titulo' => "Professores", 'rota' => "professores.create"])

@section('titulo') Professores @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalistProfessores 
                :header="['NOME', 'EIXO', 'STATUS', 'AÇÕES']" 
                :data="$dados"
                :hide="[true, false, true, false]" 
                :remove="'nome'"
            />
        </div>
    </div>

@endsection