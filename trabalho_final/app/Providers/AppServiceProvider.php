<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    
    public function register() {
        //
    }

    public function boot() {
        
        Blade::component('components.datalist-funcionarios', 'datalistFuncionario');
        Blade::component('components.datalist-ferramentas', 'datalistFerramenta');
        Blade::component('components.datalist-emprestimos', 'datalistEmprestimos');
    }
}
