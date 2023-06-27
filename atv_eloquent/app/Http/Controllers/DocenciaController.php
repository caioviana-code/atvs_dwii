<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Docencia;
use App\Models\Professor;
use Illuminate\Http\Request;

class DocenciaController extends Controller {
    
    public function index() {

        $professores = Professor::all();

        $disciplinas = Disciplina::all();
        
        return view('docencias.index', compact(['professores', 'disciplinas']));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        
        $professores = $request->PROFESSOR_ID;
        $disciplina = $request->DISCIPLINA;

        for ($i = 0; $i < count($request->DISCIPLINA); $i++) {

            $doc = Docencia::where('disciplina_id', $disciplina[$i])->first();

            if(isset($doc)) {
                $doc->fill([
                    'professor_id' => $professores[$i]
                ]);

                $doc->save();
            } 

            else {
                Docencia::create([
                    'professor_id' => $professores[$i],
                    'disciplina_id' => $disciplina[$i]
                ]);
            }
            
        }

        return redirect()->route('disciplinas.index');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
