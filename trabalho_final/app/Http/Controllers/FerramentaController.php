<?php

namespace App\Http\Controllers;

use App\Models\Ferramenta;
use Illuminate\Http\Request;

class FerramentaController extends Controller {
    
    public function index() {
        
        $data = Ferramenta::all();

        return view('ferramentas.index', compact('data'));
    }

    public function create() {
        
        return view('ferramentas.create');
    }

    public function store(Request $request) {

        $regras = [
            'nome' => 'required|max:100|min:5',
            'estoque' => 'required',
        ];

        $msgs = [
            "required" => 'O preenchimento do campo :attribute é obrigatório|',
            "max" => 'O campo :attribute possui o tamanho máximo de :max caracteres!',
            "min" => 'O campo :attribute possui o tamanho minimo de :min caracteres!',
        ];

        $request->validate($regras, $msgs);
        
        Ferramenta::create([
            'nome' => $request->nome,
            'estoque' => $request->estoque
        ]);

        return redirect()->route('ferramentas.index');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        
        $data = Ferramenta::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('ferramentas.edit', compact('data'));
    }

    public function update(Request $request, $id) {

        $regras = [
            'nome' => 'required|max:100|min:5',
            'estoque' => 'required',
        ];

        $msgs = [
            "required" => 'O preenchimento do campo :attribute é obrigatório|',
            "max" => 'O campo :attribute possui o tamanho máximo de :max caracteres!',
            "min" => 'O campo :attribute possui o tamanho minimo de :min caracteres!',
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
        
        $obj = Ferramenta::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('ferramentas.index');
    }
}
