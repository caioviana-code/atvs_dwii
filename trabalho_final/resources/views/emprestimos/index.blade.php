@extends('templates.middleware', ['titulo' => "Empréstimos", 'rota' => "emprestimos.create"])

@section('titulo') Empréstimos @endsection

@section('conteudo')

<div>
    
    <table class="table align-middle caption-top table-striped">

        <caption>Tabela de <b>Empréstimos</b></caption>
   
        <thead>
            <tr>
               <th scope="col">Funcionário</th>
               <th scope="col" class="d-none d-md-table-cell">Ferramenta</th>
               <th scope="col">Quantidade</th>
               <th scope="col" class="d-none d-md-table-cell">Data Empréstimo</th>
               <th scope="col">Data Devolução</th>
               <th scope="col" class="d-none d-md-table-cell">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->funcionario->nome }}</td>
                    <td>{{ $item->ferramenta->nome }}</td>
                    <td>{{ $item->quantidade }}</td>
                    <td>{{ $item->data_emprestimos }}</td>
                    <td>
                        @if($item->data_devolucao !== null)
                            {{ $item->data_devolucao }}
                        @endif
                    </td>
                    @if($item->data_devolucao === null)
                    <td>
                        <a href= "{{ route('emprestimos.edit', $item->id) }}" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                            </svg>
                        </a>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection