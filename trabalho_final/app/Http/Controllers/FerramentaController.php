<?php

namespace App\Http\Controllers;

use App\Facades\UserPermissions;
use App\Models\Ferramenta;
use Illuminate\Http\Request;

class FerramentaController extends Controller {
    
    public function index() {

        if(!UserPermissions::isAuthorized('ferramentas.index')) {
            abort(403);
        }
        
        $data = Ferramenta::all();

        return view('ferramentas.index', compact('data'));
    }

    public function create() {

        if(!UserPermissions::isAuthorized('ferramentas.create')) {
            abort(403);
        }
        
        return view('ferramentas.create');
    }

    public function store(Request $request) {

        $regras = [
            'nome' => 'required|max:100',
            'estoque' => 'required',
        ];

        $msgs = [
            "required" => 'O preenchimento do campo :attribute é obrigatório|',
            "max" => 'O campo :attribute possui o tamanho máximo de :max caracteres!'
        ];

        $request->validate($regras, $msgs);
        
        Ferramenta::create([
            'nome' => $request->nome,
            'estoque' => $request->estoque
        ]);

        return redirect()->route('ferramentas.index');
    }

    public function show($id) {

        if(!UserPermissions::isAuthorized('ferramentas.show')) {
            abort(403);
        }
        
    }

    public function edit($id) {

        if(!UserPermissions::isAuthorized('ferramentas.edit')) {
            abort(403);
        }
        
        $data = Ferramenta::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('ferramentas.edit', compact('data'));
    }

    public function update(Request $request, $id) {

        $regras = [
            'nome' => 'required|max:100',
            'estoque' => 'required',
        ];

        $msgs = [
            "required" => 'O preenchimento do campo :attribute é obrigatório|',
            "max" => 'O campo :attribute possui o tamanho máximo de :max caracteres!'
        ];

        $request->validate($regras, $msgs);
        
        $obj = Ferramenta::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => $request->nome,
            'estoque' => $request->estoque
        ]);

        $obj->save();

        return redirect()->route('ferramentas.index');
    }

    public function destroy($id) {

        if(!UserPermissions::isAuthorized('ferramentas.destroy')) {
            abort(403);
        }
        
        $obj = Ferramenta::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('ferramentas.index');
    }
}
