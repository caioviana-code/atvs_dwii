<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller {
    
    public function index() {
        
        $dados = Disciplina::with(['curso' => function ($q) {
            $q->withTrashed();
        }])->orderBy('nome')->get();

        return view('disciplinas.index', compact('dados'));
    }

    public function create() {
        
        $cursos = Curso::all();

        return view('disciplinas.create', compact('cursos'));
    }

    public function store(Request $request) {
        
        Disciplina::create([
            'nome' => $request->nome,
            'curso_id' => $request->curso_id,
            'carga' => $request->carga
        ]);

        return redirect()->route('disciplinas.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $dados = Disciplina::with(['curso' => function ($q) {
            $q->withTrashed();
        }])->find($id);

        $cursos = Curso::all();

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('disciplinas.edit', compact(['dados', 'cursos']));
    }

    public function update(Request $request, $id) {
        
        $obj = Disciplina::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => $request->nome,
            'curso_id' => $request->curso_id,
            'carga' => $request->carga
        ]);

        $obj->save();

        return redirect()->route('disciplinas.index');
    }

    public function destroy($id) {
        
        $obj = Disciplina::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('disciplinas.index');
    }
}
