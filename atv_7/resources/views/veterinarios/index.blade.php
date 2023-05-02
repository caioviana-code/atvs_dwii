@extends('templates.main', ['titulo' => "Veterinários", 'rota' => "veterinarios.create"])

@section('titulo') Veterinários @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datatable
                title="Veterinários"
                crud="veterinarios"
                :header="['CRMV', 'nome', 'especialidade', 'ações']"
                :data="$dados"
                :hide="[true, false, true, false]"
            />
        </div>
    </div>

@endsection