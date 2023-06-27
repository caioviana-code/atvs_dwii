<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Matricula;
use Illuminate\Http\Request;

class AlunoController extends Controller {
    
    public function index() {
        
        $dados = Aluno::with(['curso' => function ($q) {
            $q->withTrashed();
        }])->orderBy('nome')->get();

        return view('alunos.index', compact('dados'));
    }

    public function create() {
        
        $cursos = Curso::all();

        return view('alunos.create', compact('cursos'));
    }

    public function store(Request $request) {
        
        Aluno::create([
            'nome' => $request->nome,
            'curso_id' => $request->curso_id
        ]);

        return redirect()->route('alunos.index');
    }

    public function show($id) { 

        $aluno = Aluno::find($id);

        $disciplina = Disciplina::where('curso_id', $aluno->curso_id)->get();

        $matricula = Matricula::where('aluno_id', $id)->get();

        return view('matriculas.index', compact('aluno', 'disciplina', 'matricula'));
    }

    public function edit($id) {
        
        $dados = Aluno::with(['curso' => function ($q) {
            $q->withTrashed();
        }])->find($id);

        $cursos = Curso::all();

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('alunos.edit', compact('dados', 'cursos'));
    }

    public function update(Request $request, $id) {
        
        $obj = Aluno::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => $request->nome,
            'curso_id' => $request->curso_id
        ]);

        $obj->save();

        return redirect()->route('alunos.index');
    }

    public function destroy($id) {
        
        $obj = Aluno::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('alunos.index');
    }
}
