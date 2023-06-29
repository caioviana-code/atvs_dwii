@extends('templates.main', ['titulo' => "Ferramentas", 'rota' => "ferramentas.create"])

@section('titulo') Ferramentas @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalist-ferramenta
                :header="['NOME', 'ESTOQUE', 'AÇÕES']" 
                :data="$data"
                :hide="[true, false, true, false]" 
                :remove="'nome'"
            />
        </div>
    </div>

@endsection