<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use App\Models\Veterinario;
use Illuminate\Http\Request;

class VeterinarioController extends Controller {
    
    public function index() {
        
        $dados = Veterinario::all();

        return view('veterinarios.index', compact('dados'));
    }

    public function create() {

        $especialidades = Especialidade::all();
        
        return view('veterinarios.create', compact('especialidades'));
    }

    public function store(Request $request) {

        $regras = [
            'nome' => 'required|max:100|min:10',
            'crmv' => 'required|max:10|min:5|unique:veterinarios',
            'especialidade_id' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo :attribute é obrigatório!",
            "max" => "O campo :attribute possui o tamanho máximo de :max caracteres!",
            "min" => "O campo :attribute possui o tamanho minimo de :min caracteres!",
            "unique" => "Já existe um cliente cadastrado com esse :attribute!"
        ];

        $request->validate($regras, $msgs);

        Veterinario::create([
            'nome' => $request->nome,
            'crmv' => $request->crmv,
            'especialidade_id' => $request->especialidade_id
        ]);

        return redirect()->route('veterinarios.index');

    }

    public function show($id) { }

    public function edit($id) {

        $dados = Veterinario::find($id);
        $especialidades = Especialidade::all();

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('veterinarios.edit', compact(['dados', 'especialidades']));
    }

    public function update(Request $request, $id) {

        $regras = [
            'nome' => 'required|max:100|min:10',
            'crmv' => 'required|max:10|min:5|unique:veterinarios',
            'especialidade_id' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo :attribute é obrigatório!",
            "max" => "O campo :attribute possui o tamanho máximo de :max caracteres!",
            "min" => "O campo :attribute possui o tamanho minimo de :min caracteres!",
            "unique" => "Já existe um cliente cadastrado com esse :attribute!"
        ];

        $request->validate($regras, $msgs);
        
        $obj = Veterinario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => $request->nome,
            'crmv' => $request->crmv,
            'especialidade_id' => $request->especialidade_id
        ]);

        $obj->save();

        return redirect()->route('veterinarios.index');
    }

    public function destroy($id) {
        
        $obj = Veterinario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('veterinarios.index');
    }
}
