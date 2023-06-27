@extends('templates.main', ['titulo' => "Cursos", 'rota' => "cursos.create"])

@section('titulo') Cursos @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalistCursos
                :header="['NOME', 'SIGLA', 'AÇÕES']" 
                :data="$dados"
                :hide="[true, false, true, false]" 
                :remove="'nome'"
            />
        </div>
    </div>

@endsection