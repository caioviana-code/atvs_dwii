<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller {

    public function index() {
        
        $permissions = session('user_permissions');

        $data = Funcionario::all();

        return view('funcionarios.index', compact(['data', 'permissions']));
    }

    public function create() {
        
        return view('funcionarios.create');
    }

    public function store(Request $request) {

        $regras = [
            'nome' => 'required|max:100|min:10',
            'email' => 'required|max:150|min:15|unique:funcionarios',
            'cpf' => 'required|max:20|min:11|unique:funcionarios'
        ];

        $msgs = [
            "required" => 'O preenchimento do campo :attribute é obrigatório|',
            "max" => 'O campo :attribute possui o tamanho máximo de :max caracteres!',
            "min" => 'O campo :attribute possui o tamanho minimo de :min caracteres!',
            "unique" => 'Já existe um funcionário cadastro com esse :attribute'
        ];

        $request->validate($regras, $msgs);
        
        Funcionario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf
        ]);

        return redirect()->route('funcionarios.index');
    }

    public function show($id) {
        
    }

    public function edit($id) {
        
        $data = Funcionario::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('funcionarios.edit', compact('data'));
    }

    public function update(Request $request, $id) {

        $regras = [
            'nome' => 'required|max:100|min:10',
            'email' => 'required|max:150|min:15|unique:funcionarios',
            'cpf' => 'required|max:20|min:11|unique:funcionarios'
        ];

        $msgs = [
            "required" => 'O preenchimento do campo :attribute é obrigatório|',
            "max" => 'O campo :attribute possui o tamanho máximo de :max caracteres!',
            "min" => 'O campo :attribute possui o tamanho minimo de :min caracteres!',
            "unique" => 'Já existe um funcionário cadastro com esse :attribute'
        ];

        $request->validate($regras, $msgs);
        
        $obj = Funcionario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf
        ]);

        $obj->save();

        return redirect()->route('funcionarios.index');
    }

    public function destroy($id) {
        
        $obj = Funcionario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('funcionarios.index');
    }
}
