@extends('templates.main', ['titulo' => "Empréstimos", 'rota' => "emprestimos.create"])

@section('titulo') Empréstimos @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalist-emprestimo
                :header="['FUNCIONARIO', 'FERRAMENTA', 'QUANTIDADE', 'AÇÕES']" 
                :data="$data"
                :hide="[true, false, true, false]" 
                :remove="'nome'"
            />
        </div>
    </div>

@endsection