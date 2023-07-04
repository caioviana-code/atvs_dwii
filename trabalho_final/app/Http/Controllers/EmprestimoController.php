<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Ferramenta;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class EmprestimoController extends Controller {
    
    public function index() {
        
        $data = Emprestimo::with(['funcionario', 'ferramenta'])->get();

        return view('emprestimos.index', compact('data'));
    }

    public function create() {

        $funcionarios = Funcionario::all();
        $ferramentas = Ferramenta::all();
        
        return view('emprestimos.create', compact(['funcionarios', 'ferramentas']));
    }

    public function store(Request $request) {

        $ferramenta = Ferramenta::find($request->ferramenta_id);
        $quantidadeSolicitada = $request->quantidade;

        if ($ferramenta->estoque < $quantidadeSolicitada) {
            return redirect()->back()->with('error', 'quantidade insuficiente em estoque.');
        }
        
        $emprestimo = new Emprestimo;
        $emprestimo->funcionario_id = $request->funcionario_id;
        $emprestimo->ferramenta_id = $request->ferramenta_id;
        $emprestimo->quantidade = $request->quantidade;
        $emprestimo->save();

        return redirect()->route('ferramentas.index');
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
