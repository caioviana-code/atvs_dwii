<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider {
    
    public function register() {
        
    }

    public function boot() {
        
        Blade::component('components.datalist-eixos', 'datalistEixos');

        Blade::component('components.datalist-cursos', 'datalistCursos');

        Blade::component('components.datalist-professores', 'datalistProfessores');

        Blade::component('components.datalist-disciplinas', 'datalistDisciplinas');
    }
}
