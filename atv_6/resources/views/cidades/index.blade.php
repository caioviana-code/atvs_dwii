<h2>Sistema Gestão de Municípios - Governo do Paraná</h2>

<label>[ Menu Principal ]</label> 

<hr>

<a href="{{ route('cidades.create') }}"><h4>Cadastrar Cidade</h4></a>

<hr>

<table>

    <thead>

        <tr>

            <th>ID</th>

            <th>CIDADE</th>

            <th>PORTE</th>

            <th>EDITAR</th>

            <th>REMOVER</th>

        </tr>

    </thead>

    <tbody>

        @foreach ($cidades as $item)

            <tr>

                <td>{{ $item['id'] }}</td>

                <td>{{ $item['nome'] }}</td>

                <td>{{ $item['porte'] }}</td>

                <td><a href="{{ route('cidades.edit', $item['id']) }}">Editar</a></td>

                <td>

                    <form action="{{ route('cidades.destroy', $item['id']) }}" method="POST">

                        @csrf

                        @method('DELETE')

                        <input type="submit" value="Remover">

                    </form>

                </td>

            </tr>

        @endforeach

    </tbody>

</table>

<hr>