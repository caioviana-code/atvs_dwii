<?php

namespace App\Http\Controllers;

use App\Facades\UserPermissions;
use App\Models\Emprestimo;
use App\Models\Ferramenta;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class EmprestimoController extends Controller {
    
    public function index() {

        if(!UserPermissions::isAuthorized('emprestimos.index')) {
            abort(403);
        }
 
        $permissions = session('user_permissions');

        $data = Emprestimo::with(['funcionario', 'ferramenta'])->get();

        return view('emprestimos.index', compact(['data', 'permissions']));
    }

    public function create() {

        if(!UserPermissions::isAuthorized('emprestimos.create')) {
            abort(403);
        }

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
        $emprestimo->data_emprestimos = now();
        $emprestimo->save();

        $ferramenta->estoque -= $quantidadeSolicitada;
        $ferramenta->save();    

        return redirect()->route('ferramentas.index');
    }

    public function show($id) {
        
        if(!UserPermissions::isAuthorized('emprestimos.show')) {
            abort(403);
        }
    }

    public function edit($id) {
        
        if(!UserPermissions::isAuthorized('emprestimos.edit')) {
            abort(403);
        }

        $emprestimo = Emprestimo::find($id);
        $emprestimo->data_devolucao = now();
        $emprestimo->save();

        $ferramenta = Ferramenta::find($emprestimo->ferramenta->id);
        $ferramenta->estoque += $emprestimo->quantidade;
        $ferramenta->save();

        return redirect()->route('emprestimos.index');
    }

    public function update(Request $request, $id) {
        
        
    }

    public function destroy($id) {
        
        if(!UserPermissions::isAuthorized('emprestimos.destroy')) {
            abort(403);
        }
    }
}
