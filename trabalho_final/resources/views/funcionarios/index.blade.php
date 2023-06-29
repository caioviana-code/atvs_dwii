@extends('templates.main', ['titulo' => "Funcionários", 'rota' => "funcionarios.create"])

@section('titulo') Funcionários @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalist-funcionario
                :header="['NOME', 'EMAIL', 'AÇÕES']" 
                :data="$data"
                :hide="[true, false, true, false]" 
                :remove="'nome'"
            />
        </div>
    </div>

@endsection