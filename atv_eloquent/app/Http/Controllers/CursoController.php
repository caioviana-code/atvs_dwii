<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Eixo;
use Illuminate\Http\Request;

class CursoController extends Controller {
    
    public function index() {
        
        $dados = Curso::with(['eixo' => function ($q) {
            $q->withTrashed();
        }])->orderBy('nome')->get();

        return view('cursos.index', compact('dados'));
    }

    public function create() {

        $eixos = Eixo::all();
        
        return view('cursos.create', compact('eixos'));
    }

    public function store(Request $request) {
        
        Curso::create([
            'nome' => $request->nome,
            'sigla' => $request->sigla,
            'tempo' => $request->tempo,
            'eixo_id' => $request->eixo_id
        ]);

        return redirect()->route('cursos.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $dados = Curso::find($id);
        $eixos = Eixo::all();

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('cursos.edit', compact(['dados', 'eixos']));
    }

    public function update(Request $request, $id) {
        
        $obj = Curso::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => $request->nome,
            'sigla' => $request->sigla,
            'tempo' => $request->tempo,
            'eixo_id' => $request->eixo_id
        ]);

        $obj->save();

        return redirect()->route('cursos.index');
    }

    public function destroy($id) {
        
        $obj = Curso::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('cursos.index');
    }
}
