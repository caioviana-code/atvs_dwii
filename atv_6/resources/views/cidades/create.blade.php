<h2>Sistema Gestão de Municípios - Governo do Paraná</h2>

<label>[ Cadastrar Nova Cidade ]</label> <a href="{{ route('cidades.index') }}"><h4>Voltar</h4></a>

<form action="{{ route('cidades.store') }}" method="POST">

    <hr>

    @csrf

    <label>Nome: </label> 
    
    <input type="text" name="nome"> <br><br>

    <label>Porte: </label>

    <select name="porte">
        <option value="Pequeno">Pequeno</option>
        <option value="Medio">Médio</option>
        <option value="Grande">Grande</option>
    </select>

    <hr>

    <input type="submit" value="salvar">

</form>
