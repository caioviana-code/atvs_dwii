<?php

namespace App\Http\Controllers;

use App\Facades\UserPermissions;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller {

    public function index() {

        if(!UserPermissions::isAuthorized('funcionarios.index')) {
            abort(403);
        }
        
        $permissions = session('user_permissions');

        $data = Funcionario::all();

        return view('funcionarios.index', compact(['data', 'permissions']));
    }

    public function create() {

        if(!UserPermissions::isAuthorized('funcionarios.create')) {
            abort(403);
        }
        
        return view('funcionarios.create');
    }

    public function store(Request $request) {

        $regras = [
            'nome' => 'required|max:100|min:10',
            'email' => 'required|max:150|min:15|unique:funcionarios',
            'cpf' => 'required|max:20|min:11'
        ];

        $msgs = [
            "required" => 'O preenchimento do campo :attribute é obrigatório|',
            "max" => 'O campo :attribute possui o tamanho máximo de :max caracteres!',
            "min" => 'O campo :attribute possui o tamanho minimo de :min caracteres!'
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

        if(!UserPermissions::isAuthorized('funcionarios.show')) {
            abort(403);
        }
        
    }

    public function edit($id) {

        if(!UserPermissions::isAuthorized('funcionarios.edit')) {
            abort(403);
        }
        
        $data = Funcionario::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('funcionarios.edit', compact('data'));
    }

    public function update(Request $request, $id) {

        $regras = [
            'nome' => 'required|max:100|min:10',
            'email' => 'required|max:150|min:15|unique:funcionarios',
            'cpf' => 'required|max:20|min:11'
        ];

        $msgs = [
            "required" => 'O preenchimento do campo :attribute é obrigatório|',
            "max" => 'O campo :attribute possui o tamanho máximo de :max caracteres!',
            "min" => 'O campo :attribute possui o tamanho minimo de :min caracteres!'
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

        if(!UserPermissions::isAuthorized('funcionarios.destroy')) {
            abort(403);
        }
        
        $obj = Funcionario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('funcionarios.index');
    }
}
