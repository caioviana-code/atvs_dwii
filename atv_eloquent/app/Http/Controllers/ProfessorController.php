<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller {
    
    public function index() {
        
        $dados = Professor::with(['eixo' => function ($q) {
            $q->withTrashed();
        }])->orderBy('nome')->get();

        return view('professores.index', compact('dados'));
    }

    public function create() {
        
        $eixos = Eixo::all();

        return view('professores.create', compact('eixos'));
    }

    public function store(Request $request) {
        
        Professor::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'siape' => $request->siape,
            'eixo_id' => $request->eixo_id,
            'ativo' => $request->radio
        ]);

        return redirect()->route('professores.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $dados = Professor::with(['eixo' => function ($q) {
            $q->withTrashed();
        }])->find($id);

        $eixos = Eixo::all();

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('professores.edit', compact(['dados', 'eixos']));
    }

    public function update(Request $request, $id) {
        
        $obj = Professor::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => $request->nome,
            'email' => $request->email,
            'siape' => $request->siape,
            'eixo_id' => $request->eixo_id,
            'ativo' => $request->radio
        ]);

        $obj->save();

        return redirect()->route('professores.index');
    }

    public function destroy($id) {
        
        $obj = Professor::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('professores.index');
    }
}
