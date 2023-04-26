<h2>Sistema Gestão de Municípios - Governo do Paraná</h2>

<label>[ Alterar Dados da Cidade ]</label> 

<a href="{{ route('cidades.index') }}"><h4>Voltar</h4></a>

<form action="{{ route('cidades.update', $dados['id']) }}" method="POST">

    <hr>

    @csrf

    @method('PUT')

    <label>Nome: </label> 
    
    <input type="text" name="nome" value="{{$dados['nome']}}"> <br><br>

    <label>Porte: </label>
    
    <select name="porte" >
        <option value="Pequeno">Pequeno</option>
        <option value="Medio">Médio</option>
        <option value="Grande">Grande</option>
    </select>

    <hr>

    <input type="submit" value="Alterar">

</form>